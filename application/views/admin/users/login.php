<?php $atts = array('id' => 'login_form', 'class' => 'form-signin', 'role' => 'form');  ?>
<?php echo form_open('admin/users/login' ,$atts); ?>

     
        <h2 class="form-signin-heading">Patricks Blog Admin Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<?php echo form_close();  ?>

  