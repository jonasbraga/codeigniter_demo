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
  <hr class="my-4">
  <p>Posted on <?= date("d/m/Y", strtotime($post['created_at'])); ?>.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="../posts/" role="button"> < Back</a>
  </p>
</div>