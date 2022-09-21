<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i>
     </h2></div>
    <div class="col-sm-6">

    </div>
</div>
   <hr>

<div class="container">
	<div class="add-page">


		<div class="form-add">
		<?php if ($error) {
				echo "<div class='alert alert-danger'>- The new Password Not like Confrim Password or current password is wrong</div>";
			} ?>
			<form method="post" action="" enctype="multipart/form-data" id="form-profile-edit">

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
					<?= $form->input('Phone:', 'phone', [
							'placeholder'=>'Enter Your Number Phone',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>
					<hr>
					<div class="form-group">
						<?= $form->input('Current Password:', 'cur_pass', [
							'id' => 'cur_pass',
							'placeholder'=>'Current Password...',
							'data-validation'=>'length',
							'data-validation-length'=>'2-100'
							]); ?>
					</div>
					<div class="form-group">
						<?= $form->input('New Password:', 'new_pass', [
							'id' => 'cur_pass',
							'placeholder'=>'New Password...',
							'data-validation'=>'length',
							'data-validation-length'=>'2-100'
							]); ?>
					</div>
					<div class="form-group">
						<?= $form->input('Confrimation Password:', 'conf_pass', [
							'id' => 'cur_pass',
							'placeholder'=>'Confrimation Password...',
							'data-validation'=>'length',
							'data-validation-length'=>'2-100'
							]); ?>
					</div>


				</div><!-- End Of .side -->

				<div class="o-side">
				<div class="panel panel-primary">
					<div class="panel-heading"><span class="panel-title"><i class="fa fa-file-photo-o fa-lg"></i>  Profile Image</span> <a href="" onclick="thumbInputFile(event);" class="pull-right btn btn-default"><i class="fa fa-search fa-lg"></i></a></div>
					<div class="panel-body">
					<!-- Default Image -->
						<img src="<?= App::$path; ?>images/users/<?= isset($users->avater) ? $users->avater : '0.jpg' ?>" alt=""  class="thumb-preview img-thumbnail img-responsive">
						<input type="hidden" name="remove_avater" value="<?= $users->avater; ?>">
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
