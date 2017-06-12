 <?php
namespace Models; 
use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database {
 
    function __construct() {
    $capsule = new Capsule;
    $capsule->addConnection([
     'driver' => DBDRIVER,
     'host' => DBHOST,
     'database' => DBNAME,
     'username' => DBUSER,
     'password' => DBPASS,
     'charset' => 'utf8',
     'collation' => 'utf8_unicode_ci',
     'prefix' => '',
    ]);
    // Setup the Eloquent ORM… 
    $capsule->bootEloquent();
}
 
}
/*return [
    
        'localDB' => [
            'driver'    => 'pgsql',
            'host'      => 'postgres',
            'database'  => 'project1',
            'schema'    => 'project1',
            'username'  => 'kolayik',
            'password'  => 'kolayik',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
 
];*/
?>