<div class="container">
  <div id="login" class="bg-dark" style="margin-top: 20vh">
    <br>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <?= form_open('signin') ?>
            <h3 class="text-center text-info">Login</h3>
            <div class="form-group">
              <label for="email" class="text-info">Email:</label><br>
              <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
            </div>
            <div class="form-group">
              <label for="password" class="text-info">Password:</label><br>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
              <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
            </div>
            <div id="register-link" class="text-right">
              <a href="register" class="text-info">Register here</a>
            </div>

            <?php if (validation_errors() || $this->session->flashdata('login')) : ?>

              <div class="alert alert-dismissible alert-danger mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oops!</strong>
                <?= $this->session->flashdata('login') ? $this->session->flashdata('login') : validation_errors(); ?>
              </div>

            <?php endif; ?>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>