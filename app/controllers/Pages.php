<?php

class Pages extends Controller {
    public function __construct() {
      
    }

    public function index() {
      $data = [
        'title' => 'SharePosts',
        'description' => 'A simple social media network built with a PHP MVC framework.'
      ];

      $this->view('pages/index', $data);
    }
    
    
    public function about() {
      $data = [
        'title' => 'About',
        'description' => 'App to share posts with other users'
      ];
      $this->view('pages/about', $data);
    }
}

?>
