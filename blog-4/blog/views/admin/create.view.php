<h1>Create A New Post</h1>
<!-- *VIEW FILE* -->
<form action="" method="post"> <!-- with action being null, it posts to itself -->
	<ul>
		<li>
			<!-- for corresponds to id -->
			<label for="title">Title: </label> <!-- field name is title -->
			<input type="text" name="title" id="title">
		</li>

		<li>
			<label for="body">Body: </label> <!-- field name is body -->
			<textarea name="body" id="body"></textarea>
		</li>

		<li>
			<input type="submit" value="Create Post">
		</li>
	</ul>

	<?php if ( isset($status) ) : ?>
		<p><?= $status; ?></p>
	<?php endif; ?>
</form>