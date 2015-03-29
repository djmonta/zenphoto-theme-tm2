<?php
if (!defined('WEBPATH')) die();
$personality = strtolower(getOption('tm_personality'));
require_once(SERVERPATH.'/'.THEMEFOLDER.'/tm/'.$personality.'/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?> | <?php echo gettext('Search'); if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
	<?php $oneImagePage = $personality->theme_head($_zp_themeroot); ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
  <?php printRSSHeaderLink('Gallery',gettext('Gallery RSS')); ?>
	<script type="text/javascript">
		// <!-- <![CDATA[
		function toggleExtraElements(category, show) {
			if (show) {
				jQuery('.'+category+'_showless').show();
				jQuery('.'+category+'_showmore').hide();
				jQuery('.'+category+'_extrashow').show();
			} else {
				jQuery('.'+category+'_showless').hide();
				jQuery('.'+category+'_showmore').show();
				jQuery('.'+category+'_extrashow').hide();
			}
		}
		// ]]> -->
	</script>
</head>
<body>
<?php
zp_apply_filter('theme_body_open');
$personality->theme_bodyopen($_zp_themeroot);
$numimages = getNumImages();
$numalbums = getNumAlbums();
$total = $numimages + $numalbums;
$zenpage = getOption('zp_plugin_zenpage');
if ($zenpage && !isArchive()) {
	$numpages = getNumPages();
	$numnews = getNumNews();
	$total = $total + $numnews + $numpages;
} else {
	$numpages = $numnews = 0;
}
$searchwords = getSearchWords();
$searchdate = getSearchDate();
if (!empty($searchdate)) {
	if (!empty($seachwords)) {
		$searchwords .= ": ";
	}
	$searchwords .= $searchdate;
}
if (!$total) {
	$_zp_current_search->clearSearchWords();
}
?>
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
		<?php
		if ($total > 0 ) {
			?>
			<p>
			<?php
			printf(ngettext('%1$u Hit for <em>%2$s</em>','%1$u Hits for <em>%2$s</em>',$total), $total, html_encode($searchwords));
			?>
			</p>
			<?php
		} else {
			echo "<p>".gettext('Sorry, no matches for your search.')."</p>";
			$_zp_current_search->setSearchParams('words=');
		}

		?>
		<?php
		if ($zenpage && $_zp_page==1) { //test of zenpage searches
			define ('TRUNCATE_LENGTH',80);
			define ('SHOW_ITEMS', 5);
			?>
			<div id="tm2_search">
			<?php

			if ($numpages>0) {
				?>
				<div id="tm2_searchhead_pages">
					<h3><?php printf(gettext('Pages (%s)'),$numpages); ?></h3>
					<?php
					if ($numpages>SHOW_ITEMS) {
						?>
						<p class="pages_showmore"><a href="javascript:toggleExtraElements('pages',true);"><?php echo gettext('Show more results');?></a></p>
						<p class="pages_showless" style="display:none;"><a href="javascript:toggleExtraElements('pages',false);"><?php echo gettext('Show fewer results');?></a></p>
						<?php
					}
					?>
				</div>
				<div class="tm2_searchtext">
					<ul>
					<?php
					$c = 0;
					while (next_page()) {
						$c++;
						?>
						<li<?php if ($c>SHOW_ITEMS) echo ' class="pages_extrashow" style="display:none;"'; ?>>
						<?php print printPageTitleLink(); ?>
						<p style="text-indent:1em;"><?php echo exerpt($_zp_current_zenpage_page->getContent(),TRUNCATE_LENGTH); ?></p>
						</li>
						<?php
					}
					?>
					</ul>
				</div>
				<?php
			}
			if ($numnews>0) {
				if ($numpages>0) echo '<br />';
				?>
				<div id="tm2_searchhead_news">
					<h3><?php printf(gettext('Articles (%s)'),$numnews); ?></h3>
					<?php
					if ($numnews>SHOW_ITEMS) {
						?>
						<p class="news_showmore"><a href="javascript:toggleExtraElements('news',true);"><?php echo gettext('Show more results');?></a></p>
						<p class="news_showless" style="display:none;"><a href="javascript:toggleExtraElements('news',false);"><?php echo gettext('Show fewer results');?></a></p>
						<?php
					}
					?>
				</div>
				<div class="tm2_searchtext">
					<ul>
					<?php
					$c=0;
					while (next_news()) {
						$c++;
						?>
						<li<?php if ($c>SHOW_ITEMS) echo ' class="news_extrashow" style="display:none;"'; ?>>
						<?php printNewsTitleLink(); ?>
						<p style="text-indent:1em;"><?php echo exerpt($_zp_current_zenpage_news->getContent(),TRUNCATE_LENGTH); ?></p>
						</li>
						<?php
					}
					?>
					</ul>
				</div>
				<?php
			}
		}
			if ($total>0 && ($numpages + $numnews) > 0) {
				?>
				<br />
				<div id="tm2_searchhead_gallery">
					<h3>
					<?php
					if (getOption('search_no_albums')) {
						if (!getOption('search_no_images')) {
							printf(gettext('Images (%s)'),$numimages);
						}
					} else {
						if (getOption('search_no_images')) {
							printf(gettext('Albums (%s)'),$numalbums);
						} else {
							printf(gettext('Albums (%1$s) &amp; Images (%2$s)'),$numalbums,$numimages);
						}
					}
					?>
					</h3>
				</div>
				<?php
			}
			?>
			</div>
			<ul id="albums" class="thumbnails">
				<?php
				while (next_album()) {
					?>
					<li class="album thumbnail">
						<a class="albumthumb" href="<?php echo getAlbumLinkURL();?>" title="<?php printf (gettext('View album:  %s'),sanitize(getAlbumTitle())); ?>">
							<?php printCustomAlbumThumbImage(getAlbumTitle(),85,NULL,NULL,85,85); ?>
						</a>

					</li>
				  <?php
				}
				?>
			  </ul>
				<p style="clear: both; "></p>
				<?php $personality->theme_content(NULL); ?>
				<?php
				if ((getNumAlbums() != 0) || !$oneImagePage){
	    	    printPageListWithNav(gettext("« prev"),gettext("next »"), $oneImagePage);
				}
		        ?>
	</div>
	<?php footer(); ?>

</div>
<?php
zp_apply_filter('theme_body_close');
?>
</body>
</html>
