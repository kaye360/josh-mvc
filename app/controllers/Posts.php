<?php

class Posts extends Controller {

  public function __construct() {
    
    if (!isLoggedIn()) {
      redirectTo('users/login');
    }

    $this->postModel = $this->model('Post');
  }

  public function index() {

    // Get Posts
    $posts = $this->postModel->getPosts();

    $data = [
      'title' => 'Posts',
      'posts' => $posts,
    ];
    
    $this->view('posts/index', $data);
  }
  
  public function add() {
    
    $data = [
      'title' => 'Add a Post',
      'posts' => '',
    ];
    
    $this->view('posts/add', $data);
  }

}

?>