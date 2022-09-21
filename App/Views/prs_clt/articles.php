

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Products</h2></div>
      <div class="col-sm-6">
        <ul class="list-unstyled pull-right links">
          <?php
          if ($_SESSION['user']->aed_sales) {

           ?>
          <li><a href="<?= App::$path; ?>prs_clt/addart/<?= $prs_clt->id ?>"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
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
    <div class="row">
      <div class="col-sm-6">
        <div class="prices_request">
          <div class="panel panel-primary">
            <div class="panel-heading"><span class="panel-title">	Prices Requests</span>
            </div>
            <div class="panel-body">
              <h3><?= $prs_clt->num ?></h3>
              <p class="badge"><?= $prs_clt->date ?></p>
              <p><?= $prs_clt->discr ?></p>
              <p><?= $prs_clt->subject ?></p>
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
              <input type="hidden" value="<?= $prs_clt->id ?>" />
              <h3><?= $prs_clt->client_name ?></h3>
              <p><?= $prs_clt->city ?></p>
                <p><?= $prs_clt->adress ?></p>
            </div>
          </div>
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
          <th>Quantity</th>

          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($prs_clt_arts as $art) { ?>
       <tr>
          <td><?= $art->id;    ?></td>
          <td><?= $art->ref;   ?></td>
          <td><?= $art->desig; ?></td>
          <td><?= $art->qta;   ?></td>
          <td>
            <?php if ($_SESSION['user']->aed_sales) {?>

            <a href="" class="btn btn-danger btn-xs" id_clt_art="<?= $art->id ?>" onclick="deleteElementArt(this, event);">Delete</a>
            <a href="<?= App::$path; ?>prs_clt/editArt/<?= $art->pr_clt_id; ?>/<?= $art->id ?>" class="btn btn-primary btn-xs">Edit</a>
            <?php } ?>

            <a href="<?= App::$path; ?>prs_clt/show/<?= $art->id; ?>" class="btn btn-success btn-xs">Show</a>
          </td>
       </tr>

<?php } ?>
      </tbody>
    </table>
