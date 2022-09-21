

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Products</h2></div>
      <div class="col-sm-6">
        <ul class="list-unstyled pull-right links">
          <?php
          if ($_SESSION['user']->aed_articles) {

           ?>
          <li><a href="<?= App::$path; ?>articles/add"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
          <?php } ?>
          <li onclick="showBox('box-search', event);"><a href="#"><span class="btn btn-danger"><i class="fa fa-search fa-lg"></i> Search</span></a></li>
          <li><a href="#"><span class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</span></a></li>
        </ul>
    </div>
    </div>

    <div class="box-search">
    <hr>
    <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-search fa-lg"></i> Search</div>

      <div class="panel-body">
        <form action="" method="POST" id="form_search_info">
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
    <table class="table table-bordered table-main table-striped table-data">
      <thead>
        <tr>
          <th>#</th>
          <th>Refrences</th>
          <th>Desigation</th>
          <th>Tva</th>
          <th>Supplier Name</th>
          <th>Category Name</th>
          <th>Unit</th>
        </tr>
      </thead>
      <tbody>

       <?php foreach($articles as $article) { ?>
       <tr>
          <td><?php echo $article->id;            ?></td>
          <td><?php echo $article->ref;           ?></td>
          <td><?php echo $article->desig;         ?></td>
          <td><?php echo $article->Tva;           ?></td>
          <td><?php echo $article->supplier_name; ?></td>
          <td><?php echo $article->cat_name;      ?></td>
          <td><?php echo $article->unit;          ?></td>
          <td>
            <?php if ($_SESSION['user']->aed_articles) {?>

            <a href="" class="btn btn-danger btn-xs" id_art="<?= $article->id ?>" onclick="deleteArt(this, event);">Delete</a>
            <a href="<?= App::$path; ?>articles/edit/<?= $article->id; ?>" class="btn btn-primary btn-xs">Edit</a>
            <?php } ?>

            <a href="<?= App::$path; ?>articles/show/<?= $article->id; ?>" class="btn btn-success btn-xs">Show</a>
          </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
