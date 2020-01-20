<!-- This view show a especific post by its slug -->

<div class="jumbotron">
  <div class="float-right">
    <div class="d-flex">
      <a href="edit/<?= $post['slug'] ?>" class="btn btn-secondary px-3 mr-2"> Edit</a>
      <?= form_open('posts/delete/'.$post['id']) ?>
        <button type="submit" class="btn btn-danger"> Delete</button>
      </form>
    </div>
  </div>
  <h1 class="display-3"><?= $post['title'] ?></h1>
  <p class="lead"><?= $post['body'] ?></p>
  <div class="row">
    <img class="mx-auto thumbnail" src="<?= site_url() . 'assets/images/posts/'. $post['image'] ?>" alt="">
  </div>
  <span class="badge badge-secondary"><?= $post['category'] ?></span>
  <hr class="my-4">
  <p>Posted on <?= date("d/m/Y", strtotime($post['created_at'])); ?>.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="../posts/" role="button"> < Back</a>
  </p>
</div>

<br>

<h3>Comments</h3>

<?php if(validation_errors() || $error): ?>

<div class="alert alert-dismissible alert-danger mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oops!</strong>  
  <?= $error ? $error : validation_errors(); ?> 
</div>

<?php elseif($success): ?>

<div class="alert alert-dismissible alert-success mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Comment posted successfully!</strong>  
</div>

<?php endif; ?>

<?= form_open('comments/create/'.$post['slug']) ?>
  <input type="hidden" name="id" value="<?= $post['id'] ?>">
  <legend>Add a comment here!</legend>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="inputName">Name</label>
      <input name="name" type="text" class="form-control" id="inputName" placeholder="Your name">
    </div>
    <div class="col-md-6">
      <label for="inputEmail">Email</label>
      <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Your email">
    </div>
  </div>
  <div class="form-group">
    <label for="commentTextarea">Comment</label>
    <textarea name="comment" class="form-control" id="commentTextarea" rows="3"></textarea>
  </div>
  <div>
    <button class="btn btn-danger">Comment</button>
  </div>
</form>

<br>
<hr>

<?php foreach($comments as $comment):?>

  <blockquote class="blockquote ">
    <h4><?= $comment['name'] ?></h4>
    <footer class="blockquote-footer"><?= format_date($comment['created_at'], 'd/m/Y H:i') ?></footer>
    <p class="mb-0"><?= $comment['body'] ?>.</p>
  </blockquote>

<?php endforeach;?>