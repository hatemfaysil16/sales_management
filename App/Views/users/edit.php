<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i>
    <?php $data = isset($_GET['id']) ? "Edit User" : "Add New User" ;
    echo $data;
    ?>
     </h2></div>
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
						<?= $form->input('Name Of Login:', 'login', [
							'id' => 'login-user',
							'placeholder'=>'Enter Login Name...',
							'data-validation'=>'length',
							'data-validation-length'=>'2-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Default Password:', 'pass', [
							'id' => 'password-default',
							'placeholder'=>'Password...',
							'data-validation'=>'length',
							'data-validation-length'=>'2-100',
							'readonly' => 'readonly'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('E-Mail:', 'email', [
							'placeholder'=>'Enter E-mail',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('First Name:', 'fname', [
							'placeholder'=>'Enter First Name',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Last Name:', 'lname', [
							'placeholder'=>'Enter Last Name',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Job:', 'function', [
							'placeholder'=>'Enter Your Job',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Phone:', 'phone', [
							'placeholder'=>'Enter Your Number Phone',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>
					<hr />
					<div class="form-group">
							<?= $form->select('Right of access: ', 'role_id',
						['id'=>'role_id', 'data-validation'=>'required'], $roles); ?>
					</div>

				</div><!-- End Of .side -->

				<div class="o-side">
				<div class="panel panel-primary">
					<div class="panel-heading"><span class="panel-title"><i class="fa fa-file-photo-o fa-lg"></i>  Item Image</span> <a href="" onclick="thumbInputFile(event);" class="pull-right btn btn-default"><i class="fa fa-search fa-lg"></i></a></div>
					<div class="panel-body">
					<!-- Default Image -->
						<img src="<?= App::$path; ?>images/users/<?= isset($users->avater) ? $users->avater : '0.jpg' ?>" alt=""  class="thumb-preview img-thumbnail img-responsive">
						<?= $form->file('avater', [
							'id' => 'avater',
							'class' => 'thumb-hidden',
							'onchange' => 'readUrl(this);',
							'data-validation' => "required mime size",
							'data-validation-allowing'=>"jpg"
						]); ?>
						<a href="" onclick="resetThumb(event);" class="badge reset-thumb">Reset</a>
					</div>
				</div>
				</div>

				<div class="clearfix"></div>

				<button name="add-item" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
				<i class="fa fa-edit fa-lg"></i> Save Changes
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
