<!-- we dont need to copy paste the header and footer for the index
and about pages by using include/require -->
<!-- require edilen dosya işlenmez ise web sayfası hata verir ve sonraki şeyler gösterilmez -->
<!-- require_once kullanılması genelde class için tavsiye edilir -->
<?php require 'inc/header.php' ?>

	<div class="container">
		<p>Main Content for the index page.</p>
		<a href="about.php" title="About">Go to About page</a>
	</div>

<?php require 'inc/footer.php' ?>