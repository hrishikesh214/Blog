<?php 

if(isset($_SESSION['userid'])){
		$like_color= "danger";
	}
	else{
		$like_color= "white";
	}

 ?>
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
<?php 

if(isset($_SESSION['userid'])){
		if($article['article_is_like']){
			$like_icon =  "heart";
		}
		else{
			$like_icon = "heart-o";
		}
	}
	else{
		$like_icon = "heart";
	}

 ?>
<div class="card">
	<div class="card-header bg-dark text-white">
		<?=$article['article_title'] ?>
		<div class="float-right">
			<button type="button" style="border:none;" class="bg-dark" data-toggle="modal" data-target="#M_<?=$article['article_id']?>">
			  <span class="text-white fa fa-share-alt"></span>
			</button>
					
			<?php if(isset($_SESSION['userid'])): if ($_SESSION['userid'] == $article['article_poster_id']): ?>
				<a href="<?=base_url("/Articles/Settings/".$article['article_id'])?>">
					<span class="text-white fa fa-cog"></span>	
				</a>
			<?php endif ?>
			<?php endif ?>
		</div>
	</div>
	<div class="card-title"><?="By <strong>".$article['firstname']." ".$article['lastname']?> </strong> at <?=$article['article_time'] ?></div>
	<div class="card-body">
		<?=$article['article_body']?>
	</div>
	<div class="card-footer bg-dark text-white">
		<div style="cursor: pointer;width: auto;" class="container-fluid like-click" 
		onclick="javascript:dL('<?=$article['article_id']?>')">
			<span id="<?='G_'.$article['article_id']?>" class="likes"><?=$article['article_likes']?></span>
			<span id="<?='I_'.$article['article_id']?>" class="like-icon text-<?=$like_color?> fa fa-<?=$like_icon?>"></span>
		</div>
	</div>
</div><br><br>

<div class="modal fade" id="M_<?=$article['article_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Copy Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= base_url('/Articles/Share/'.$article['article_id'])?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>
<?php endif ?>


<?php require 'footer.php'; ?>