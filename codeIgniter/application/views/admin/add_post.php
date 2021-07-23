<?php include('include/header.php')  ?>

<div id="login">
    <h3 class="text-center pt-5">Add Post</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <!-- <form id="login-form" class="form" action="" method="post"> -->
                	<?php echo form_open_multipart('admin/store_post', ['class'=>"form", 'id' => 'login-form' ]); ?>
                        <h3 class="text-center text-info">Add Post</h3>
                        <?php 
                            if ($error = $this->session->flashdata('login_failed')) {
                                echo '<p class="text-danger alert-danger">'.$error.'</p>';
                            }
                        ?>
                        <div class="form-group">
                            <label for="title" class="text-info">Title:</label><br>
                            <?php echo form_input(['name'=>'title','id'=>'title','class'=>"form-control", 'value'=>set_value('title')]); ?>
                            <?php echo form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-info">Description:</label><br>
                            <?php echo form_textarea(['name'=>'description','id'=>'description','class'=>"form-control", 'value'=>set_value('description')]); ?>
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-info">Select Image:</label><br>
                            <?php echo form_upload(['name'=>'post_image','class'=>"form-control"]); ?>
                            <?php if (isset($upload_error)) echo $upload_error; ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit(['name'=>'submit','value'=>'submit','class'=>"btn btn-info btn-md"]); ?>
                            
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php')  ?>
