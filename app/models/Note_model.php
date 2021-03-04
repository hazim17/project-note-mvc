<?PHP 

//database name: keepclone
//table name: noteposts
//it has 3 column: id, titlenote, contentnote

class Note_model {
    private $db; //database
    private $table = 'noteposts';

    public function __construct() {
        //we don't do the database in models folder, but in Database.php inisde core folder
        //we just call that Database.php fule in here (in the each file of models folder)
        $this->db = new Database;
    }

    
    //method for title and content note
    public function getAllNote() {
        //query, method from Database.php
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet(); //resultSet is method from Database.php
    }

    //method for detail note
    public function getNoteById($id) {
        //query, from class Database.php
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        //We do id=:id, to make secure the id; so we can avoid sql injection

        //bind the id
        $this->db->bind('id', $id); 
        //bind is from  app > core > Database.php

        //we're using single if the data is single row (from database/mysql)
        //single is a method from Database.php
        return $this->db->single();
    }


    //method for add data
    public function addDataNote($data) {
        $query = "INSERT INTO noteposts
                    VALUES
                ('', :titlenote, :contentnote)";

        //add query function, from Database.php
        $this->db->query($query);

        //bind the query
        //'bind' is from  app > core > Database.php
        $this->db->bind('titlenote', $data['titlenote']);
        $this->db->bind('contentnote', $data['contentnote']);
        //$data['titlenote'] or $data['contentnote'] we get it from  app > views > display > index.php; look at the form, name="titlenote"


        //execute, is a method from  app > core > Database.php
        $this->db->execute();

        //return number, for function addnote in controllers > Display.php
        //rowCount, is a method from  app > core > Database.php
        return $this->db->rowCount();
        //if it works, it'll return 1
    }

    //new method to delete data
    public function deleteDataNote($id) {
        $query = "DELETE FROM noteposts WHERE id = :id";

        //insert that to the query method, from class Database.php
        $this->db->query($query);

        //bind the query
        $this->db->bind('id', $id);

        //execute, is a method from app > core > Database.php
        $this->db->execute();

        //return number, for function delete in controllers > Display.php
        //rowCount, is a method from  app > core > Database.php
        return $this->db->rowCount();
        //if it works, it'll return 1
    }


    //new method to edit data note
    public function editDataNote($data) {
        var_dump($data);
        $query = "UPDATE noteposts SET
                    titlenote = :titlenote,
                    contentnote = :contentnote
                WHERE id = :id";
        
        //insert that to the query method, from class Database.php
        $this->db->query($query);

        //bind the query
        //bind is from app > core > Database.php
        //$data['id']; we get it from  app > views > display > index.php; look at the form, name="id"
        $this->db->bind('titlenote', $data['titlenote']); 
        //$data['titlenote']; we get it from  app > views > display > index.php; look at the form, name="titlenote"
        $this->db->bind('contentnote', $data['contentnote']); 
        //$data['contentnote']; we get it from  app > views > display > index.php; look at the form, name="contentnote"
        $this->db->bind('id', $data['id']); 

        //execute, is a method from app > core > Database.php
        $this->db->execute();

        //return number, for function delete in controllers > Display.php
        //rowCount, is a method from  app > core > Database.php
        return $this->db->rowCount();
        //if it works, it'll return 1
    }
}