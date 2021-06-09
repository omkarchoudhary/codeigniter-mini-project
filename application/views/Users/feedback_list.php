<?php
include('header.php'); ?>
<html>

<body>
  <div class="container" style="margin-top:40px;margin-bottom:40px;">
    <div class="row">
      <div class="col-md-6">
        <h1><?php
            // echo "<pre>";print_r($data['title']);exit;
        echo !empty($data['title']) ? $data['title']: "";?></h1>
      </div>
      <div class="col-md-6">
        <a href=<?php echo base_url('index.php/admin/addarticle');?> class="btn btn-lg">Add Article</a>
      </div>
    </div>
    <?php $msg = $this->session->flashdata('deleteArticle');
    if ($msg) {
    ?>
      <div class="row">
        <div class="col-md-6">
          <div class="alert alert-success">
            <?php echo $msg; ?>
          </div>
        </div>
      </div><?php
          }
            ?>
    <div class="table">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Feebback1</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($data['feedbackInfo'])) :
            $count = 0;
            foreach ($data['feedbackInfo'] as $recValue) :
              $count++;
          ?>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo !empty($recValue->name) ? $recValue->name : ""; ?></td>
                <td><?php echo !empty($recValue->email) ? $recValue->email : ""; ?></td>
                <td><?php echo !empty($recValue->feedback1) ? $recValue->feedback1 : ""; ?></td>
              </tr>
            <?php
            endforeach;
          else :
            ?>
            <tr>
              <td colspan="3">
                No data avaiable
              </td>
            </tr> <?php
                endif;
                  ?>
        </tbody>
        <?php //$this->pagination->create_links(); ?>
      </table>
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
    <form method="post" action="<?php echo base_url();?>index.php/export/createXLS">
    <?php
  echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Export']);
  ?>
    </form> 
</body>

</html>

<?php
include('footer.php'); ?>