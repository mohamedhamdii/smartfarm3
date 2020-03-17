  
<?php

class DBConfig
{
    // database params
    private $db_host = 'localhost'; // 127.0.0.1
    private $db_username = 'root';
    private $db_password = '';
    private $db_name = 'smart_farm';

    private $connection;

    // connect to db
    public function connect()
    {

        $this->connection = null;

        try {

            $this->connection = new PDO(
                'mysql:host=' . $this->db_host .
                    ';dbname=' . $this->db_name,
                $this->db_username,
                $this->db_password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo ('Connection error' . $exception->getMessage());
        }

        return $this->connection;
    }
}