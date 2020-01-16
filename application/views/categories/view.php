<!-- This view show a especific post by its slug -->

<div class="jumbotron">
  <div class="float-right">
    <div class="d-flex">
     
  </div>
  <h1 class="display-3"><?= $post['title'] ?></h1>
  <p class="lead"><?= $post['body'] ?></p>
  <hr class="my-4">
  <p>Posted on <?= date("d/m/Y", strtotime($post['created_at'])); ?>.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="../posts/" role="button"> < Back</a>
  </p>
</div>