<?php
include('header.php');
?>
<div class='container' style='margin-bottom:40px;margin-top:40px;'>
  <h1>Login Form</h1>
  <?php
  if ($error = $this->session->flashdata('login_failed')) {
  ?>
    <div class="row">
      <div class="col-md-6">
        <div class="alert alert-danger">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php echo form_open('admin/login'); ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>User Name<span style="color:red;">*</span></label>
        <?php echo form_input([
          'class' => 'form-control', 'id' => 'username', 'name' => 'uname',
          'value' => set_value('uname')
          ]); ?>
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px;">
      <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");
            ?> -->
      <?php echo form_error('uname'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Password<span style="color:red;">*</span></label>
        <?php echo form_password([
          'class' => 'form-control', 'id' => 'password',
          'value' => set_value('password'),'name' => 'password'
        ]); ?>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px">
      <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");
            ?> -->
      <?php echo form_error('password'); ?>
    </div>

  </div>
  <?php
  echo form_submit(['type'=>'submit','class'=>'btn','value'=>'Login']);
  echo form_reset(['type'=>'reset','class'=>'btn','value'=>'Reset']);
  echo anchor('login/registration', 'Sign Up?', 'title="Registration"');
  ?>
</div>
<?php
include('footer.php');
?>