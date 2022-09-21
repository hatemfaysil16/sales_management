

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Show Price Requests Clients</h2></div>
      <div class="col-sm-6">
        <ul class="list-unstyled pull-right links">
          <?php
          if ($_SESSION['user']->aed_sales) {

           ?>
          <li><a href="<?= App::$path; ?>qoutation_clt/add"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
          <li><a href="<?= App::$path; ?>qoutation_clt/add"><span class="btn btn-warning"><i class="fa fa-list fa-lg"></i> Import Price Requests </span></a></li>
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
          <th>Number</th>
          <th>Discribtion</th>
          <th>date</th>
            <th>Subject</th>
            <th>client</th>

          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>


    <?php foreach ($qoutations_clt as $qoutation_clt) { ?>
       <tr>
          <td><?= $qoutation_clt->id;            ?></td>
          <td><?= $qoutation_clt->num;           ?></td>
          <td><?= $qoutation_clt->discr;         ?></td>
          <td><?= $qoutation_clt->date;           ?></td>
           <td><?= $qoutation_clt->subject ?></td>
           <td><?= $qoutation_clt->client_name ?></td>

          <td>
            <?php if ($_SESSION['user']->aed_sales) {?>

            <a href="" class="btn btn-danger btn-xs" id_qoutation_clt="<?= $qoutation_clt->id ?>" onclick="deleteElement(this, event);"><i class="fa fa-ban"></i>  Delete</a>
            <a href="<?= App::$path; ?>qoutation_clt/edit/<?= $qoutation_clt->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>  Edit</a>
            <?php } ?>

            <a href="<?= App::$path; ?>qoutation_clt/articles/<?= $qoutation_clt->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-list"></i>  Products</a>
          </td>
          </tr>
    <?php } ?>

      </tbody>
    </table>
