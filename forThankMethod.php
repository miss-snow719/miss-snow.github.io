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
