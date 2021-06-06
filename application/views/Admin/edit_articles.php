<?php
include('header.php') ;
?>
<div class='container' style="margin-top:40px;margin-bottom:40px">
<h1>Add Articles</h1>
<?php
if($success = $this->session->flashdata('updateArticle')){
?>
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-danger">
      <?php echo $success;?>
      </div>
    </div>
  </div>
  <?php
}
?>
    <?php
    echo form_open("Admin/updatearticle/{$id}");
    // echo "<pre>";print_r($arrArticle);exit;
    // echo form_hidden('user_id',$this->session->userdata('id'));
    ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Article Title</label>
          <?php
          // echo "<pre>";print_r($arrArticle->article_title);exit;
          echo form_input(['class'=>'form-control','id'=>'article_title','name'=>'article_title','value'=>set_value('article_title',$arrArticle->article_title)]);  ?>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
      </div>
      <div class="col-lg-6" style="margin-top:40px">
        <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
        <?php echo form_error('article_title');?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Article Body</label>
          <?php echo form_textarea(['class'=>'form-control','id'=>'article_body','name'=>'article_body','value'=>set_value('article_body',$arrArticle->article_body),]);?>
        </div>
      </div>
      <div class="col-lg-6" style="margin-top:40px">
        <!-- <?php //echo form_error('uname',"<div class='text-danger'>","</div>");?> -->
        <?php echo form_error('article_body');?>
    </div>
</div>
<?php 
        echo form_submit(['type'=>'submit','class'=>'btn','value'=>'Submit']);
        echo form_reset(['type'=>'reset','class'=>'btn','value'=>'Reset']);
        ?> 
</div>
<?php
include('footer.php') ;
?>
