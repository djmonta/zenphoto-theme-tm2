<?php
if (!defined('WEBPATH')) die();
$personality = getOption('tm2_personality');
require_once(SERVERPATH.'/'.THEMEFOLDER.'/tm2/'.$personality.'/functions.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title>松本 拓也 | 写真家 | <?php echo html_encode(getAlbumTitle()); if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
	<?php printRSSHeaderLink('Album',getAlbumTitle()); ?>
	<?php header_meta(); ?>
	<?php $personality->theme_head($_zp_themeroot); ?>

</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<?php $personality->theme_bodyopen($_zp_themeroot); ?>
<header>
	<h1 class="title">
		<a href="<?php echo html_encode(getGalleryIndexURL());?>" title="<?php echo sanitize(getGalleryTitle()); ?>"><?php echo getGalleryTitle();?></a>
	</h1>
	<nav class="menu">
		<?php if(function_exists('printCustomMenu') && ($menu = getOption('tm2_menu'))) {
			printCustomMenu($menu,'list','',"menu-active","submenu","menu-active",2); } ?>
	</nav>
</header><!-- header -->
<main class="clearfix">
	<?php $personality->theme_content(); ?>
</main>

<?php footer(); ?>
<?php $personality->theme_bodyclose($_zp_themeroot); ?>
<?php zp_apply_filter('theme_body_close'); ?>
</body>
</html>
