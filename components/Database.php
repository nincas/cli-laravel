<?php 

namespace Cli\Components;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database {
    private $con;
    public function setDB() {
        $this->con = new Manager;
        $this->con->addConnection([
            'driver'    => getenv('DB_DRIVER'),
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_NAME'),
            'username'  => getenv('DB_USER'),
            'password'  => getenv('DB_PASS'),
            'charset'   => getenv('DB_CHARSET'),
            'collation' => getenv('DB_COLLATION'),
            'prefix'    => getenv('DB_PREFIX')
        ], 'default');

        $this->con->setEventDispatcher(new Dispatcher(new Container));
        $this->con->setAsGlobal();
        $this->con->bootEloquent();
    }
}