<?php

// Page redirect

function redirectTo($page) {
  header('location: ' . URL_ROOT . '/' . $page);
}

?>