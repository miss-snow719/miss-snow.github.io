<?php 
    //クロスサイトスクリプティング対策
    function es(array|string $data, string $charset = 'UTF-8') : mixed {
        if(is_array($data)) {
            return array_map(__METHOD__, $data);
        } else {
            return htmlspecialchars(string: $data, flags: ENT_QUOTES, encoding: $charset);
        }
    }
    $_POST = es($_POST);

    
    //文字エンコードのチェック
    function cken(array $data) : bool {
        $result = true;
        foreach($data as $key => $value) {
            if(is_array($value)) {
                $value = implode("", $value);
            }
            if (! mb_check_encoding($value)) {
                $result = false;
                break;
            }
        }
        return $result;
    }
    if(!cken($_POST)) {
        $encoding = mb_internal_encoding();
        $err = "Encoding Error! The expected encoding is ". $encoding;
        exit($err);
    }


    //入力の有無のチェック
    function error ($data) {
        global $isError;
        $errorMessage = "未入力です";
        if(isset($data)) {
            if (trim($data) === "") {
                $isError = true;
                return $errorMessage;
            } else {
            $isError = false;
            return $data;
            }
        } else {
            $isError = true;
        }
        return $isError;
    }
    
    $_SESSION['name'] = trim(error($_POST['name']));
    $name = $_SESSION['name'];
    $name = strip_tags($name);
    $name = mb_substr($name, 0, 20);
    $name = es($name);

    $_SESSION['email'] = trim(error($_POST['email']));
    $email = $_SESSION['email'];
    $email = strip_tags($email);
    $email = mb_substr($email, 0, 50);
    $email = es($email);

    $_SESSION['message'] = trim(error($_POST['message']));
    $message = $_SESSION['message'];
    $message = strip_tags($message);
    $message = mb_substr($message, 0, 300);
    $message = es($message);


    //セッションの破棄
    function killSession() {
        $_SESSION = [];
        if(isset($_COOKIE[session_name()])) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time()-36000, $params['path']);
        }
        session_destroy();
    }
    

   
?>
