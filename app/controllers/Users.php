<?php

class Users extends Controller {

  public function __construct() {
    $this->userModel = $this->model('User');

  }

  public function register() {

    // Check for POST req
    if($_SERVER['REQUEST_METHOD'] == 'POST')  {

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      // Process form
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];

      // name Name, Email, Password, and Confirm Password

      if (empty($data['name'])) $data['name_error'] = 'Please enter a valid name.';
      
      if (empty($data['email'])) {
        $data['email_error'] = 'Please enter a valid email.';
      } else {
        // Check email
        if($this->userModel->findUserByEmail($data['email'])) {
          $data['email_error'] = 'Email is already taken.';
        }
      }

      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter a password.';
      } elseif (strlen( $data['password']) < 6 ) {
        $data['password_error'] = 'Password must be at least 6 characters.';
      }

      if (empty($data['confirm_password'])) {
        $data['confirm_password_error'] = 'Please Confirm your password.';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_error'] = 'Passwords do not match.';
        }
      }

      // Make sure no errors
      if (
        empty($data['email_error']) && 
        empty($data['name_error']) && 
        empty($data['password_error']) &&
        empty($data['confirm_password_error']) 
        ) {
        
        // Validated
          
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {

          // Display flash Message

          flash('register_success', 'You are now registered and can log in.');

          // Redirect to login page
          redirectTo('users/login');

        } else {

          echo 'something went wrong';
        }

      } else {
        $this->view('users/register', $data);
      }

    } else {

      // Init Data & Load View
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];

      // Load View
      $this->view('users/register', $data);
    }
  }





  public function login() {

    // Check for POST req
    if($_SERVER['REQUEST_METHOD'] == 'POST')  {
 
    // Sanitize POST data
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    // Process form
    $data = [
      'email' => trim($_POST['email']),
      'password' => trim($_POST['password']),
      'email_error' => '',
      'password_error' => '',
    ];

    //Validate Email and Password
    if (empty($data['email'])) $data['email_error'] = 'Please enter a valid email.';

    if (empty($data['password'])) $data['password_error'] = 'Please enter a password.';

    // Check for user/email
    if ($this->userModel->findUserByEmail($data['email'])) {

      // Check/set logged in user
      $loggedInUser = $this->userModel->login($data['email'], $data['password']);

      if ($loggedInUser) {

        // Create session variables
        $this->createUserSession($loggedInUser);

      } else {
        $data['password_error'] = 'Password Incorrect';
        $this->view('users/login', $data);
      }

    } else {
      $data['email_error'] = 'No User Found';
    }

    // Make sure no errors
    if ( empty($data['email_error']) && empty($data['password_error']) ) {
        echo 'success';
      } else {
        $this->view('users/login', $data);
      }

    } else {
      // Get Data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];

    // Load View
    $this->view('users/login', $data);
    }
  }


  public function createUserSession($user) {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;

    redirectTo('posts/');
  }


  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();

    redirectTo('users/login');
  }



}

?>