<?php require 'header.php'; ?>



<div class="row">
	<div class="col-lg-12">
		<div class="card card-dark">
			<div class="card-header h3 text-white bg-primary">Add Article</div>
			<div class="card-body">
				<form action="<?=base_url().'Articles/post_article'?>" method="post" class="form">
					<div class="form-group">
						<legend>Title</legend>
						<span class="text-danger"><?=form_error('article_title')?></span>
						<input value="<?=isset($article_title)?$article_title:''?>" type="text" name="article_title" class="form-control">
					</div>
					<div class="form-group">
						<legend>Body</legend>
						<textarea name="article_body" style="height: 30vh;" class="form-control"><?=isset($article_body)?$article_body:''?></textarea>
					</div>
					<div class="form-group">
						<legend>Tags <span class="text-info">(Use comma(,) to separate tags)</span></legend>
						
						<input name="article_tags" type="text" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Post" class="btn btn-primary">
					</div>
				</form>
			</div>
			<div class="card-footer bg-primary"></div>
		</div>
	</div>
</div>


<?php require 'footer.php'; ?>