<?php

class Pages extends Controller{


    public function __construct(){

        $this->postModel = $this->model('Post');
    }


    public function index(){
// Get all posts and input when nobody is registered
        if(!isset($_SESSION['tid']) and !isset($_SESSION['sid']) ) {
            $posts = $this->postModel->getAllPosts();


        }
        $data = [
            'title'=>'AnnouncementBoard',
            'posts'=>$posts

        ];

        $this->view('pages/index',$data);


    }





}
