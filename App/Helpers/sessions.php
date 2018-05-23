<?php



    function add_session($array)
    {
        foreach($array as $key => $val )
        {
            $_SESSION['old_'.$key] = $val;
        }
    }

    function old($val)
    {
        if(isset($_SESSION['old_'.$val])){

            echo $_SESSION['old_'.$val];

        }
    }

    function ses($name)
    {
        if(isset($_SESSION[$name])) {
            echo $_SESSION[$name];
        }

        if(isset($_SESSION['FLASH']['KEY'])){
            if($_SESSION['FLASH']['KEY'] == $name){
                unset($_SESSION[$name]);
            }

        }
    }

    function s_flash($key = null ,$val = null ,$array = null)
    {
        if(is_array($array)){
            foreach ($array as $key=>$val)
            {
                $_SESSION[$key] = $val;
                $_SESSION["FLASH"] = array(
                    "KEY" => $key,
                    "FLASH_TIME" => 1
                );
            }

        }
        if(!empty($key) && !empty($val)) {
            $_SESSION[$key] = $val;
            $_SESSION["FLASH"] = array(
                "KEY" => $key,
                "FLASH_TIME" => 1
            );
        }

    }


        function sr($type,$message)
        {
            if($type == "f")
            {
                $s =  '  <div class="ui message error">
                        <div class="header"> oops there is something wrong </div>
                        <div class="message">'.$message.'</div>
                        </div>';
                s_flash('s_message',$s);
            }

            if($type == "t")
            {
                $s =  '  <div class="ui message success">
                        <div class="header"> operation has been finished with success </div>
                        <div class="message">'.$message.'</div>
                        </div>';
                s_flash('s_message',$s);
            }
        }


