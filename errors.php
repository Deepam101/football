<?php if (count($errors)>0): ?>
	<div class="error" style="border: 1px solid black;
	color: red;border: 2px solid red;padding: 10px;border-radius: 15px;
margin:0px auto;
background:#f2dede;">
		<?php foreach ($errors as $error): ?>
		
			<p><?php echo $error; ?></p>
			<?php endforeach ?>	
		
	</div>
	<?php endif ?>