
<?php if(validation_errors() || $error): ?>

  <div class="alert alert-dismissible alert-danger mt-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Oops!</strong>  
    <?= $error ? $error : validation_errors(); ?> 
  </div>

<?php endif; ?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title text-center">Sign up!</h3>
    </div>
    <div class="panel-body">
    <?= form_open('users/signup') ?>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?= set_value('first_name') ?>">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?= set_value('last_name') ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?= set_value('email') ?>">
        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
            </div>
          </div>
        </div>
        
        <input type="submit" value="Register" class="btn btn-info btn-block">
      
      </form>
    </div>
  </div>
</div>