<?PHP
    //THIS IS THE DATABASE WRAPPER
    //YOU CAN USE IT TO ANY TABLE

class Database{
    //from config.php
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;


    //connect to database using PDO
    private $dbh; //database handler
    private $stmt; //statement


    //construc method
    public function __construct(){
        //so we do the PDO database here not in models folder

        //data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' .  $this->db_name;


        //option is used to optimize connection to database
        $option = [
            PDO::ATTR_PERSISTENT => true, //this will make our connection to database still presistent
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];


        //check if the connection works or not
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //$dsn, username, password
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    //function to do the query
    //so you can do Insert, Select, Delete, Update; it'll be more flexible
    public function query($query) {
        //prepare the query
        $this->stmt = $this->dbh->prepare($query);
    }


    //binding the data
    //we don't just type it in query
    //we need to bind so it'll be more secure; 
    public function bind($param, $value, $type=null) {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }


    //execute the data
    public function execute() {
        $this->stmt->execute();
    }


    //If you want to return many data
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //If you want to return single data
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    //method to know the row in database
    public function rowCount() {
        return $this->stmt->rowCount();
        //rowCount inisde here is from the PDO
    }

}

    


    

    