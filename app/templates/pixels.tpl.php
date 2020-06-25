<div <?php print html_attr($data['attr']); ?>>
    <?php foreach ($data['pixels'] as $pixel): ?>
		<span <?php print pixel_attr($pixel); ?>></span>
    <?php endforeach; ?>
</div>