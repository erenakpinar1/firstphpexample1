<?php

namespace Controller;
class PersonController extends BaseUserController
{


    public function index()
    {

        \View::render('views/person.php', ['persons' => \Models\Person::getPersons()]);
    }

    public function delete($id)
    {
        \Models\Person::delPerson($id);

        \View::redirect('index.php?route=Person');
    }

    public function edit($id)
    {

        $person = \Models\Person::getPerson($id);
        if (empty($person)) {
            \View::redirect('index.php?route=Error');
        }
        if ($_POST) {
            $first = trim($_POST['first_name']);
            $last = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
            if (empty($pass)) {
                $pass = $person->password;
            } else {
                $pass = sha1($pass);
            }
            $enabled = trim($_POST['enabled']);

            $new_file_name = \FileManager::upload($first, $last, $_FILES["image_url"]);
            if (!$new_file_name) {
                $status = "Resim yükleme işlemi başarısız oldu.";
            } else {

                $person = \Models\Person::editPerson($id, $first, $last, $email, $pass, $enabled, $new_file_name);
                if (!$person) {
                    $status = "Güncelleme Başarısız";
                } else {
                    $status = 'Başarıyla Kaydedildi.';
                }
            }


        }

        \View::render('views/edit.php', ['person' => $person, 'status' => $status]);


    }

    public function create()
    {
        if ($_POST) {
            $first = str_replace_first(' ', '', trim($_POST['first_name']));
            $last = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
            $enabled = trim($_POST['enabled']);

            $new_file_name = \FileManager::upload($first, $last, $_FILES["image_url"]);
            if (!$new_file_name) {
                $status = "Resim yükleme işlemi başarısız oldu.";
            } else {
                \Models\Person::createPerson($first, $last, $email, $pass, $enabled, $new_file_name);
                $status = 'Başarıyla Kaydedildi.';
            }


        }

        \View::render('views/create.php', ['status' => $status]);
    }


}

?>