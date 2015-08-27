<?php
/**
 * Masonry personality
 */
// initialization stuff

$personality = new masonry();

class masonry {
	function __construct() {
	}

	function theme_head($_zp_themeroot) {
	?>

		<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/masonry.css">
	
	<?php
		return false;
	}

	function theme_bodyopen($_zp_themeroot) {

	}


	function theme_content() {
		global $_zp_current_image;
	?>

		<div class="thumbnails">
			<div class="grid-sizer"></div>
			<?php	while (next_image()) {	?>
				<figure>
					<?php
					if (isImagePhoto()) {
						$link = html_encode(getDefaultSizedImage()).'"';
					} else {
						$link = html_encode(getImageLinkURL()).'"';
					}
					?>
					<a href="<?php echo $link; ?>" title="<?php echo sanitize(getImageTitle()); ?>">
					<?php printCustomSizedImage(getAnnotatedImageTitle(),null,300,null,null,null,null,null,null,null,true,null); ?>
					</a>
					<figcaption><?php echo getImageTitle(); ?></figcaption>
				</figure>
			<?php } ?>
		</div>

		<?php
	}

	function theme_bodyclose($_zp_themeroot) { ?>
		
		<script src="<?php echo $_zp_themeroot ?>/js/jquery.livingfade-0.2.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
		<script src="<?php echo $_zp_themeroot ?>/js/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo $_zp_themeroot; ?>/js/masonry.js"></script>

	<?php }
}
