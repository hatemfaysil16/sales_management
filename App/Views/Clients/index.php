<div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> clients</h2></div>
      <div class="col-sm-6">
        <ul class="list-unstyled pull-right links">
          <?php
          if ($_SESSION['user']->aed_clients) {

           ?>
          <li><a href="<?= App::$path; ?>clients/add"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
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
              <?= $form->input('Name: ', 'name', [
                'id'=>'name',
                'placeholder'=>'Enter Name...',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'3-100'
                ]); ?>
            </div>
            <div class="form-group">
              <?= $form->input('Adress: ', 'adress', [
                'id'=>'adress',
                'placeholder'=>'Enter adress...',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'3-100'
                ]); ?>
            </div>

          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
            <?= $form->input(' Phone Num:', 'tel', [
                'id'=>'tel',
                'placeholder'=>'Enter Name Of Item',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'3-100'
                ]); ?>
            </div>
            <div class="form-group">
              <?= $form->input('City: ', 'city', [
                'id'=>'city',
                'placeholder'=>'Enter city...',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'3-100'
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
          <th>Name</th>
          <th>Phone</th>
          <th>City</th>
          <th>Adress</th>
          <th>Email</th>
          <th>Zip_code</th>
        </tr>
      </thead>
      <tbody>

       <?php foreach($clients as $client) { ?>
       <tr>
          <td><?php echo $client->id;?></td>
          <td><?php echo $client->name;?></td>
          <td>0<?php echo $client->tel;?></td>
          <td><?php echo $client->city; ?></td>
          <td><?php echo $client->adress;?></td>
          <td><?php echo $client->email; ?></td>
          <td><?php echo $client->zip_code; ?></td>
          <td>
            <?php if ($_SESSION['user']->aed_clients) {?>

            <a href="" class="btn btn-danger btn-xs" id_client="<?= $client->id ?>" onclick="deleteElement(this, event);">Delete</a>
            <a href="<?= App::$path; ?>clients/edit/<?= $client->id; ?>" class="btn btn-primary btn-xs">Edit</a>
            <?php } ?>

            <a href="<?= App::$path; ?>clients/show/<?= $client->id; ?>" class="btn btn-success btn-xs">Show</a>
          </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
