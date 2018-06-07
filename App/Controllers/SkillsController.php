<?php
namespace App\Controllers;

use Core\Controllers\Controller;

class SkillsController extends Controller
{
    public $skills;

    public function __construct()
    {
        $this->skills = model("Skills");
    }

    public function index ()
    {
        $selected = $this->getSelected();
        $last = $this->skills->select('id')->last('id')->get();

        if($selected['text'] !== null) {
            $selected['status'] = true;
        } else {
            $selected['status'] = false;
        }
        $vars = $this->skills->select("*")->order("id")->get();
        $array = ['skills' => $vars , "selected" => $selected ,"last" => $last['id']];
        $selected = $this->skills->select('is_show')->where(' is_show = 1 ')->get();
        $selected = count($selected);
        if ($selected !== 1) {
            $array['moreThenOneSelected'] = true;
        }
        return view('Admin.Skills.skills', $array);
    }

    public function add()
    {
        return view('Admin/Skills/add');
    }

    public function getSelected ()
    {
        return $this->skills->select("text")->where('is_show = 1')->last("id")->get();
    }

    public function insert ()
    {
        extract($_POST);
        try {
            $this->skills->insert([
            'text'           => $skills,
            'is_show'        => time()
              ]);
            rMsg('t', 'Skills has been Added With Successful ');
            redirect('back');
        } catch (\PDOException $e) {
            rMsg('f', 'Ooops Skills has not been Added With Successful <br> '.$e->getMessage());
            add_session(['text'=>$skills]);
            redirect('back');
        }

    }

    public function selectText($array)
    {
        extract($array);
        echo $this->skills->giveMe('text','id = '.$id);
    }

    public function edit($array)
    {
        extract($array);
        $result = $this->skills->select('*')->where('id = '.$id)->get();
        return view('Admin/Skills/edit', ['skills'=>$result[0]]);
    }

    public function update()
    {

        extract($_POST);
        $array = [
            "text" => $skills
        ];
        try {
            $this->skills->where('id = '.$id)->update($array);
            rMsg('t','Your Block Has Been Updated');
            redirect('back');
        } catch (\PDOException $e) {
            rMsg('f','ooops operation failed <br>'.$e->getMessage());
            add_session(['text'=>$skills]);
            redirect('back');
        }
    }

    public function updateIsShow()
    {
        extract($_POST);

        if (count($_POST) > 1) {
            rMsg('f',"You Have Been Selected More Then One Block");
            return redirect('back');
        }
        if (count($_POST) === 0) {

              $array = [
                  "is_show" => time()
              ];
                  try {
                      $id = $this->skills->giveMe('id', 'is_show = 1');
                      if(!empty($id)) {
                          $this->skills->where('id = ' . $id)->update($array);
                      }
                      rMsg('w', 'All Blocks Are Disabled !!!');
                     return redirect('back');
                  } catch (\PDOException $e) {
                      rMsg('f', 'ooops operation failed line 101 <br>' . $e->getMessage());
                      return redirect('back');
                    }


      }
        if (count($_POST) === 1) {
              $array = [
                        "is_show" => 1
                    ];
              try {
                    if ($this->skills->giveMe('id','is_show = 1')) {
                        $old_id = $this->skills->giveMe('id','is_show = 1');
                        $this->skills->where('id = '.$old_id)->update(['is_show'=> time()]);
                    }
                    $id = array_pop($_POST);
                    $this->skills->where('id = '.$id)->update($array);
                    rMsg('t','Your Block Has Been Updated');
                    return redirect('back');
                } catch (\PDOException $e) {
                    rMsg('f','ooops operation failed <br>'.$e->getMessage());
                   return  redirect('back');
                }
        }

        return true;
    }

    public function delete($array)
    {
        extract($array);
       try {
           $this->skills->delete($id);
           rMsg("t","Item ".$id." Has Been Deleted");
           redirect('back');
       } catch (\PDOException $e) {
           rMsg("t","Item ".$id." Has not Been Deleted <br>".$e->getMessage());
           redirect('back');
       }
    }

}