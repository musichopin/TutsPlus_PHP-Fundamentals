<h1>The Blog By <?= $name ?></h1>
<!-- *VIEW FILE* -->
<!-- view.php'de sayfanın görünen kısmı ile ilgili basit kodlamalar yapılır -->
<?php foreach($posts as $post) : ?>
	<article>
		<h2>
			<a href="single.php?id=<?= $post['id']; ?>">
			<!-- single.view.php'de query stringin kullanılabilmesi için önemli -->
				<?= $post['title']; ?>
			</a>
		</h2>
		<div class="body"><?= $post['body']; ?></div>
	</article>
<?php endforeach; ?>