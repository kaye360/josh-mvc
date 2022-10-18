<?php require APP_ROOT . '/views/includes/header.php'; ?>

<h2>Login</h2>
<p>
  Please enter your credentials to log in.
</p>

<?php flash('register_success'); ?>

<form action="<?php echo URL_ROOT; ?>/users/login" method="post">

  <label>
    Email:<sup>*</sup> 
    <input type="text" name="email">
    <?php echo (!empty($data['email_error'])) ? $data['email_error'] : ''; ?>
  </label>

  <label>
    Password:<sup>*</sup> 
    <input type="text" name="password">
    <?php echo (!empty($data['password_error'])) ? $data['password_error'] : ''; ?>
  </label>

  <input type="submit" value="Sign up">
  <a href="<?php echo URL_ROOT; ?>/users/login/">Login</a>
 
</form>


<?php require APP_ROOT . '/views/includes/footer.php'; ?>