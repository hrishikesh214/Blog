<?php require 'header.php'; ?>

<style type="text/css">
	.like-icon,.likes{
		font-size:17px;
	}
</style>

<div class="container text-bold">
	<strong><?=isset($no_article_msg)?$no_article_msg:""?></strong>
</div>

<?php if(isset($articles)):foreach($articles as $article): ?>
<div class="card">
	<div class="card-header bg-dark text-white">
		<?=$article['article_title'] ?>
		<?php if(isset($_SESSION['userid'])): if ($_SESSION['userid'] == $article['article_poster_id']): ?>
			<a href="<?=base_url("/Articles/Settings/".$article['article_id'])?>">
				<span class="float-sm-right text-white fa fa-cog"></span>	
			</a>
		<?php endif ?>
		<?php endif ?>
	</div>
	<div class="card-title"><?="By <strong>".$article['firstname']." ".$article['lastname']?> </strong> at <?=$article['article_time'] ?></div>
	<div class="card-body">
		<?=$article['article_body']?>
	</div>
	<div class="card-footer bg-dark text-white">
		<div class="like-click" 
		onclick="javascript:dL('<?=base_url('/Articles/Like/'.$article['article_id'])?>')">
			<span class="likes"><?=$article['article_likes']?></span>
			<span class="like-icon text-danger fa fa-<?="heart"?>"></span>
		</div>
	</div>
</div><br><br>

<?php endforeach ?>
<?php endif ?>


<?php require 'footer.php'; ?>