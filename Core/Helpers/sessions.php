<?php


function add_session($array)
{
    global $_SESSION;
    foreach ($array as $key => $val) {
        $_SESSION['old_'.$key] = $val;
    }
    return true;
}

function setS($key,$value)
{
    return $_SESSION[$key] = $value;
}

function old($value, $modelVariable = null)
{
    global $_SESSION;
    if (isset($_SESSION['old_'.$value])) {
        echo $_SESSION['old_'.$value];
    } elseif(!empty($modelVariable)) {
        echo $modelVariable->giveMe($value);
    }
    return false;
}

function ses($name)
{

    if (isset($_SESSION[$name])) {
        echo $_SESSION[$name];
    }

    if (isset($_SESSION['FLASH']['KEY'])) {
        if ($_SESSION['FLASH']['KEY'] == $name) {
            unset($_SESSION[$name]);
        }
    }
    return false;
}

function s_flash(string $key = null, string $val = null, array $array = null)
{
    global $_SESSION;

    if (is_array($array)) {
        foreach ($array as $key => $val) {
            $_SESSION[$key] = $val;
            $_SESSION["FLASH"] = array(
                "KEY" => $key
            );
        }
    }

    if (!empty($key) && !empty($val)) {
        $_SESSION[$key] = $val;
        $_SESSION["FLASH"] = array(
            "KEY" => $key
        );
    }
}

function rMsg(string $type, string $message)
{
    if ($type == "f") {
        $msg = '  <div class="ui message error">
                <div class="header"> oops there is something wrong </div>
                <div class="message">' . $message . '</div>
                </div>';
       return s_flash('s_message', $msg);
    }

    if ($type == "w") {
        $msg = '  <div class="ui message warning">
                <div class="header"> Warning </div>
                <div class="message">' . $message . '</div>
                </div>';
        return s_flash('s_message', $msg);
    }

    if ($type == "t") {
        $msg =  '  <div class="ui message success">
                <div class="header"> operation has been finished with success </div>
                <div class="message">'.$message.'</div>
                </div>';
        return s_flash('s_message', $msg);
    }
    return true ;
}
