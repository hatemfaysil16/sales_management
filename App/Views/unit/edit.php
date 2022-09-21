<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i> Add New Item</h2></div>
    <div class="col-sm-6">

    </div>
</div>
    <hr>

<div class="container">
	<div class="add-page">

		<div class="form-add">
			<form method="POST">
				<div class="col-sm-8">
					<div class="form-group">
						<?= $form->input('unit name:', 'unit', [
							'placeholder'=>'Enter name of unit...',
							'data-validation'=>'length',
							'data-validation-length'=>'max100'
							]); ?>
					</div>
				</div>
				<input type="submit" class="btn btn-primary"/>
			</form>
		</div>
	</div>
</div><!-- End Of .Container -->
