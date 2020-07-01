<?php foreach ($data as $card) : ?>
	<div class="card">
		<div class="card-info">
			<p class="price">Price: <?php print $card['price']; ?>€</p>
			<div class="card-image" style="background-image: url('<?php print $card['image']; ?>')"></div>
			<p><?php print $card['name']; ?></p>
			<p><?php print $card['percentage']; ?>%</p>
			<p>Size: <?php print $card['size']; ?>ml.</p>
		</div>
		<p>Available: <?php print $card['amount']; ?></p>
        <?php if (\App\App::$session->getUser()): ?>
			<?php print $card['button']?>
        <?php endif; ?>
	</div>
<?php endforeach; ?>