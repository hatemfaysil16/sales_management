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
						<?= $form->input('category name:', 'name', [
							'placeholder'=>'Enter name of category...',
							'data-validation'=>'length',
							'data-validation-length'=>'max100'
							]); ?>
					</div>
				</div>
				<!--<div class="col-sm-4">
					<button name="add-item" id="add-item" type="submit" name="send_data" style="margin-top: 19px" class="center-block btn btn-primary btn-lg">
					<i class="fa fa-edit fa-lg"></i> Add Item
					</button>
				</div>-->
				<input type="submit" class="btn btn-primary"/>
			</form>
		</div>
	</div>
</div><!-- End Of .Container -->
