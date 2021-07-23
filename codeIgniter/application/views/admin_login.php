<?php include('include/header.php')  ?>

<div id="login">
    <h3 class="text-center pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <!-- <form id="login-form" class="form" action="" method="post"> -->
                	<?php echo form_open('login/admin_login', ['class'=>"form", 'id' => 'login-form' ]); ?>
                        <h3 class="text-center text-info">Login</h3>
                        <?php 
                            if ($error = $this->session->flashdata('login_failed')) {
                                echo '<p class="alert alert-danger">'.$error.'</p>';
                            }
                        ?>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <?php echo form_input(['name'=>'username','id'=>'username','class'=>"form-control", 'value'=>set_value('username')]); ?>
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <?php echo form_password(['name'=>'password','id'=>'password','class'=>"form-control"]); ?>
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <?php echo form_submit(['name'=>'submit','value'=>'submit','class'=>"btn btn-info btn-md"]); ?>
                            
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="#" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php')  ?>
