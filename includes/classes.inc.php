<?php

class DatabaseConnection{
    private $pdo = NULL;
    private $host = 'localhost';
    private $dbname = '';
    private $username = '';
    private $password = '';
    
    private function connectdb(){
        // PDO objektum létrehozása, hibakezelés módjának beállítása

        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function is_closed(){
        // Ha null a pdo adattag értéke (zárt kapcsolat), akkor igazat ad vissza

        return is_null($this->$pdo);
    }

    private function closedb(){
        // Nullra állítja a pdo adattag értékét (lezárja a kapcsolatot, PHP kézikönyv alapján)

        $this->pdo = NULL;
    }

    public function select_query($query, ...$params){
        $results = NULL;
        try {
            $this->connectdb();
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            if ($statement->rowCount() > 0)
            {
                $results = $statement->fetchAll();
            }
        } catch (PDOException $e) {
            header($_SERVER["SERVER_PROTOCOL"].' 500 Internal Server Error', true, 500);
            die();
        } finally {
            $this->closedb();
            assert($this->is_closed());
            if (isset($statement)){
                $statement_closed = $statement->closeCursor();
                assert($statement_closed);
            }
            return $results;
        }
    }

    public function insert_query($query, ...$params){
        try {
            $this->connectdb();
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
        } catch (PDOException $e) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            die();
        } finally {
            $this->closedb();
            assert($this->is_closed());
            if (isset($statement)) {
                $statement_closed = $statement->closeCursor();
                assert($statement_closed);
            }
        }
    }
}

?>