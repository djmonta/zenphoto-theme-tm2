<?php

require_once(SERVERPATH . "/" . ZENFOLDER . "/admin-functions.php");

class ThemeOptions {


  function ThemeOptions() {
 	  setThemeOptionDefault('Allow_search', false);
	  setThemeOptionDefault('Allow_cloud', false);
		setThemeOptionDefault('albums_per_page', 6);
		setThemeOptionDefault('albums_per_row', 2);
		setThemeOptionDefault('images_per_page', 200);
		setThemeOptionDefault('images_per_row', 5);
		setThemeOptionDefault('image_size', 1000, NULL, 'tm2');
		setThemeOptionDefault('image_use_side', 'longest', NULL, 'tm2');
		setThemeOptionDefault('thumb_transition', 1);
		setThemeOptionDefault('thumb_size', 100, NULL, 'tm2');
		setThemeOptionDefault('thumb_size', 100, NULL, 'tm2');
		setThemeOptionDefault('thumb_crop_width', 100);
		setThemeOptionDefault('thumb_crop_height', 100);
		setThemeOptionDefault('thumb_crop', 0);
		setThemeOptionDefault('tm2_personality', 'photoswipe');
		setThemeOptionDefault('tm2_transition', 'slide-hori');
		setThemeOptionDefault('tm2_caption_location', 'image');
		setThemeOptionDefault('tm2_menu', 'tm2');
		if (getOption('zp_plugin_zenpage')) {
			setThemeOption('custom_index_page', 'gallery', NULL, 'tm2', false);
		} else {
			setThemeOption('custom_index_page', '', NULL, 'tm2', false);
		}
		if (class_exists('cacheManager')) {
			cacheManager::deleteThemeCacheSizes('tm2');
			//cacheManager::addThemeCacheSize('tm2', 700, NULL, NULL, NULL, NULL, NULL, NULL, false, getOption('fullimage_watermark'), NULL, NULL);
			cacheManager::addThemeCacheSize('tm2', 100, NULL, NULL, getThemeOption('thumb_crop_width'), getThemeOption('thumb_crop_height'), NULL, NULL, true, getOption('Image_watermark'), NULL, NULL);
			cacheManager::addThemeCacheSize('tm2', 1000, NULL, NULL, NULL, NULL, NULL, NULL, false, getOption('Image_watermark'), NULL, NULL);

		}
		if (function_exists('createMenuIfNotExists')) {
			$menuitems = array(
										array('type'=>'menufunction','title'=>gettext('All Albums'),'link'=>'printAlbumMenuList("list",false,"","menu-active","inner_ul","menu-active","",false,false,false,false,getOption("menu_manager_truncate_string"));','show'=>1,'include_li'=>0,'nesting'=>0),
										array('type'=>'menufunction','title'=>gettext('All pages'),'link'=>'printPageMenu("list","","menu-active","inner_ul","menu-active","",0,false,getOption("menu_manager_truncate_string"));','show'=>1,'include_li'=>0,'nesting'=>0,getOption("menu_manager_truncate_string"))
										);
			createMenuIfNotExists($menuitems, 'tm2');
		}
  }

  /*function getOptionsDisabled() {
  	return array('thumb_size','image_size','custom_index_page');
  }*/

  function getOptionsSupported() {
		if (!getOption('zp_plugin_print_album_menu') && (($m = getOption('tm2_menu'))=='tm2' || $m=='zenpage' || $m == 'tm2')) {
			$note = '<p class="notebox">'.sprintf(gettext('<strong>Note:</strong> The <em>%s</em> custom menu makes use of the <em>print_album_menu</em> plugin.'),$m).'</p>';
		} else {
			$note = '';
		}
  	$options = array(
  								gettext('Theme personality') => array('key' => 'tm2_personality', 'type' => OPTION_TYPE_SELECTOR,
															'selections' => array(gettext('Image page') => 'image_page', gettext('lightbox') => 'lightbox', gettext('fancybox') => 'fancybox', gettext('photoswipe') => 'photoswipe', gettext('Image gallery') => 'image_gallery'),
															'desc' => gettext('Select the theme personality')),
  								gettext('Allow search') => array('key' => 'Allow_search', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Set to enable search form.')),
						  		gettext('Allow cloud') => array('key' => 'Allow_cloud', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Set to enable tag cloud for album page.')),
									gettext('Custom menu') => array('key' => 'tm2_menu', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Set this to the <em>menu_manager</em> menu you wish to use.').$note)
						  	);
  	if (getOption('tm2_personality')=='image_gallery') {
			$options[gettext('Image gallery transition')] = array('key' => 'tm2_transition', 'type' => OPTION_TYPE_SELECTOR,
															'selections' => array(gettext('None') => '', gettext('Fade') => 'fade', gettext('Shrink/grow') => 'resize', gettext('Horizontal') => 'slide-hori', gettext('Vertical') => 'slide-vert'),
															'order'=>10,
															'desc' => gettext('Transition effect for Image gallery'));
			$options[gettext('Image gallery caption')] = array('key' => 'tm2_caption_location', 'type' => OPTION_TYPE_RADIO,
															'buttons' => array(gettext('On image')=>'image', gettext('Separate')=>'separate',gettext('Omit')=>'none'),
															'order'=>10.5,
															'desc' => gettext('Location for Image gallery picture caption'));
		}
		return $options;
  }

	function handleOption($option, $currentValue) {
		switch ($option) {
			case 'tm2_menu':
				$menusets = array();
				echo '<select id="tm2_menuset" name="tm2_menu"';
				if (function_exists('printCustomMenu') && getThemeOption('custom_index_page', NULL, 'tm2') === 'gallery') {
					$result = query_full_array("SELECT DISTINCT menuset FROM ".prefix('menu')." ORDER BY menuset");
					foreach ($result as $set) {
						$menusets[$set['menuset']] = $set['menuset'];
					}
				} else {
					echo ' disabled="disabled"';
				}
				echo ">\n";
				echo '<option value="" style="background-color:LightGray">'.gettext('*standard menu').'</option>';
				generateListFromArray(array($currentValue), $menusets , false, false);
				echo "</select>\n";
				break;
		}
	}
}
?>