<?php
/**
 * fancybox personality
 */
// initialization stuff

$personality = new fancybox();

class fancybox {
	function __construct() {
	}

	function theme_head($_zp_themeroot) {
	?>
		<script src="<?php echo $_zp_themeroot; ?>/js/jquery.easing.1.3.js"></script>
		<script src="<?php echo $_zp_themeroot; ?>/js/jquery.fancybox.js"></script>
		<script src="<?php echo $_zp_themeroot; ?>/js/jquery.livingfade-0.2.js"></script>
		<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/jquery.fancybox.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/fancybox.css" type="text/css" />

	<?php
	return false;
	}

	function theme_bodyopen($_zp_themeroot) {

	}

	function theme_content() {
		global $_zp_current_image;
	?>
		<!-- fancybox section -->
		<div class="thumbnails">
			<?php	while (next_image()) {	?>
				<figure>
					<?php
					if (isImagePhoto()) {
						// fancybox is only for real images
						$link = html_encode(getDefaultSizedImage()).'" class="fancybox"';
					} else {
						$link = html_encode(getImageLinkURL()).'"';
					}
					?>
					<a href="<?php echo $link; ?>" title="<?php echo sanitize(getImageTitle()); ?>" data-fancybox-group="<?php echo sanitize(getAlbumTitle()); ?>">
					<?php printImageThumb(getImageTitle()); ?>
					</a>
					<figcaption><?php echo getImageTitle(); ?></figcaption>
				</figure>
			<?php } ?>
		</div>
	<?php
	}
	function theme_bodyclose($_zp_themeroot) { ?>
		<script src="<?php echo $_zp_themeroot; ?>/js/fancybox.js"></script>

	<?php
	}

}

?>