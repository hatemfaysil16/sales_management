

    <div class="row">
      <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Categories</h2></div>
      <div class="col-sm-6">
        <ul class="list-unstyled pull-right links">
          <li><a href="<?= App::$path; ?>category/add"><span class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</span></a></li>
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
        <form method="POST" id="form_search_info">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
              <?= $form->input('Category Name:', 'name', [
                'id'=>'category',
                'placeholder'=>'Enter Name Category...',
                'data-validation-optional'=>'true',
                'data-validation'=>'length',
                'data-validation-length'=>'max100'
                ]); ?>
            </div>
          </div>

            <div class="col-md-12 text-center">
             <div class="form-group">
                <input type="submit" class="btn btn-primary"/>
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
          <th>Category</th>
        </tr>
      </thead>
      <tbody>

       <?php foreach($categories as $cat) { ?>
       <tr>
          <td><?php echo $cat->id;            ?></td>
          <td><?php echo $cat->name;           ?></td>
          <td>
            <a href="" class="btn btn-danger btn-xs" id_cat="<?= $cat->id ?>" onclick="deleteElement(this, event);">Delete</a>
            <a href="<?= App::$path; ?>articles/edit/=<?= $cat->id; ?>" class="btn btn-primary btn-xs">Edit</a>
          </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
