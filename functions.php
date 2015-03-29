<?php

// force UTF-8 Ø
require_once (SERVERPATH.'/'.ZENFOLDER.'/'.PLUGIN_FOLDER.'/image_album_statistics.php');

function gMapOptionsImage($map) {
	$map->setWidth(535);
}
function gMapOptionsAlbum($map) {
	global $points;
	foreach ($points as $coord) {
		addGeoCoord($map, $coord);
	}
	$map->setWidth(535);
}

function header_meta() {
	global $_zp_gallery_page, $_zp_current_category, $_zp_gallery, $_zp_themeroot;
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="写真家 松本拓也のポートフォリオサイト" />
<meta name="keywords" content="松本拓也,Takuya Matsumoto,写真家,カメラマン,フォトグラファー" />

<meta property="og:title" content="松本 拓也 | Takuya Matsumoto | Photographer" />
<meta property="og:site_name" content="松本 拓也 | Takuya Matsumoto | Photographer" />
<meta property="og:description" content="写真家 松本拓也のポートフォリオサイト" />
<meta property="og:type" content="website" />
<meta property="fb:app_id" content="1581386945442735" />
<meta property="og:url" content="http://takuya-matsumoto.com/" />
<meta property="og:image" content="http://takuya-matsumoto.com/themes/tm2/images/og.png" />

<link rel="shortcut icon" href="<?php echo $_zp_themeroot ?>/images/favicon.ico" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_zp_themeroot ?>/images/apple-touch-icon.png">
<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/zen.css" type="text/css" />
<script src="<?php echo $_zp_themeroot ?>/js/common.js"></script>
<!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->
<?php
}

function footer() {
	global $_zp_themeroot;
?>
	<footer>
		Copyright &copy; 2015 Takuya Matsumoto.
	</footer>
<?php
}
