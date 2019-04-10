<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }



    public function teachersLogin()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'tusername' => trim($_POST['tusername']),
                'tpassword' => trim($_POST['tpassword']),
                'tusername_err' => '',
                'tpassword_err' => '',

            ];

            // Validate teacher username
            if (empty($data['tusername'])) {
                $data['tusername_err'] = 'Pleae enter teacher username';
            }

            // Validate teacher Password
            if (empty($data['tpassword'])) {
                $data['tpassword_err'] = 'Please enter teacher password';
            }


            // Check if teacher username exists
            if ($this->userModel->findTeacherByUsername($data['tusername'])) {
                //user found
            } else {
                $data['tusername_err'] = "no username found";
            }

            // Check if teacher password exists
            if ($this->userModel->findTeacherByPassword($data['tpassword'])) {
                //user found
            } else {
                $data['tpassword_err'] = "no password found";
            }





            // Make sure errors are empty
            if (empty($data['tusername_err']) && empty($data['tpassword_err'])) {
                // Validated
                //check and set logged in user
                $loggedInUser = $this->userModel->tLogin($data['tusername'], $data['tpassword']);
                if ($loggedInUser) {
                    // create sessions
                    $this->createTeacherSession($loggedInUser);


                } else {
                    $data['tpassword_err'] = 'password incorrect';
                    $this->view('users/teachersLogin', $data);
                }

            } else {
                //Load view with errors
                $this->view('users/teachersLogin', $data);
            }

        } else {
            // Init data
            $data = [
                'tusername' => '',
                'tpassword' => '',
                'tusername_err' => '',
                'tpassword_err' => '',

            ];

            // Load view
            $this->view('users/teachersLogin', $data);
        }
    }


    public function createTeacherSession($user){
        $_SESSION['tusername'] = $user->tusername;
        $_SESSION['tid'] = $user->tid;
        redirect('posts');
    }

    public function teachersLogout(){
        unset($_SESSION['tusername']);
        unset($_SESSION['tid']);
        session_destroy();
        redirect('pages/index');
    }















    public function studentsLogin()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'susername' => trim($_POST['susername']),
                'spassword' => trim($_POST['spassword']),
                'susername_err' => '',
                'spassword_err' => '',

            ];

            // Validate teacher username
            if (empty($data['susername'])) {
                $data['susername_err'] = 'Please enter student username';
            }

            // Validate student Password
            if (empty($data['spassword'])) {
                $data['spassword_err'] = 'Please enter teacher password';
            }


            // Check if student username exists
            if ($this->userModel->findStudentByUsername($data['susername'])) {
                //user found
            } else {
                $data['susername_err'] = "no username found";
            }

            // Check if student password exists
            if ($this->userModel->findStudentByPassword($data['spassword'])) {
                //user found
            } else {
                $data['spassword_err'] = "no password found";
            }





            // Make sure errors are empty
            if (empty($data['susername_err']) && empty($data['spassword_err'])) {
                // Validated
                //check and set logged in user
                $loggedInUser = $this->userModel->sLogin($data['susername'], $data['spassword']);
                if ($loggedInUser) {
                    // create sessions
                    $this->createStudentSession($loggedInUser);


                } else {
                    $data['spassword_err'] = 'password incorrect';
                    $this->view('users/studentsLogin', $data);
                }

            } else {
                //Load view with errors
                $this->view('users/studentsLogin', $data);
            }

        } else {
            // Init data
            $data = [
                'susername' => '',
                'spassword' => '',
                'susername_err' => '',
                'spassword_err' => '',

            ];

            // Load view
            $this->view('users/studentsLogin', $data);
        }
    }


    public function createStudentSession($user){
        $_SESSION['susername'] = $user->susername;
        $_SESSION['sid'] = $user->sid;
        redirect('posts');
    }

    public function studentsLogout(){
        unset($_SESSION['susername']);
        unset($_SESSION['sid']);
        session_destroy();
        redirect('pages/index');
    }


}
