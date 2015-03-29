<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?> | <?php echo gettext('Register'); ?></title>
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
	<?php header_meta(); ?>
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<header>
	<h1 class="title">
		<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php printGalleryTitle(); ?>"><?php echo getGalleryTitle(); ?></a>
	</h1>
	<?php if(function_exists('printCustomMenu') && ($menu = getOption('tm2_menu'))) { ?>
		<nav class="menu">
			<?php printCustomMenu($menu,'list','',"menu-active","submenu","menu-active",2); ?>
		</nav>
	<?php } ?>
</header>
<!-- header -->
<!-- begin content -->
<main>
	<h2 id="gallerytitle">
		<?php echo gettext('Page not found'); ?>
	</h2>
	<div class="errorbox">
		<?php
		echo gettext("The Zenphoto object you are requesting cannot be found.");
		if (isset($album)) {
			echo '<br />'.gettext("Album").': '.html_encode($album);
		}
		if (isset($image)) {
			echo '<br />'.gettext("Image").': '.html_encode($image);
		}
		if (isset($obj)) {
			echo '<br />'.gettext("Theme page").': '.html_encode(substr(basename($obj),0,-4));
		}
		?>
	</div>
</main>
<!-- end content -->
<?php footer(); ?>
<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>
