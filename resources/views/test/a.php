hello
<?php foreach ($questions as $user): ?>
	<?php echo $user->user; ?>
<?php endforeach; ?>



<?php
echo $questions->render();
?>