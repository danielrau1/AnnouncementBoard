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













    /**************************** STUDENT LOGIN ******************************/
    // Find teacher by username
    public function findStudentByUsername($susername){
        $this->db->query('SELECT * FROM students WHERE susername = :susername');
        // Bind value
        $this->db->bind(':susername', $susername);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }


    // Find teacher by password
    public function findStudentByPassword($spassword){
        $this->db->query('SELECT * FROM students WHERE spassword = :spassword');
        // Bind value
        $this->db->bind(':spassword', $spassword);
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
    public function sLogin($susername, $spassword){
        $this->db->query('SELECT * FROM students WHERE (susername= :susername and spassword=:spassword)');
        $this->db->bind(':susername', $susername);
        $this->db->bind(':spassword', $spassword);
        $row =$this->db->single();
        $hashed_spassword = $row->spassword;
        $hashed_susername = $row->susername;
        if($spassword== $hashed_spassword and $susername==$hashed_susername){
            return $row;
        }else{
            return false;
        }
    }

    /**************************************************************************/





}
