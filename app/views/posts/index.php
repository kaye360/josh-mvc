<?php require APP_ROOT . '/views/includes/header.php'; ?>


<h1><?php echo $data['title']; ?></h1>

<?php foreach($data['posts'] as $post) : ?>

<div class="post">

  <h2><?php echo $post->title; ?></h2>

  <div class="post-author">
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