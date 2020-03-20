<?php require 'header.php'; ?>

<?php foreach($articles as $article): ?>

<div class="card">
	<div class="card-header bg-dark text-white"><?=$article['article_title'] ?></div>
	<div class="card-title"><?="By <strong>".$article['firstname']." ".$article['lastname']?> </strong> at <?=$article['article_time'] ?></div>
	<div class="card-body">
		<?=$article['article_body']?>
	</div>
	<div class="card-footer bg-dark text-white"></div>
</div><br><br>

<?php endforeach ?>

<?php require 'footer.php'; ?>