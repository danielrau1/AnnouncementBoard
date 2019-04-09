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
            if (empty($data['tusername_err']) && empty($data['password_err'])) {
                // Validated
                //check and set logged in user
                $loggedInUser = $this->userModel->tLogin($data['tusername'], $data['tpassword']);
                if ($loggedInUser) {
                    // create sessions
                    $this->createUserSession($loggedInUser);


                } else {
                    $data['password_err'] = 'password incorrect';
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


    public function createUserSession($user){
        $_SESSION['tusername'] = $user->tusername;
        $_SESSION['tid'] = $user->tid;
        redirect('posts');
    }

}
