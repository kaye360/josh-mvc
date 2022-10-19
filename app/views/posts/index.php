<?php require APP_ROOT . '/views/includes/header.php'; ?>

<?php flash('post_message'); ?>

<h1>Posts</h1>

<?php foreach($data['posts'] as $post) : ?>

<div class="post">

  <h2><?php echo $post->title; ?></h2>

  <div class="post-info">
    By: <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
  </div>

  <div class="post-content">
    <?php echo $post->body; ?>
  </div>

  <div class="post-read-more">
    <a href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn">Read More</a>
  </div>

</div>

<?php endforeach; ?>


<?php require APP_ROOT . '/views/includes/footer.php'; ?>