<?php require APP_ROOT . '/views/includes/header.php'; ?>


<h1>Edit Post</h1>


<form action="<?php echo URL_ROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">

  <label>
    Title:<sup>*</sup> <br>
    <input type="text" name="title" class="edit-add-title" value="<?php echo $data['title']; ?>">
    <?php echo (!empty($data['title_error'])) ? $data['title_error'] : ''; ?>
  </label>

  <label>
    Content:<sup>*</sup> <br>
    <textarea name="body"><?php echo $data['body']; ?></textarea>
    <?php echo (!empty($data['body_error'])) ? $data['body_error'] : ''; ?>
  </label>

  <input type="submit" value="Update Post">
 
</form>


<?php require APP_ROOT . '/views/includes/footer.php'; ?>