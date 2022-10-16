<?php

class Pages extends Controller {
    public function __construct() {
      
    }

    public function index() {
      $data = [
        'title' => 'home title',
      ];

      $this->view('pages/index', $data);
    }
    
    
    public function about() {
      $data = ['title' => 'about title'];
      $this->view('pages/about', $data);
    }
}

?>
