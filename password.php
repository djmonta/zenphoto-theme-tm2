<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?> | <?php echo gettext('Password required'); ?></title>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<div class="container">
	<div id="header">
		<div id="logo-floater">
			<h1 class="title"><a href="<?php echo getGalleryIndexURL(false);?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo getGalleryTitle();?></a></h1>
		</div>
	</div>
	<!-- header -->
	<!-- begin content -->
	<div class="main section" id="main">
		<h2 id="gallerytitle">
			<?php printHomeLink('',' » '); ?>
			<a href="<?php echo getGalleryIndexURL(false);?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo getGalleryTitle();?></a> »
			<?php echo "<em>".gettext('Password required')."</em>"; ?>
		</h2>
		<h3><?php echo gettext('A password is required to access this page.') ?></h3>
		<?php printPasswordForm($hint, $show, false); ?>
		<?php footer(); ?>
		<p style="clear: both;"></p>
	</div>
	<!-- end content -->
</div><!-- /container -->
<?php
zp_apply_filter('theme_body_close');
?>
</body>
</html>
