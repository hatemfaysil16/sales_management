<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i> Add - Edit Price Requests</h2></div>
    <div class="col-sm-6">

    </div>
</div>
    <hr>

<div class="container">
	<div class="add-page">


		<div class="form-add">
			<form method="post" action="" enctype="multipart/form-data" id="form-add">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="panel-title">Clients</span>
						<a href="#" onclick="loadClients();" class="btn btn-default search pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a>
					</div>
					<div class="panel-body">
                        <?php if (isset($prs_clt)) { ?>
						<input type="hidden" name="client_id_info" value="<?= $prs_clt->id ?>" class="client_id_info">

						<h3 class="client_name_info"><?= $prs_clt->client_name ?></h3>
						<p class="client_adress_info"><?= $prs_clt->city ?></p>
						<p class="client_city_info"><?= $prs_clt->adress ?></p>
                        <?php } else { ?>
                            <input type="hidden" name="client_id_info"  class="client_id_info">

                            <h3 class="client_name_info"></h3>
                            <p class="client_adress_info"></p>
                            <p class="client_city_info"></p>
                        <?php } ?>
					</div>
				</div>
				<div class="side">
					<div class="form-group">
						<?= $form->input('Number:', 'num', [
							'placeholder'=>'Enter Number...',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
					<?= $form->input('Date:', 'date', [
							'placeholder'=>'Enter Name Of Item',
							'data-validation'=>'date',
							 'data-validation-format'=>"dd/mm/yyyy"
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Subject:', 'subject', [
							'placeholder'=>'Subject...',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form-group">
						<?= $form->input('Notes:', 'discr', [
							'placeholder'=>'Notes...',
							'data-validation'=>'length',
							'data-validation-length'=>'3-100'
							]); ?>
					</div>

					<div class="form_group">
						<textarea name="discr" class="form-control" placeholder="Describtion" data-validation="length" data-validation-length="3-100"><?php echo isset($prs_clt) ? $prs_clt->discr : null ; ?></textarea>
					</div>

				</div><!-- End Of .side -->


				<div class="clearfix"></div>
				<hr>
				<button name="add-item" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
				<i class="fa fa-floppy-o fa-lg"></i> Save Changes
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

	    </div>
	  </div>
	</div>
<!--End Modal -->
