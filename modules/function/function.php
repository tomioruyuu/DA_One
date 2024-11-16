<?php 
    function direct($path = "index.php") {
        header("location: $path");
        exit;
    }
    function show_err_message($errors, $key) {
        echo !empty($errors["$key"]) ? reset($errors["$key"]): null;
    }

    function show_old_value($old_value, $key) {
        echo !empty($old_value["$key"]) ?  $old_value["$key"] : null ; 
    } 

       // hàm gán session
       function setSession($key, $value) {
        return $_SESSION[$key] = $value;
    }

    // hàm nhận session
    function getSession($key = "") {
        if($key) {
            if(isset($_SESSION["$key"]))
            return $_SESSION["$key"];
            
        }
        else {
            return $_SESSION;
        }
    }

    // hàm xóa session
    function deleteSession($key = "") {
        if($key) {
            if(isset($_SESSION["$key"])) {
                unset($_SESSION["$key"]);
                return true;
            }
        }
        else {
            session_destroy();
            return true;
        } 
    }

    // hàm gán flash data
    function setFlashData($key, $value) {
        $key = "flash_".$key;
        return setSession($key, $value);
    }

    // hàm nhận flash data
    function getFlashData($key) {
        $key = "flash_".$key;
        $data = getSession($key);
        deleteSession($key);
        return $data;
    }

    function getSmg($smg, $smg_type) {
        echo "<div class='alert alert-$smg_type'>";
        echo $smg;
        echo '</div>';
    }
?>