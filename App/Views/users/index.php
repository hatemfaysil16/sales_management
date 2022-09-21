

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Users</h2></div>
        <div class="col-sm-6">
          <ul class="list-unstyled pull-right links">
        <?php    if ($_SESSION['user']->aed_users_aed) { ?>

            <li><a href="<?= App::$path; ?>users/add"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
            <?php } ?>
            <li onclick="showBox('box-search', event);"><a href="#"><span class="btn btn-danger"><i class="fa fa-search fa-lg"></i> Search</span></a></li>
          </ul>
      </div>
    </div>

    <div class="box-search">
    <hr>
   <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-search fa-lg"></i> Search</div>

      <div class="panel-body">
        <form  method="POST" id="form_search_info">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
              <?= $form->input('Item ID:', 'ref', [
                'id'=>'ref',
                'placeholder'=>'Enter Item ID...',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'max100'
                ]); ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
            <?= $form->input('Item Name:', 'desig', [
                'id'=>'desig',
                'placeholder'=>'Enter Name Of Item',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'1-100'
                ]); ?>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <?= $form->select('Category: ', 'category_id',
            ['id'=>'category_id',
             'data-validation-optional'=>'true'], $categories, true); ?>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <?= $form->select('Unit: ', 'unit_id',
            ['id'=>'unit_id',
            'data-validation-optional'=>'true'],
              $units, true); ?>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <?= $form->select('Tva: ', 'tvr',
            ['id'=>'tvr',
            'data-validation-optional'=>'true'],
             $tva, true); ?>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <?= $form->select('Supplier: ', 'suplier_id',
            ['id'=>'suplier_id',
            'data-validation-optional'=>'true'],
             $suppliers, true); ?>
          </div>

            <div class="col-md-12 text-center">
             <div class="form-group">
                <?= $form->button('search', 'Search'); ?>
             </div>
            </div>

        </form>
      </div>
    </div>
    </div>

    <hr>
    <table class="table table-main table-striped table-data">
      <thead>
        <tr>

        </tr>
      </thead>
      <tbody>

       <?php foreach($users as $user) { ?>
       <tr>
          <td>
            <?php
              echo "<a href='users/show' class='avatar'>
              <img class='img_preview' src='http://localhost/try/public/images/users/".$user->avater."' alt='' >
              </a>";
            ?>
          </td>
          <td>
          <?php echo '<h3><a href="users/show">'. $user->fname." ".$user->lname. '</a></h3>';
              echo "<p>Username: ".$user->login."</p>";
          ?>
          </td>
          <td>
          <?php echo "<p>Job: ".$user->function."</p>";
            echo "<p>".$user->role_name."</p>";
          ?>

          </td>
          <td><?php echo '<p>E-Mail: '.$user->email . "</p>";
              echo "<p>".$user->phone."</p>";
          ?></td>
          <td>
            <?php    if ($_SESSION['user']->aed_users_aed) { ?>

          <?php if ($user->id > 1) { ?>

            <a href="" class="btn btn-danger" id_user="<?= $user->id ?>" onclick="deleteElement(this, event);"><i class="fa fa-times"></i>  Delete</a>
            <?php } else {
              echo "<span class='badge'>Admin</span>";
              } ?>
            <a href="<?= App::$path; ?>users/edit/<?= $user->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>  Edit</a>
            <?php } ?>
            <a href="<?= App::$path; ?>users/profile/<?= $user->id; ?>" class="btn btn-success"><i class="fa fa-caret-square-o-left"></i>  Show</a>
          </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
