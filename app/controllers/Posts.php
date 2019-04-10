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
            $assignments = $this->postModel->getAssignments($_SESSION['tid']);
            $data = [
                'posts' => $posts,
                'assignments'=> $assignments
            ];
            $this->view('posts/index', $data);
        }

        elseif(isset($_SESSION['sid'])){
            $assignments = $this->postModel->allAssignments();
            $data = [
                'assignments'=> $assignments
            ];
            $this->view('posts/index', $data);
        }



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













    public function assignments(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
                'tid'=> $_SESSION['tid'],
                'abody'=>trim($_POST['abody']),
                'abody_err'=>'',

            ];


            if(empty($data['abody']))
            {
                $data['abody_err']='enter body text';
            }

            //make sure no errors
            if(empty($data['abody_err']) ){
                //validated
                if($this->postModel->addAssignment($data)){

                    redirect('posts');
                }else{
                    die('went wrong');
                }
            }else{
                //load with errors
                $this->view('posts',$data);
            }

        }else{
            $data=[
                'tid'=> '',
                'abody'=>'',
                'abody_err'=>'',

            ];
            $this->view('posts',$data);
        }

    }









    public function submit(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                'sid'=> $_SESSION['sid'],
                'tid'=>trim($_POST['tid']),
                'aid'=>trim($_POST['aid']),
                'submission'=>trim($_POST['submission']),
                'submission_err'=>''

            ];


            if(empty($data['submission']))
            {
                $data['submission_err']='enter submission';
            }

            //make sure no errors
            if(empty($data['submission_err']) ){

                //validated
                if($this->postModel->addSubmission($data)){

                    redirect('posts');
                }else{
                    die('went wrong');
                }
            }else{
                //load with errors
                $this->view('posts',$data);
            }

        }else{
            $data=[
                'sid'=> '',
                'tid'=>'',
                'aid'=>'',
                'submission'=>'',
                'submission_err'=>'',

            ];
            $this->view('posts',$data);
        }

    }



    public function getSubmissions(){
        $submissions = $this->postModel->getSubmissions($_SESSION['tid']);
        $data = [
            'submissions'=> $submissions
        ];
        $this->view('posts/submissions', $data);
    }


    public function grade(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                'sid'=>trim($_POST['sid']),
                'tid'=>$_SESSION['tid'],
                'aid'=>trim($_POST['aid']),
                'grade'=>trim($_POST['grade']),
                'grade_err'=>''

            ];


            if(empty($data['grade']))
            {
                $data['grade_err']='enter submission';
            }

            //make sure no errors
            if(empty($data['grade_err']) ){

                //validated
                if($this->postModel->gradeSubmissions($data)){

                    redirect('posts/getSubmissions');
                }else{
                    die('went wrong');
                }
            }else{
                //load with errors
                $this->view('posts/submissions',$data);
            }

        }else{
            $data=[
                'sid'=>'',
                'tid'=>'',
                'aid'=>'',
                'grade'=>'',
                'grade_err'=>''

            ];
            $this->view('posts/submissions',$data);
        }

    }

}
