<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?> | <?php echo html_encode(getAlbumTitle()); ?> | <?php echo html_encode(getImageTitle()); ?></title>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
	<?php if(zp_has_filter('theme_head','colorbox::css')) { ?>
		<script type="text/javascript">
			// <!-- <![CDATA[
			$(document).ready(function(){
				$(".colorbox").colorbox({
					inline:true,
					href:"#imagemetadata",
					close: '<?php echo gettext("close"); ?>'
				});
				<?php
				$disposal = getOption('protect_full_image');
				if ($disposal == 'Unprotected' || $disposal == 'Protected view') {
					?>
					$("a.thickbox").colorbox({
						maxWidth:"98%",
						maxHeight:"98%",
						photo:true,
						close: '<?php echo gettext("close"); ?>'
					});
					<?php
				}
				?>
			});
			// ]]> -->
		</script>
	<?php } ?>
	<?php printRSSHeaderLink('Album',gettext('Gallery RSS')); ?>
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<div class="container">
	<div id="header">
		<div id="logo-floater">
			<h1 class="title"><a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo html_encode(getGalleryTitle()); ?></a></h1>
		</div>

		<div class="sidebar">
			<div id="leftsidebar">
				<?php include("sidebar.php"); ?>
			</div>
		 </div>

	</div>

		<!-- header -->

	<!-- begin content -->
	<div class="main section" id="main">
		<h2 id="gallerytitle">
			<?php printHomeLink('',' » '); ?>
			<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo getGalleryTitle();?></a> »
							<?php printParentBreadcrumb("", " » ", " » "); printAlbumBreadcrumb("  ", " » "); ?>
							<?php printImageTitle(true); ?>
		</h2>
		<?php printCodeblock(1); ?>
		<div id="image_container">
			<?php
			$fullimage = getFullImageURL();
			if (!empty($fullimage)) {
				?>
				<a href="<?php echo html_encode($fullimage);?>" title="<?php echo getBareImageTitle();?>" class="thickbox">
				<?php
			}
			printCustomSizedImage(getImageTitle(), null, 520);
			if (!empty($fullimage)) {
				?>
				</a>
				<?php
			}
			?>
			<br />
			<?php
			if (getImageMetaData()) {
				echo printImageMetadata(NULL, 'colorbox');
				?>
				<br clear="all" />
				<?php
			}
			if (function_exists('hasMapData') && hasMapData()) {
				setOption('gmap_display', 'colorbox', false);
				?>
				<span id="map_link">
					<?php printGoogleMap(NULL,NULL,NULL,NULL,'gMapOptionsImage'); ?>
				</span>
				<br clear="all" />
				<?php
			}
			?>
		</div>
		<?php
		@call_user_func('printRating');
		@call_user_func('printCommentForm'); ?>
	</div>
	<!-- end content -->
	
	<?php
	printCodeblock(2);
	footer();
	?>

	
</div><!-- /container -->
<?php
zp_apply_filter('theme_body_close');
?>
</body>
</html>
