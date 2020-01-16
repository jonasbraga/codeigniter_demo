<!-- Create a new category here -->

<?php if(validation_errors() || $error): ?>

<div class="alert alert-dismissible alert-danger mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oops!</strong>  
  <?= $error ? $error : validation_errors(); ?> 
</div>

<?php elseif($success): ?>

<div class="alert alert-dismissible alert-success mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Category created successfully!</strong>  
</div>

<?php endif; ?>

<?= form_open('categories/create')?>
  <fieldset>
    <legend>Create a new category here!</legend>

    <div class="form-group">
      <label for="inputName">Name</label>
      <input name="name" type="text" class="form-control" id="inputName" placeholder="Category name">
    </div>

    <div class="d-flex">    
      <a class="btn btn-primary mr-2" href="../categories/" role="button"> < Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </fieldset>
</form>