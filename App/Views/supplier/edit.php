<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i> Add - Edit Supplier</h2></div>
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
						<?= $form->input('Name:', 'name', [
							'placeholder'=>'Enter Name...',
							'data-validation'=>'length',
							'data-validation-length'=>'max100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Supplier Phone:', 'tel', [
							'placeholder'=>'Enter Supplier Phone',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Email:', 'email', [
							'placeholder'=>'Enter email...',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Adress:', 'adress', [
							'placeholder'=>'Enter Adress...',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('City:', 'city', [
							'placeholder'=>'Enter city...',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Zip_code:', 'zip_code', [
							'placeholder'=>'Enter city...',
							'data-validation'=>'length',
							'data-validation-length'=>'5-100'
							]); ?>
					</div>


				</div><!-- End Of .side -->



				<div class="clearfix"></div>

				<button name="add-item" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
				<i class="fa fa-edit fa-lg"></i> Save Changes
				</button>

			</form>
		</div>
	</div>
</div><!-- End Of .Container -->
