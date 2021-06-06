<?php
include('header.php'); ?>
<html>

<body>
  <div class="container" style="margin-top:40px;margin-bottom:40px;">
    <div class="row">
      <div class="col-md-6">
        <h1>Articles List</h1>
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
            <th scope="col">Article Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($arrArticles)) :
            $count = 0;
            foreach ($arrArticles as $recValue) :
              $count++;
          ?>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo !empty($recValue->article_title) ? $recValue->article_title : ""; ?></td>
                <td><a href=<?php echo base_url('index.php/admin/editarticle/'.$recValue->id.'');?> class="btn">Edit</td>
                <td> <?=
                      form_open('admin/deletearticle'),
                      form_hidden('id', $recValue->id),
                      form_submit(['type' => 'submit', 'value' => 'Delete', 'class' => 'btn']);
                      ?> </td>
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
        <?= $this->pagination->create_links(); ?>
      </table>
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </div>
</body>

</html>

<?php
include('footer.php'); ?>