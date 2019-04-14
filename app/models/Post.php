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

    public function addAssignment($data){
        $this->db->query( 'INSERT INTO assignments (tid, abody) VALUES (:tid, :abody)');
        $this->db->bind(':tid', $data['tid']);
        $this->db->bind(':abody', $data['abody']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getPosts($tid)
    {
        $this->db->query('SELECT * FROM posts WHERE tid = :tid');
        // gives an array of objects
        $this->db->bind(':tid', $tid);
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }

    public function getAssignments($tid)
    {
        $this->db->query('SELECT * FROM assignments WHERE tid = :tid');
        // gives an array of objects
        $this->db->bind(':tid', $tid);
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }

//    public function allAssignments()
//    {
//        $this->db->query('SELECT * FROM assignments');
//        // gives an array of objects
//        $results = $this->db->resultSet(); // used to return more than 1 row
//        return $results;
//    }

    public function allAssignments($sid)
    {
        $this->db->query('select a.*, b.submission FROM
assignments as a
LEFT JOIN
(select * from submissions WHERE sid=:sid) as b
ON a.aid = b.aid;');
        $this->db->bind(':sid', $sid);
        // gives an array of objects
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }




    public function getAllPosts(){
         $this->db->query('SELECT * FROM posts ORDER BY pid DESC');
        // gives an array of objects
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }


    public function addSubmission($data){
        $this->db->query( 'INSERT INTO submissions (aid, tid, sid, submission) VALUES (:aid, :tid, :sid, :submission)');
        $this->db->bind(':aid', $data['aid']);
        $this->db->bind(':tid', $data['tid']);
        $this->db->bind(':sid', $data['sid']);
        $this->db->bind(':submission', $data['submission']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getSubmissions($tid)
    {
        $this->db->query('SELECT * FROM submissions WHERE tid = :tid');
        // gives an array of objects
        $this->db->bind(':tid', $tid);
        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }


    public function gradeSubmissions($data){
        $this->db->query( 'UPDATE submissions SET grade=:grade WHERE (aid=:aid and sid=:sid and tid=:tid)');
        $this->db->bind(':aid', $data['aid']);
        $this->db->bind(':tid', $data['tid']);
        $this->db->bind(':sid', $data['sid']);
        $this->db->bind(':grade', $data['grade']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



    public function submitEdit($data){
        $this->db->query( 'UPDATE posts SET pbody=:pbody WHERE (pid=:pid and tid=:tid)');
        $this->db->bind(':pid', $data['pid']);
        $this->db->bind(':tid', $data['tid']);
        $this->db->bind(':pbody', $data['pbody']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function deletePost($data){

        $this->db->query( 'DELETE FROM posts WHERE (pid=:pid and tid=:tid)');
        $this->db->bind(':pid', $data['pid']);
        $this->db->bind(':tid', $data['tid']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}


