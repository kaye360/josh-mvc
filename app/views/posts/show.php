<?php require APP_ROOT . '/views/includes/header.php'; ?>

<?php flash('post_message'); ?>

<div class="back">
  <a href="<?php echo URL_ROOT; ?>/posts">Back to Posts</a>
</div>

<div class="post">

  <h1><?php echo $data['post']->title; ?></h1>

  <div class="post-info">
    Written by: <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
  </div>

  <?php echo $data['post']->body; ?>

</div>


<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
  <div class="edit-delete">
    <form action="<?php echo URL_ROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">

      <a href="<?php echo URL_ROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">Edit</a>
      <input type="submit" value="Delete Post">

    </form>
  </div>
<?php endif; ?>




<?php require APP_ROOT . '/views/includes/footer.php'; ?>
