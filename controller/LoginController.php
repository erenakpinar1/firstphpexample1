<?php

namespace Controller;
class LoginController
{
    public function __construct()
    {
        $this::login();
    }

    public function login()
    {
        /*
         * Session değerini alacak
         * eğer boş değilse sessiona ve süresine bakılacka eğer süre geçmemişse persona gidecek
         *
         */
        $token = \Session::sessionControl('user');
        if (!empty($token)) {
            $token_status = \Models\AuthToken::tokenLoginControl($token);
        }

        if ($_POST) {
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $person = \Models\Person::getLoginPerson($email, $pass);
            $status = \Models\Person::loginControl($person);
            $person_id = \Models\Person::getLoginPersonId($email, $pass);
            if ($status) {

                if (!$token_status) {
                    $create = \Models\AuthToken::createToken($person_id->id);
                    if (!$create) {
                        $status = 'Giriş yaparken bir hata oluştu!';
                    } else {
                        $_SESSION['user'] = $create->token;
                        \View::redirect('index.php?route=Person');
                    }
                    $status = 'Başarıyla giriş yapıldı.';
                }

            } else {
                $status = 'Kullanıcı adı veya şifre hatalı.';
            }

        }
        \View::render('views/login.php', ['status' => $status]);
    }
}

?>