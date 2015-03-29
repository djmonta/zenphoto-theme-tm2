<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html>
<html>
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title>松本 拓也 | 写真家 | <?php printPageTitle();?></title>
	<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
	<?php header_meta(); ?>
</head>
<body class="sidebars">
<?php zp_apply_filter('theme_body_open'); ?>
<header>
	<h1 class="title">
		<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo html_encode(getGalleryTitle()); ?></a>
	</h1>
	<nav class="menu">
		<?php if(function_exists('printCustomMenu') && ($menu = getOption('tm2_menu'))) {
			printCustomMenu($menu,'list','',"menu-active","submenu","menu-active",2); } ?>
	</nav>
</header>
<!-- header -->

<!-- begin content -->
<main>
	<h2><?php printPageTitle(); ?></h2>
	<?php printPageContent(); ?>
</main>
<!-- end content -->

<?php footer(); ?>

<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>
