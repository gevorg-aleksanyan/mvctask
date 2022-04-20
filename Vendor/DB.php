<?php

class DB extends Singleton
{
    public static $connection;

    public function __construct(){
        $this->connect();
    }

    protected function connect()
    {
            $config = parse_ini_file(CONFIG . 'config.ini');
            self::$connection = new MySqli($config['hostname'], $config['username'], $config['password'], $config['database']);
    }

}