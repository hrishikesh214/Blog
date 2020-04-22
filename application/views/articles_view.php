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
		<div style="cursor: pointer;width: auto;" class="container-fluid like-click" 
		onclick="javascript:dL('<?=$article['article_id']?>')">
			<span id="<?='G_'.$article['article_id']?>" class="likes"><?=$article['article_likes']?></span>
			<span id="<?='I_'.$article['article_id']?>" class="like-icon text-<?php 
	if(isset($_SESSION['userid'])){
		echo "danger";
	}
	else{
		echo "white";
	}

 ?> fa fa-<?php 
	if(isset($_SESSION['userid'])){
		if($article['article_is_like']){
			echo "heart";
		}
		else{
			echo "heart-o";
		}
	}
	else{
		echo "heart";
	}

 ?>"></span>
		</div>
	</div>
</div><br><br>

<?php endforeach ?>
<?php endif ?>


<?php require 'footer.php'; ?>


