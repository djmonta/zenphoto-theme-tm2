<?php
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
<title><?php printGalleryTitle(); ?> | <?php echo gettext('Archive View'); if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
<?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
</head>
<body>
<?php zp_apply_filter('theme_body_open'); ?>
<div class="container">
	<div id="header">
		<div id="logo-floater">
			<h1 class="title"><a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php echo html_encode(getGalleryTitle());?></a></h1>
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

      	<div id="archive">
			<p><?php echo gettext('Images By Date'); ?></p>
			<?php printAllDates(); ?>
		</div>

    </div>
    <!-- end content -->
	<?php footer(); ?>

</div><!-- /container -->
<?php
zp_apply_filter('theme_body_close');
?>
</body>
</html>
