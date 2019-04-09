<?php
class User{


    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    /**************************** TEACHER LOGIN ******************************/
    // Find teacher by username
    public function findTeacherByUsername($tusername){
        $this->db->query('SELECT * FROM teachers WHERE tusername = :tusername');
        // Bind value
        $this->db->bind(':tusername', $tusername);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }


    // Find teacher by password
    public function findTeacherByPassword($tpassword){
        $this->db->query('SELECT * FROM teachers WHERE tpassword = :tpassword');
        // Bind value
        $this->db->bind(':tpassword', $tpassword);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

// Login teacher once know that teacher username and password exist

    //Login user
    public function tLogin($tusername, $tpassword){
        $this->db->query('SELECT * FROM teachers WHERE (tusername= :tusername and tpassword=:tpassword)');
        $this->db->bind(':tusername', $tusername);
        $this->db->bind(':tpassword', $tpassword);
        $row =$this->db->single();
        $hashed_tpassword = $row->tpassword;
        $hashed_tusername = $row->tusername;
        if($tpassword== $hashed_tpassword and $tusername==$hashed_tusername){
            return $row;
        }else{
            return false;
        }
    }

    /**************************************************************************/

}
