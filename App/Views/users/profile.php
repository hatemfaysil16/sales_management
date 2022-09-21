<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-user fa-lg"></i> <?= $profile->fname . " ".$profile->lname ; ?></h2></div>
    <div class="col-sm-3">

    </div>
</div>
    <hr>

<div class="container">
<div class="row">

	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Information User</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Username :</label> <span><?= $profile->login; ?></span>
				</div>
				<div class="form-group">
					<label>E-Mail :</label> <span><?= $profile->email; ?></span>
				</div>
				<div class="form-group">
					<label>First Name :</label> <span><?= $profile->fname; ?></span>
				</div>
				<div class="form-group">
					<label>Last Name :</label> <span><?= $profile->lname; ?></span>
				</div>
				<div class="form-group">
					<label>Job :</label> <span><?= $profile->function; ?></span>
				</div>
				<div class="form-group">
					<label>Phone Num :</label> <span><?= $profile->phone; ?></span>
				</div>
				<div class="form-group">
					<label>Right of access :</label> <span><?= $profile->role_name; ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<img class="img_preview" src="<?= App::$path; ?>images/users/<?= $profile->avater; ?>">
				<h4><?= $profile->fname . " ".$profile->lname ; ?></h4>
				<small><?= $profile->function; ?></small>
			</div>
			<div class="panel-body">
				<div>
				<a href="<?= App::$path; ?>users/profileedit/<?= $profile->id ?>" name="" class="pull-right btn btn-default">Edit Profile</a>
			</div>
			</div>
		</div>
	</div>
</div>
</div><!-- End Of .Container -->
