<?php require 'header.php'; ?>



<div class="row">
	<div class="col-lg-12">
		<div class="card card-dark">
			<div class="card-header h3 text-white bg-primary">Article Settings</div>
			<div class="card-body">
				<form action="<?=base_url('/Articles/update_article/'.$article['article_id'])?>" method="post" class="form">
					<div class="form-group">
						<legend>Title</legend>
						<span class="text-danger"><?=form_error('article_title')?></span>
						<input value="<?=isset($article['article_title'])?$article['article_title']:''?>" type="text" name="article_title" class="form-control">
					</div>
					<div class="form-group">
						<legend>Body</legend>
						<textarea name="article_body" style="height: 30vh;" class="form-control"><?=isset($article['article_body'])?$article['article_body']:''?></textarea>
					</div>
					<div class="form-group">
						<legend>Tags <span class="text-info">(Use comma(,) to separate tags)</span></legend>
						
						<input name="article_tags" value="<?=isset($article['article_tags'])?$article['article_tags']:''?>" type="text" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Save" class="btn btn-primary">
						<a class="btn btn-danger" href="<?=base_url('/Articles/confirm_delete/'.$article['article_id'])?>">Delete</a>
					</div>
				</form>
			</div>
			<div class="card-footer bg-primary"></div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>