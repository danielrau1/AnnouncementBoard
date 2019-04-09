<?php
class Post{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function addPost($data){
        $this->db->query( 'INSERT INTO posts (tid, pbody) VALUES (:tid, :pbody)');
        $this->db->bind(':tid', $data['tid']);
        $this->db->bind(':pbody', $data['pbody']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getPosts($tid){
        $this->db->query('SELECT * FROM posts WHERE tid = :tid');
 // gives an array of objects
        $this->db->bind(':tid', $tid);
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }

}
