<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-home fa-lg"></i> Add Show Price Request</h2></div>
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
                                    <h3><?= $qoutation_clt->num ?></h3>
                                    <p class="badge"><?= $qoutation_clt->date ?></p>
                                    <p><?= $qoutation_clt->discr ?></p>
                                    <p><?= $qoutation_clt->subject ?></p>
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
                                    <input type="hidden" value="<?= $qoutation_clt->id ?>" />
                                    <h3><?= $qoutation_clt->client_name ?></h3>
                                    <p><?= $qoutation_clt->city ?></p>
                                    <p><?= $qoutation_clt->adress ?></p>
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
                                <a href="" data-toggle="modal" data-target="#myModal" class="searchart btn btn-default pull-right" onclick="loadArticles(event);"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" name="article_id" id="article_id" class="article-id-info" data-validation="required" />
                                <h3 class="article-ref-info"></h3>
                                <p class="article-desig-info"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                <div class="form-group">
						<?= $form->input('Quantity:', 'qta', [
                            'id'=>'qta',
							'placeholder'=>'Enter Quantity...',
							'data-validation'=>'number',
                            'data-validation-allowing'=>"range[0.05;10000],float"
							]); ?>
					</div>
                    </div>
                    <div class="col-lg-4">
                <div class="form-group">
                    <?= $form->input('Price:', 'price', [
                        'id'=>'price',
                        'placeholder'=>'Enter Price...',
                        'data-validation'=>'number',
                        'data-validation-allowing'=>"range[0.05;10000],float"
                    ]); ?>
                </div>
                    </div>
                    <div class="col-lg-4">
                <div class="form-group">
                    <?= $form->input('Total:', 'total', [
                        'id'=>'total',
                        'readonly'=>'readonly'
                    ]); ?>
                </div>
                    </div>
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


