<?php
include('header.php') ;
?>
<div class='container' style="margin-top:40px;margin-bottom:40px;">
    <h1>Registration</h1>
    <?php echo form_open('login/sendmail');?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>User Name</label>
                <?php echo form_input(['class'=>'form-control','id'=>'username','name'=>'username','value'=>set_value('username')]);?>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px">
            <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
            <?php echo form_error('username');?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Password</label>
                <?php echo form_password(['class'=>'form-control','id'=>'password','value'=>set_value('password'),'name'=>'password']);?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px">
            <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
            <?php echo form_error('password');?>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>First Name</label>
                <?php echo form_password(['class'=>'form-control','id'=>'firstname','value'=>set_value('firstname'),'name'=>'firstname']);?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px">
            <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
            <?php echo form_error('firstname');?>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Last Name</label>
                <?php echo form_password(['class'=>'form-control','id'=>'lastname','value'=>set_value('lastname'),'name'=>'lastname']);?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px">
            <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
            <?php echo form_error('lastname');?>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Email</label>
                <?php echo form_password(['class'=>'form-control','id'=>'email','value'=>set_value('email'),'name'=>'email']);?>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top:40px">
            <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
            <?php echo form_error('email');?>
    </div>
    </div>
    <?php 
        echo form_submit(['type'=>'submit','class'=>'btn','value'=>'Register']);
        echo form_reset(['type'=>'reset','class'=>'btn','value'=>'Reset']);
        echo anchor('admin/index', 'Sign In?', 'title="Registration"');
    ?>
</div>
<?php
include('footer.php') ;
?>
