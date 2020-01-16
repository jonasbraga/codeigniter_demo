<!-- This view show all post in the database -->
<div class="d-flex my-3">
  <div class="w-50">
    <h2>Latest Posts</h2>
  </div>
  <div class="w-50">
    <a href="<?php echo site_url('/posts/create') ?>" class="btn btn-primary float-right"> + New post </a>
  </div>  
</div>
<div class="container">
  <div class="row">
    <?php foreach($posts as $post):?>
      <div class="col-md-4">
        <div class="card text-white bg-primary m-3 p-0">
          <div class="card-header">
            <?= $post['slug'] ?>
            <span class="float-right"><?= date("d/m/Y", strtotime($post['created_at'])); ?></span>
          </div>
          <div class="card-body">
            <h4 class="card-title"><?= $post['title'] ?></h4>
            <p class="card-text"><?= word_limiter($post['body'], 25) ?></p>
          </div>
          <div class="card-footer">
            <a href="<?php echo site_url('/posts/'. $post['slug']) ?>" class="btn btn-primary"> Read more </a>
          </div>
        </div>
      </div>
    <?php endforeach;?>
  </div>      
</div>
