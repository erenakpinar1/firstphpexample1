<?php


namespace Models;

setlocale(LC_TIME, "tr_TR.UTF-8");
date_default_timezone_set('Etc/GMT-3');

class AuthToken extends BaseModel
{
    protected $table = 'authtoken';
    protected $fillable = ['person_id', 'token', 'expiration', 'generated_at', 'last_access'];
    public $timestamps = false;

    public static function getTokenById($token_id)
    {
        return self::find($token_id);
    }

    public static function updateExpirationDate($token_id)
    {
        $getToken = self::getTokenById($token_id);
        $date = date('Y-m-d H:i:s', strtotime("+1 days"));
        $getToken->update([
            'expiration' => $date
        ]);
    }

    public static function tokenLoginControl($token)
    {
        $getToken = self::getToken('token', $token);
        if (!empty($getToken)) {
            $status = self::dateDifferenceLogin($getToken->expiration);
            if ($status) {
                return \View::redirect('index.php?route=Person');
            } else {
                self::updateExpirationDate($getToken->id);
                return true;
            }
        }
        return false;
    }

    public static function tokenControl($token)
    {
        $token = self::getToken('token', $token);
        $status = self::dateDifferenceLogin($token->expiration);
        if (!$status) {
            \View::redirect('index.php?route=Login');
        }
    }

    public static function dateDifferenceLogin($date)
    {
        return \Helper::dateDifference(\Helper::now(), $date);
    }

    public static function getToken($columName, $token)
    {
        return self::where($columName, $token)->first();
    }

    public static function createToken($person_id)
    {
        $now = \Helper::Now();
        $token = sha1(microtime(true) . $person_id);
        $expiration = date('Y-m-d H:i:s', strtotime("+1 days"));
        $generated_at = $now;
        $last_access = $now;

        $create = self::create([
            'person_id' => $person_id,
            'token' => $token,
            'expiration' => $expiration,
            'generated_at' => $generated_at,
            'last_access' => $last_access

        ]);
        \Session::sessionCreate('user', $token);

        if (!$create) {
            return false;
        }
        return $create;
    }

}