<?php
/**
 * Lightbox personality
 */
// initialization stuff

$personality = new lightbox();

class lightbox {
	function __construct() {
	}

	function theme_head($_zp_themeroot) {
	?>

		<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/lightbox.min.js"></script>
		<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/lightbox.css" type="text/css" />
	
	<?php
		return false;
	}

	function theme_bodyopen($_zp_themeroot) {

	}


	function theme_content() {
		global $_zp_current_image;
	?>
		<!-- Lightbox section -->
		<div class="thumbnails">
			<?php	while (next_image()) {	?>
				<figure>
					<?php
					if (isImagePhoto()) {
						// lightbox is only for real images
						$link = html_encode(getDefaultSizedImage()).'"';
					} else {
						$link = html_encode(getImageLinkURL()).'"';
					}
					?>
					<a href="<?php echo $link; ?>" title="<?php echo sanitize(getImageTitle()); ?>" data-lightbox="<?php echo sanitize(getAlbumTitle()); ?>">
					<?php printImageThumb(getImageTitle()); ?>
					</a>
					<figcaption><?php echo getImageTitle(); ?></figcaption>
				</figure>
			<?php } ?>
		</div>

		<?php
	}

	function theme_bodyclose($_zp_themeroot) { ?>
		
		<script src="<?php echo $_zp_themeroot ?>/js/jquery.livingfade-0.2.js"></script>

	<?php }
}
