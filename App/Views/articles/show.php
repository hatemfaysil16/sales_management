<div class="row">
    <div class="col-sm-6"> <h2 class="title"><i class="fa fa-television fa-lg"></i> <?= $article->ref; ?></h2></div>
    <div class="col-sm-6">

    </div>
</div>
    <hr>

<div class="container">
	<div class="add-page">
		<div class="row">
			<div class="col-sm-4">
				<img src="public/images/<?= $article->thumb; ?>" class="img-responsive img-thumbnail">
			</div>
			<div class="col-sm-8">
				<div class="col-sm-2">
					<h4>Item </h4>
					<h4>Describtion </h4>
					<h4>Tva </h4>
					<h4>Supplier</h4>
					<h4>Category </h4>
					<h4>Created At </h4>
				</div>
				<div class="col-sm-10">
					<p>: <?= $article->ref; ?> </p>
					<p>: <?= $article->desig; ?> </p>
					<p>: <?= $article->Tva; ?> </p>
					<p>: <?= $article->supplier_name; ?></p>
					<p>: <?= $article->cat_name; ?> </p>
					<p>: <?= $article->created_at; ?> </p>
				</div>
			</div>
		</div>
	</div>
</div><!-- End Of .Container -->
