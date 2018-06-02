<?php

$mySession = $_SESSION;

function add_session($array)
{
    global $mySession;
    foreach ($array as $key => $val) {
        $mySession['old_'.$key] = $val;
    }
    return true;
}

function old($value, $modelVariable = null)
{
    global $mySession;
    if (isset($mySession['old_'.$value])) {
        echo $mySession['old_'.$value];
    } else {
        echo $modelVariable->giveMe($value);
    }
}

function ses($name)
{
    global $mySession;
    if (isset($mySession[$name])) {
        echo $mySession[$name];
    }

    if (isset($mySession['FLASH']['KEY'])) {
        if ($mySession['FLASH']['KEY'] == $name) {
            unset($mySession[$name]);
        }
    }
}

function s_flash(string $key = null, string $val = null, array $array = null)
{
    global $mySession;
    if (is_array($array)) {
        foreach ($array as $key => $val) {
            $mySession[$key] = $val;
            $mySession["FLASH"] = array(
                "KEY" => $key,
                "FLASH_TIME" => 1
            );
        }
    }

    if (!empty($key) && !empty($val)) {
        $mySession[$key] = $val;
        $mySession["FLASH"] = array(
            "KEY" => $key,
            "FLASH_TIME" => 1
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
        s_flash('s_message', $msg);
    }

    if ($type == "t") {
        $msg =  '  <div class="ui message success">
                <div class="header"> operation has been finished with success </div>
                <div class="message">'.$message.'</div>
                </div>';
        s_flash('s_message', $msg);
    }
}
