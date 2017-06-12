<?php

namespace Models;
class Person extends BaseModel
{
    protected $table = 'person';
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'enabled', 'image_url'];
    public $timestamps = false;

    public static function getPersons()
    {
        return self::all()->toArray();
    }

    public static function login($email, $pass)
    {
        $person = self::getLoginPerson($email,$pass);
        return self::loginControl($person);

    }
    public static function loginControl($person)
    {
        if (isset($person[0]) && $person[0] instanceof \Models\Person) {
            return true;
        } else {
            return false;
        }
    }
    public static function getLoginPersonId($email,$pass)
    {
        return self::where('email', $email)
            ->where('password', sha1($pass))
            ->first(['id']);
    }
    public static function getLoginPerson($email, $pass)
    {
        return self::where('email', $email)
            ->where('password', sha1($pass))
            ->get();

    }
    public static function getPerson($id)
    {
        return self::find($id);
    }

    public static function delPerson($id)
    {
        self::where('id', $id)
            ->delete();
    }

    public static function createPerson($first, $last, $email, $pass, $enabled, $image)
    {
        /*
        $a = new \Models\Person();
        $a->id = 2;
        $a->first_name = $first;
        $a->last_name = $last;
        $a->save();
        */

        self::create(['first_name' => $first,
            'last_name' => $last,
            'password' => sha1($pass),
            'email' => $email,
            'enabled' => $enabled,
            'image_url' => $image
        ]);


    }


    public static function editPerson($id, $first, $last, $email, $pass, $enabled, $image)
    {
        $person = self::getPerson($id);
        $update = $person->update(['first_name' => $first,
            'last_name' => $last,
            'password' => sha1($pass),
            'email' => $email,
            'enabled' => $enabled,
            'image_url' => $image]);

        if (!$update) {
            return false;
        }
        return $person;
    }
}

?>