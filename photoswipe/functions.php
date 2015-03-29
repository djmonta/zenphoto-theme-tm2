<?php
/**
 * photoswipe personality
 */
// initialization stuff

$personality = new photoswipe();

class photoswipe {
	function __construct() {
	}

	function theme_head($_zp_themeroot) {
	?>
		<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/photoswipe.css" />
		<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/default-skin/default-skin.css" />
		<script src="<?php echo $_zp_themeroot; ?>/js/photoswipe.min.js"></script>
		<script src="<?php echo $_zp_themeroot; ?>/js/photoswipe-ui-default.min.js"></script>
	<?php
	}

	function theme_bodyopen($_zp_themeroot) {
	}

	function theme_content() {
		global $_zp_current_image;
	?>
		<!-- photoswipe section -->
		<div class="thumbnails">
			<?php	while (next_image()) {	?>
				<figure>
					<?php
						if (isImagePhoto()) {
							// photoswipe is only for real images
							$link = html_encode(getDefaultSizedImage()).'" class="photoswipe"';
						} else {
							$link = html_encode(getImageLinkURL()).'"';
						}
					?>
					<a href="<?php echo $link; ?>" title="<?php echo sanitize(getImageTitle()); ?>" data-size="<?php echo getFullWidth(); ?>x<?php echo getFullHeight();?>" data-author="Takuya Matsumoto">
						<?php printImageThumb(getImageTitle()); ?>
					</a>
					<figcaption><?php echo getImageTitle(); ?></figcaption>
				</figure>
			<?php } ?>
		</div>

		<?php include("photoswipe.php") ?>

	<?php
	}

	function theme_bodyclose($_zp_themeroot) { ?>
		<script src="<?php echo $_zp_themeroot; ?>/js/photoswipe.js"></script>
		<script src="<?php echo $_zp_themeroot ?>/js/jquery.livingfade-0.2.js"></script>


	<?php
	}
}

?>