<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php zp_apply_filter('theme_head'); ?>
<title>松本 拓也 | 写真家<?php if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
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
</header><!-- header -->
	
<main>
	<?php $randomImage = getRandomImages(); ?>
	<img src="<?php echo $randomImage->getSizedImage(800); ?>" class="main_img" />
</main><!-- main -->
			
<?php footer(); ?>
<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>
