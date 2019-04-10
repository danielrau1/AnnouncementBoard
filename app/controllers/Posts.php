<?php

class Posts extends Controller{


    public function __construct()
    {

        $this->postModel = $this->model('Post');
       // $this->userModel = $this->model('User');

    }

    public function index(){
        //Get posts
        if(isset($_SESSION['tid'])) {
            $posts = $this->postModel->getPosts($_SESSION['tid']);
            $data = [
                'posts' => $posts
            ];
        }
        $this->view('posts/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                'tid'=> $_SESSION['tid'],
                'pbody'=>trim($_POST['pbody']),
                'pbody_err'=>'',

            ];


            if(empty($data['pbody']))
            {
                $data['pbody_err']='enter body text';
            }

            //make sure no errors
            if(empty($data['pbody_err']) ){
                //validated
                if($this->postModel->addPost($data)){

                    redirect('posts');
                }else{
                    die('went wrong');
                }
            }else{
                //load with errors
                $this->view('posts/add',$data);
            }

        }else{
            $data=[
                'tid'=> '',
                'pbody'=>'',
                'pbody_err'=>'',

            ];
            $this->view('posts/add',$data);
        }

    }

}
