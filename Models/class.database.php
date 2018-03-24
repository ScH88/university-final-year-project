<?php

Class Database {
    
    protected static $instance  = null;
    protected $dbh;
    
    public static function getInstance() {
        //$username = 'sga669';
        //$password = 'xfqLE61fHNdcnPaN';
        //$host = 'localhost';
        //$dbname = 'sga669';
                
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $dbname = 'final_year_project';
        if (self::$instance === null) {
            self::$instance = new self ($username, $password, $host, $dbname);
    }
    return self::$instance;
    }
    
    private function __construct ($username, $password, $host, $database) {
        $this->dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }
    
    public function getDbh()
    {
        return $this->dbh;
    }
    
    public function __destruct() {
        $this->dbh = null;
    }
}


