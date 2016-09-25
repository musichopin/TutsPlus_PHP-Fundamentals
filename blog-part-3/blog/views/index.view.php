<!-- view file is dumb, it doesn't do calculation, connects to db etc. just filters through the array (görünen kısmı ile ilgili) -->
<h1>The Blog By <?= $name ?></h1>
<!-- $name'in nasıl print edildiğini anlamak önemli -->

<?php foreach($posts as $post) : ?>
	<!-- <?php print_r($post); ?> -->
	<article>
		<h2>  
		<!-- instead of just displaying html we are going to link to <single class="php"></single> and then passing through in the query string-->
			<a href="single.php?id=<?= $post['id']; ?>">
				<!-- single.view.php'de query stringin kullanılabilmesi için önemli -->
				<?= $post['title']; ?>

			</a>

		</h2>
		<div class="body"><?= $post['body']; ?></div>
	</article>
<?php endforeach; ?>