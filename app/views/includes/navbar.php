<nav class="container">

  <div class="site-title">
    <?php echo SITE_NAME; ?>
  </div>

  <ul>
    <li><a href="<?php echo URL_ROOT; ?>">Home</a></li>
    <li><a href="<?php echo  URL_ROOT; ?>/posts/">Posts</a></li>
    <li><a href="<?php echo  URL_ROOT; ?>/pages/about">About</a></li>
    
    <?php if(isset($_SESSION['user_id'])) : ?>
      
    <li><a href="<?php echo  URL_ROOT; ?>/posts/add">Add Post</a></li>
    <li><a href="<?php echo  URL_ROOT; ?>/users/logout">Sign Out</a></li>

    <?php else : ?>
    <li><a href="<?php echo  URL_ROOT; ?>/users/register">Register</a></li>
    <li><a href="<?php echo  URL_ROOT; ?>/users/login">Sign In</a></li>

    <?php endif; ?>

  </ul>

  <?php 
  if(isset($_SESSION['user_id'])) {
    echo '<div class="logged-in">Logged in as: ' . $_SESSION['user_name'] . '</div>';
  }      
  ?>


</nav>
