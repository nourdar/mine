<?php
namespace Core\Database;


use Nette\Caching\Storages\FileStorage;
use \Nette\Database\Connection;
use Core\Factory;

class Model
{
    private $select = [];
    protected $table;
    private $where = [];
    public $context;
    private $last  = null;
    private $limit = null;
    private $order = null;
    public $rows = [];
    public $paginate = [];


    public function __construct()
    {
        return $this->context = Factory::dbContext();
    }

    public static function connect($server, $dtbname, $user, $password)
    {
        $dsn = "mysql:host=".$server.";dbname=".$dtbname;
        $dtb = new Connection($dsn, $user, $password);
        return $dtb;
    }



    public function select()
    {
        $args = func_get_args();
        $args = implode(', ', $args);
        $this->select = "SELECT ".$args . " FROM ";
        return $this;
    }

    public function where()
    {
        $args = func_get_args();
        $args = implode(' AND ', $args);
        $this->where = " WHERE ".$args;
        return $this;
    }

    public function giveMe($column, $where = null)
    {
        if(!empty($where)) {
            $result =  $this->select($column)->where($where)->get();
        } else {
            $result =  $this->select($column)->get();
        }
        if (!empty($result)) {
            return $result[0][$column];
        }
        return false;
    }
    public function rows()
    {
        $this->select("*");
        $stmt = $this->select.$this->table;
        $query = $this->dtb->query($stmt)->getRowCount();
        $this->rows['ALL'] = $query;
        return $this;
    }
    public function giveMeAll()
    {
        return $this->select("*")->get();
    }

    public function get()
    {
        if (!empty($this->last)) {
            $result = $this->dtb->query($this->last);
            $this->rows['NOW'] = $result->getRowCount();
            $this->rows();
            $result = $result->fetch();
            $this->reset();
            return $result;
        }


        if (!empty($this->select)  && !empty($this->where)) {
            $query = $this->select.$this->table.$this->where.$this->limit;
            $result = $this->dtb->query($query);
            $this->rows['NOW'] = $result->getRowCount();
            $this->rows();
            $result = $result->fetchAll();
            return $result;
        }

        if (empty($this->where)) {
            $query = $this->select.$this->table.$this->limit;
            $result =  $this->dtb->query($query);
            $this->rows['NOW'] = $result->getRowCount();
            $this->rows();
            $result = $result->fetchAll();
            return $result;
        }
        return $this->reset();
    }

    public function last(string $orderBy)
    {
        if (!empty($this->where)) {
            $query = $this->select . $this->table .$this->where. " ORDER BY ".$orderBy." DESC LIMIT 1 ";
        } else {
            $query = $this->select . $this->table ." ORDER BY id DESC LIMIT 1 ";
        }
        $this->last = $query;
        return $this;
    }

    public function limit(int $start = null, int $end = null, string $orderBy = null)
    {
        if (!empty($this->order)) {
            $order = $this->order;
        } elseif (!empty($orderBy)) {
            $order =  " ORDER BY ". $orderBy;
        } else {
            $order = " ";
        }
        $limit = (!empty($end))? $start . " , ".$end : $start;
        $final = (!empty($order))? $order ." LIMIT ".$limit : " LIMIT ".$limit;
        $this->limit = $final;

        return $this;
    }

    public function order($by,$method = null)
    {
        $result = (!empty($method))? " ORDER BY ".$by." ".$method : " ORDER BY ".$by ;
        $this->order = $result;
        return $this;
    }

    public function updateField($field,$value)
    {
        $array = [$field    => $value ];
        return $this->dtb->query("UPDATE ?name SET ", $this->table, $array, $this->where);
    }

    public function update($array)
    {
        return $this->dtb->query("UPDATE ?name SET ", $this->table, $array, $this->where);
    }

    public function insert($array)
    {
       return $this->dtb->query("INSERT INTO  ". $this->table ." ? ", $array);
    }

    public function delete($id)
    {
        return $this->dtb->query('DELETE FROM '.$this->table.' WHERE id = ?', $id);
    }
    public function reset()
    {
        $this->select = null;
        $this->where  = null;
        $this->last   = null;
        $this->order  = null;
        $this->limit  = null;
        return $this;
    }

    public function paginate(int $start, int $end)
    {
        $this->rows();
        $pagesCount = $this->rows;
        if ($pagesCount['ALL'] === 0) {
            return $this;
        }
        if ($start === 0) {
            $start = 0;
        } else {
            $start = ($start-1) * $end ;
        }

        if ($start == $pagesCount['ALL']) {
            $start = $pagesCount['ALL'] - $end;
        }
        $this->paginate['CURRENT'] = $start;
        $this->limit(ceil($start), ceil($end));
        return $this;
    }
}


