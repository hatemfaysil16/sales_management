<div class="container">
	<div class="add-page">

		<div class="header-wrapper">
			<div class="row">
				<div class="col-sm-6"> 
					<h2 class="title"><i class="fa fa-home fa-lg"></i> Login User</h2>
				</div>
				<div class="col-sm-6">
					<ul class="list-unstyled pull-right links">

					</ul>
				</div>
			</div>
		</div>
 		<hr />
		<div class="form-add">
			<form method="post" enctype="multipart/form-data" id="form-add">
			
				<div class="login-form">
				<?php if ($error) {
				echo "<div class='alert alert-danger text-center'>Incrooect Username Or Password</div>";
			} ?>
						<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="text-center"><i class="fa fa-user-circle"></i>  Login User</h2>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<?= $form->input('', 'login', [
							'type' => 'text',
							'placeholder' => 'Enter Username To login',
							'data-validation'=>'length',
              'data-validation-length'=>'3-100'
						]); ?>
						</div>

						<div class="form-group">
							<?= $form->input('', 'pass', [
							'type' => 'password',
							'placeholder' => 'Enter Validate Password',
							'data-validation'=>'length',
              'data-validation-length'=>'3-100'
						]); ?>
						</div>
							<div class="form-group">
								<button name="add-item" id="add-item" type="submit" class="center-block btn btn-success btn-lg">
								<i class="fa fa-sign-in fa-lg"></i> Sign In
								</button>
							</div>
					</div>
				</div>

				</div>
			

			</form>
		</div>
	</div>
</div><!-- End Of .Container -->
