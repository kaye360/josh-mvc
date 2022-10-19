<?php

class Posts extends Controller {

  public function __construct() {
    
    if (!isLoggedIn()) {
      redirectTo('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index() {

    // Get Posts
    $posts = $this->postModel->getPosts();

    $data = [
      'posts' => $posts,
    ];
    
    $this->view('posts/index', $data);
  }
  
  public function add() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize post
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // Validate Title
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter a title.';
      }
      
      // Validate Body
      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter a post.';
      }

      // Make sure no errors
      if (empty($data['title_error']) && empty($data['body_error'])) {
        
        // Validated
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post Added Successfully');
          redirectTo('posts');
        } else {
          die('Something went wrong');
        }

      } else {
        // Load view with errors
        $this->view('posts/add', $data);
      }
      
    } else {
      
      $data = [
        'body' => '',
      ];
      
      $this->view('posts/add', $data);

    }
  }

  public function edit($id) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize post
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // Validate Title
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter a title.';
      }
      
      // Validate Body
      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter a post.';
      }

      // Make sure no errors
      if (empty($data['title_error']) && empty($data['body_error'])) {
        
        // Validated
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated Successfully');
          redirectTo('posts/show/' . $data['id']);
        } else {
          die('Something went wrong');
        }

      } else {
        // Load view with errors
        $this->view('posts/edit', $data);
      }
      
    } else {
      // Get Current post
      $post = $this->postModel->getPostById($id);
      
      // Get Owner of post
      if($post->user_id != $_SESSION['user_id']) {
        redirectTo('posts');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body,
      ];
      
      $this->view('posts/edit', $data);

    }
  }


  public function show($id) {

    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->findUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user,
    ];
    $this->view('posts/show', $data);
  }

  public function delete($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $post = $this->postModel->getPostById($id);

      if($post->user_id != $_SESSION['user_id']) {
        redirectTo('posts');
      }

      if ($this->postModel->deletePost($id)) {
        flash('post_message', 'Post Removed');
        redirectTo('posts');
      } else {
        die('Something went wrong');
      }

    } else {
      redirect('posts');
    }
  }

}

?>