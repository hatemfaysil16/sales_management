<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Edit Price Request</h2></div>
    <div class="col-sm-6">

    </div>
</div>



<hr>

<div class="container">
	<div class="add-page">
		<div class="form-add">
			<form method="post" action="" enctype="multipart/form-data" id="form-add">
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="panel-title">Products</span>
                            </div>

                            <div class="panel-body">
                                <input data-validation="required" type="hidden" name="article_id" id="article_id" value="<?= $prs_clt_arts->art_id; ?>" class="article-id-info" />
                                <h3 class="article-ref-info"><?= $prs_clt_arts->ref; ?></h3>
                                <p class="article-desig-info"><?= $prs_clt_arts->desig; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

					<div class="form-group">
						<?= $form->input('Quantity:', 'qta', [
							'placeholder'=>'Enter Quantity...',
							'data-validation'=>'number',
                            'data-validation-allowing'=>"range[0.05;10000],float"
							]); ?>
					</div>




				<div class="clearfix"></div>
				<hr>
				<button name="save" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
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
                <h4 class="modal-title" id="myModalLabel">Products</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-data">
                    <thead>
                    <tr>

                        <th>&nbsp;</th>
                        <th>Referance</th>
                        <th>Designation</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--End Modal -->


