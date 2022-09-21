

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Manage Request Prices</h2></div>
      <div class="col-sm-6">

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
    <div class="row">
      <div class="col-sm-6">
        <div class="prices_request">
          <div class="panel panel-primary">
            <div class="panel-heading"><span class="panel-title">	Prices Requests</span>
            </div>
            <div class="panel-body">
              <h3><?= $qoutation_clt->num ?></h3>
              <p class="badge"><?= $qoutation_clt->date ?></p>
              <p><?= $qoutation_clt->discr ?></p>
              <p><?= $qoutation_clt->subject ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="clients_box">
          <div class="panel panel-primary">
            <div class="panel-heading"><span class="panel-title"><i class="fa fa-black-tie fa-lg"></i> 	Clients</span>
            </div>
            <div class="panel-body">
              <input type="hidden" value="<?= $qoutation_clt->id ?>" />
              <h3><?= $qoutation_clt->client_name ?></h3>
              <p><?= $qoutation_clt->city ?></p>
                <p><?= $qoutation_clt->adress ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Products</h2></div>
        <div class="col-sm-6">
            <ul class="list-unstyled pull-right links">
                <?php
                if ($_SESSION['user']->aed_sales) {

                    ?>
                    <li><a href="<?= App::$path; ?>qoutation_clt/addart/<?= $qoutation_clt->id ?>"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
                <?php } ?>
                <li onclick="showBox('box-search', event);"><a href="#"><span class="btn btn-danger"><i class="fa fa-search fa-lg"></i> Search</span></a></li>
                <li><a href="#"><span class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</span></a></li>
            </ul>
        </div>
    </div>
<hr />
    <table class="table table-bordered table-main table-striped table-data">
      <thead>
        <tr>
          <th>#</th>
          <th>Refrences</th>
          <th>Desigation</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($qoutation_clt_arts as $art) { ?>
       <tr>
          <td><?= $art->id;    ?></td>
          <td><?= $art->ref;   ?></td>
          <td><?= $art->desig; ?></td>
          <td><?= $art->qta;   ?></td>
           <td><?= App::nFormat($art->price);   ?></td>
           <td><?= App::nFormat($art->total);   ?></td>
            <td>
                <a href="#" class="btn btn-danger btn-xs" id_clt_art="<?= $art->id ?>">Delete</a>
                <a href="<?= App::$path ?>qoutation_clt/editArt/<?= $art->qoutation_clt_id ?>/<?= $art->id ?>" class="btn btn-primary btn-xs" id_art="<?= $art->id ?>">edit</a>
            </td>
       </tr>

<?php } ?>
      </tbody>
    </table>
