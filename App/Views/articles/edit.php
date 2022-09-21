<?php
	if(isset($articles) && $articles->supplier_name ) {
		$supplier_name = $articles->supplier_name;
	}
?>

<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i> Add New Item</h2></div>
    <div class="col-sm-6">

    </div>
</div>
    <hr>

<div class="container">
	<div class="add-page">


		<div class="form-add">
			<form method="post" action="" enctype="multipart/form-data" id="form-add">

				<div class="side">
					<div class="form-group">
						<?= $form->input('Item ID:', 'ref', [
							'placeholder'=>'Enter Item ID...',
							'data-validation'=>'length',
							'data-validation-length'=>'max100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Item Name:', 'desig', [
							'placeholder'=>'Enter Name Of Item',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->select('Category: ', 'category_id',
						['id'=>'category', 'data-validation'=>'required'], $categories); ?>
					</div>

					<div class="form-group">
							<?= $form->select('Unit: ', 'unit_id',
						['id'=>'unit', 'data-validation'=>'required'], $units); ?>
					</div>

					<div class="form-group">
						<?= $form->select('Tva: ', 'tvr',
						['id'=>'tva', 'data-validation'=>'required'], $tva); ?>
					</div>

				</div><!-- End Of .side -->

				<div class="o-side">

					<div class="search-sup">
						<div class="panel panel-primary">
							<div class="panel-heading"><span class="panel-title"><i class="fa fa-black-tie fa-lg"></i> 	Supplier</span>
							<a class="search btn btn-default pull-right" onclick="loadSuppliers();" data-toggle="modal" data-target="#myModal"> <i class="fa fa-search fa-lg"></i></a>
							</div>
							<div class="panel-body">
								<input type="text" name="suplier_id" id="supplier_id" class="supplier_id_info form-control" >
								<h3 class="supplier_name_info"></h3>
								<p class="supplier_city_info">City</p>
								<p class="supplier_adress_info">Adress</p>
							</div>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading"><span class="panel-title"><i class="fa fa-file-photo-o fa-lg"></i>  Item Image</span> <a href="" onclick="thumbInputFile(event);" class="pull-right btn btn-default"><i class="fa fa-search fa-lg"></i></a></div>
						<div class="panel-body">
						<!-- Default Image -->
							<img src="http://localhost/try/public/images/<?php if (isset($articles)) {
								echo $articles->thumb;
							} else {
								echo "item.png";
							} ?>" alt=""  class="thumb-preview img-thumbnail img-responsive">
							<?= $form->file('thumb', [
								'id' => 'thumb',
								'class' => 'thumb-hidden',
								'onchange' => 'readUrl(this);',
								'data-validation' => "required mime size",
								'data-validation-allowing'=>"jpg"
							]); ?>
							<a href="" onclick="resetThumb(event);" class="badge reset-thumb">Reset</a>
						</div>
					</div>

				</div><!-- End Of .o-side -->

				<div class="clearfix"></div>

				<button name="add-item" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
				<i class="fa fa-edit fa-lg"></i> Add Item
				</button>

			</form>
		</div>
	</div>
</div><!-- End Of .Container -->

<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        <table class="table table-bordered table-striped table-data">
		      <thead>
		        <tr>
		          <th>Controls</th>
		          <th>Name</th>
		          <th>City</th>
		          <th>Adress</th>
		        </tr>
		      </thead>
		      <tbody>

		      </tbody>
		    </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
<!--End Modal -->
