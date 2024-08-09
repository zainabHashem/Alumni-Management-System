<?php
session_start();
class DBController{
    public $dbHost="localhost";
    public $dbUser="root";
    public $dbPassword="";
    public $dbName="alumniproject";
    public $connection;

    public function Connection(){
        $this->connection=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
        if($this->connection->connect_error){
            echo "Error in Connection : ".$this->connection->connect_error;
            return false;
        }
        else{
            return true;
        }
    }

    public function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
        }
        else
        {
            echo "Connection is not opened";
        }
    }

    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $this->connection->insert_id;
        }

    }
    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $result;
        }

    } 
     
    public function select_($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            printf("Error: %s\n", $this->connection->error);
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getConnect()
    {
        $conn = new mysqli('localhost','root','','alumniproject');
        return $conn;
    }

}


?>