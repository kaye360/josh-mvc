<?php require APP_ROOT . '/views/includes/header.php'; ?>


<h1><?php echo $data['title']; ?></h1>


<form action="<?php echo URL_ROOT; ?>/posts/add" method="post">

  <label>
    Title:<sup>*</sup> <br>
    <input type="text" name="title">
    <?php echo (!empty($data['title_error'])) ? $data['title_error'] : ''; ?>
  </label>

  <label>
    Content:<sup>*</sup> <br>
    <textarea name="body">
      <?php echo $data['body']; ?>
    </textarea>
    <?php echo (!empty($data['body_error'])) ? $data['body_error'] : ''; ?>
  </label>

  <input type="submit" value="Add Post">
 
</form>


<?php require APP_ROOT . '/views/includes/footer.php'; ?>