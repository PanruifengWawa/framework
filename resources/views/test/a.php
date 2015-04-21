hello
<?php foreach ($questions as $question): ?>
	<?php echo $question->content; ?>
    <br />
<?php endforeach; ?>



<?php
echo $questions->render();
?>