<?php require APP_ROOT . '/views/includes/header.php'; ?>

<h2>Create an Account</h2>


<form action="<?php echo URL_ROOT; ?>/users/register" method="post">

  <label for="name">
    Name:<sup>*</sup> 
    <input type="text" name="name">
    <?php echo (!empty($data['name_error'])) ? $data['name_error'] : ''; ?>
  </label>

  <label for="email">
    Email:<sup>*</sup> 
    <input type="text" name="email">
    <?php echo (!empty($data['email_error'])) ? $data['email_error'] : ''; ?>
  </label>

  <label for="name">
    Password:<sup>*</sup> 
    <input type="text" name="password">
    <?php echo (!empty($data['password_error'])) ? $data['password_error'] : ''; ?>
  </label>

  <label for="name">
    Confirm Password:<sup>*</sup> 
    <input type="text" name="confirm_password">
    <?php echo (!empty($data['confirm_password_error'])) ? $data['confirm_password_error'] : ''; ?>
  </label>

  <input type="submit" value="Sign up">
  <a href="<?php echo URL_ROOT; ?>/users/login/">Login</a>
 
</form>

<?php require APP_ROOT . '/views/includes/footer.php'; ?>