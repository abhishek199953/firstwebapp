<?php include('header.php') ?>

<!-- <div style="background-image: url('../Assets/images/one.jpg') ;"> -->

<div class="container" style="margin-top: 20px ;">
<h1>Log in Form</h1>
<?php  if($error=$this->session->flashdata('Login_failed')):  ?>
<div class="row">
<div class="col-lg-6">
<div class="alert alert-danger">
<?= $error; ?>
</div>
</div>
</div>
<?php $this->session->unset_userdata('Login_failed'); ?> 
<?php endif; ?>




<?php echo form_open('login/index') ?>


    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label for="uname">Username:</label>
      <!-- <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required> -->
      <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter username',
      'name'=>'uname','value'=>set_value('uname') ]) ; ?>



      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback"></div>
    </div>
    </div>
          <div class="col-lg-6" style="margin-top: 40px;">
          <?php echo form_error('uname'); ?>
          </div>
    </div>
 
  <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="pwd">Password:</label>
      <!-- <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required> -->
      <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter password',
      'name'=>'pass', 'value'=>set_value('pass')]) ; ?>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback"></div>
    </div>
  </div>
        <div class="col-lg-6" style="margin-top: 40px;">
        <?php  echo form_error('pass')?>
        </div>

  </div>

  
 <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']) ?>
 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']) ?>
 <?php echo anchor('register/', 'Sign up?', 'class="link-class"') ?>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

  
</div>

<?php include('footer.php') ?>

















