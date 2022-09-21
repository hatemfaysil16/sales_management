<div class="row">
    <div class="col-sm-12"> <h2 class="title"><i class="fa fa-puzzle-piece fa-lg"></i>
     Rights Of Access</h2></div>

</div>
   <hr>

<div class="container">
	<div class="add-page">
		<div class="form-add">
			<form method="post" enctype="multipart/form-data" id="form-roles-add">
					<div class="row">
						<div class="col-sm-3">
							<label>Name Of Right Access: </label>
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="role_name" placeholder="Write Name Of Right Access" />
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Clients</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_clients" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_clients === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Add, Edit, Delete</label>
										<select name="aed_clients" class="form-control" data-validation="required">
											<?php if (isset($roles) && $roles->aed_clients === 1) { ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else {?>
												<option value="0" selected>No</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									
								</div>
							</div>
						</div>	
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Suppliers</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_suppliers" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_suppliers === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Add, Edit, Delete</label>
										<select name="aed_suppliers" class="form-control" data-validation="required">
											<?php if (isset($roles) && $roles->aed_suppliers === 1) { ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else {?>
												<option value="0" selected>No</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									</div>
								</div>
							</div>
						
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Sales</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_sales" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_sales === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Add, Edit, Delete</label>
										<select name="aed_sales" class="form-control" data-validation="required">
											<?php if (isset($roles) && $roles->aed_sales === 1) { ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else {?>
												<option value="0" selected>No</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>							
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>purchases</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_purchases" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_purchases	 === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Add, Edit, Delete</label>
										<select name="aed_purchases" class="form-control" data-validation="required">
											<?php if (isset($roles) && $roles->aed_purchases === 1) { ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else {?>
												<option value="0" selected>No</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Articles</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_articles" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_articles === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Stoke</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_stoke" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_stoke === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Rights Access Of Users</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label>Display: </label>
										<select name="show_users_roles" class="form-control" data-validation="required">
											<?php if(isset($roles) && $roles->show_users_roles === 1){ ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else { ?>
												<option value="0" selected>NO</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Add, Edit, Delete</label>
										<select name="aed_users_aed" class="form-control" data-validation="required">
											<?php if (isset($roles) && $roles->aed_users_aed === 1) { ?>
												<option value="0">No</option>
												<option value="1" selected>Yes</option>
											<?php } else {?>
												<option value="0" selected>No</option>
												<option value="1">Yes</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="clearfix"></div>
				<hr />
				<button name="add-item" id="add-item" type="submit" class="center-block btn btn-primary btn-lg">
				<i class="fa fa-edit fa-lg"></i> Save Changes
				</button>

			</form>
		</div>
	</div>
</div><!-- End Of .Container -->
