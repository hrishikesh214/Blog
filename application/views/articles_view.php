<?php require 'header.php'; ?>

<div class="container text-bold">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<strong><?=isset($no_article_msg)?$no_article_msg:""?></strong>
</div>

<?php if(isset($articles)):foreach($articles as $article): ?>
<div class="card">
	<div class="card-header bg-dark text-white"><?=$article['article_title'] ?></div>
	<div class="card-title"><?="By <strong>".$article['firstname']." ".$article['lastname']?> </strong> at <?=$article['article_time'] ?></div>
	<div class="card-body">
		<?=$article['article_body']?>
	</div>
	<div class="card-footer bg-dark text-white"></div>
</div><br><br>

<?php endforeach ?>
<?php endif ?>

<?php require 'footer.php'; ?>