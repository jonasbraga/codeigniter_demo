
<?php if(validation_errors() || $error): ?>

<div class="alert alert-dismissible alert-danger mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oops!</strong>  
  <?= $error ? $error : validation_errors(); ?> 
</div>

<?php elseif($success): ?>

<div class="alert alert-dismissible alert-successs mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Post created successfully!</strong>  
</div>

<?php endif; ?>

<?= form_open('posts/create')?>
  <fieldset>
    <legend>Create a new post here!</legend>

    <div class="form-group">
      <label for="inputTitle">Title</label>
      <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Post title">
    </div>
   
    <div class="form-group">
      <label for="bodyTextarea">Content</label>
      <textarea name="body" class="form-control" id="editor1" rows="3"></textarea>
    </div>

    <div class="d-flex">    
      <a class="btn btn-primary mr-2" href="../posts/" role="button"> < Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </fieldset>
</form>