<?php
	/***
	Plugin Name: plista
	Plugin URI: http://www.plista.com
	Description: Plugin for displaying plista RecommendationAds
	Version: 1.3.4
	Author: msch (wordpress@plista.com)
	Author URI: http://www.plista.com
	***/

class plista {

	const VERSION = '1.3.4';

	/**
	 * combatibilitycheck 
	 * register admin menu and custom css
	 * 
	 * @return void
	 */
	public function init() {
		global $wp_version;
		$exit_msg_wp='plista requires WordPress 2.5 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
		$exit_msg_php='plista requires php 5.2 or newer. Your are using PHP Version: '.PHP_VERSION.'. Please contact wordpress@plista.com if you get this message.';
		if ((version_compare($wp_version,"2.5","<")) && (version_compare(PHP_VERSION,"5.2","<"))){
			exit ($exit_msg_wp.'<br />'.$exit_msg_php);
		}
		else if (version_compare(PHP_VERSION,"5.2","<=")){
			exit ($exit_msg_php);
		}
		else if (version_compare($wp_version,"2.5","<")){
			exit ($exit_msg_wp);
		}

		$plista_lang_path = plugin_basename( dirname( __FILE__ ) .'/lang' );
		load_plugin_textdomain( 'plista', '', $plista_lang_path );

		// autoinsert widget after content or not
		$autoinsert = get_option('plista_autoinsert');
		if ($autoinsert != 'checked="checked"') {
			// set the priority very high so that the plista plugin is the last being inserted
			add_filter('the_content', array(__CLASS__, 'plista_integration'), 10000);
		}

		add_action('wp_head', array(__CLASS__, 'head'), 200);

		add_action('admin_menu', array(__CLASS__, 'plista_admin_actions'));

	}

	/**
	 * admin options page
	 *
	 * @return void
	 */
	public function plista_admin() {
		include('plista_integration_admin.php');
	}

	/**
	 * define plista wp version
	 *
	 * @return string
	 */
	public function plista_version() {
		return self::VERSION;
	}


	/**
	* simple check if wptouch is active
	*
	* @return boolean
	*/
	public function plista_ismobile() {
		if (preg_match('/wptouch/', get_stylesheet_directory_uri())) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * set adminpage if user is actually current admin
	 *
	 * @return void
	 */
	public function plista_admin_actions() {
		if( current_user_can('level_10')) {
			wp_enqueue_script( 'plista-admin', plugins_url('/js/plista-admin.js', __FILE__), array(), '1.3' );
			wp_enqueue_style( 'plista-admin', plugins_url('/css/plista-admin.css', __FILE__), array(), '1.3' );
			add_options_page('plista', 'plista', 1, 'plista', array(__CLASS__, 'plista_admin'));
		}

	}

	/**
	 * extract youtube img from current post
	 *
	 * @return string
	 */
	public function get_youtube_img() {
		global $post, $posts;
		$youtube_img = '';
		ob_start();
		ob_end_clean();
		$pattern = '/http:\/\/www\.youtube\.com\/(v|embed)\/([1-9|_|A-z]+)/';
		$output = preg_match_all($pattern, $post->post_content, $matches);
		$youtubeid = $matches [2] [0];
		$youtube_img = 'http://img.youtube.com/vi/'.$youtubeid.'/0.jpg';
		return $youtube_img;
	}

	/**
	 * extract first img from current post
	 *
	 * @return string
	 */
	public function get_first_plista_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$pattern = "/src=[\"']?([^\"']?.*(png|jpg|gif|jpeg))[\"']?/i";
		$output = preg_match_all($pattern, $post->post_content, $matches);
		$first_img = $matches [1] [0];
		// always remove title and alt attributes containing something like title="bild.jpg"
		$first_img = preg_replace(array('/[\"]+/', '/ (alt|title)=?.*(png|jpg|gif|jpeg)/'), array('', ''), $first_img);
		
		// add an extra check for img size cause sometimes they use ad pixels in the article
		// ad pixels are normaly only 1px x 1px but too be sure set it to 20px x 20px
		if ($first_img) {
			list($width, $height, $type, $attr) = @getimagesize($first_img);

			if (!is_null($height) && $height >= '20' && $height >= '20') {
				return $first_img;
			} else {
				return $first_img;
			}
		}
		return '';
	}

	/**
	 * set custom css
	 *
	 * @return void
	 */
	public function head() {	

		// styles for mobile widget
		$mobile_editcss = get_option( 'plista_mobile_editcss' );
		$mobile_hlsize = get_option( 'plista_mobile_hlsize' );
		$mobile_hlcolor = get_option( 'plista_mobile_hlcolor' );
		$mobile_hlbgcolor = get_option( 'plista_mobile_hlbgcolor' );
		$mobile_imgsize = get_option( 'plista_mobile_imgsize' );
		$mobile_imgheight = get_option( 'plista_mobile_imgheight' );
		$mobile_ttlcolor = get_option( 'plista_mobile_ttlcolor' );
		$mobile_ttlsize = get_option( 'plista_mobile_ttlsize ');
		$mobile_txtcolor = get_option( 'plista_mobile_txtcolor' );
		$mobile_txtsize = get_option( 'plista_mobile_txtsize' );

		// styles for non-mobile widget
		$editcss = get_option( 'plista_editcss' );
		$hlsize = get_option( 'plista_hlsize' );
		$hlcolor = get_option( 'plista_hlcolor' );
		$hlbgcolor = get_option( 'plista_hlbgcolor' );
		$imgsize = get_option( 'plista_imgsize' );
		$imgheight = get_option( 'plista_imgheight' );
		$ttlcolor = get_option( 'plista_ttlcolor' );
		$ttlsize = get_option( 'plista_ttlsize' );
		$txtcolor = get_option( 'plista_txtcolor' );
		$txtsize = get_option( 'plista_txtsize' );
		$txthover = get_option( 'plista_txthover' );

		$plistacss = false;

		if (!self::plista_ismobile() && $editcss == 'checked="checked"') {
				$plistacss = ".plistaWidgetHead {
								font-size: ".$hlsize." !important;
								color: ".$hlcolor." !important;
								background-color: ".$hlbgcolor." !important;
							}

							.plistaItem img,
							.itemLink img {
								width: ".$imgsize." !important;
								max-height: ".$imgheight." !important;
							}

							.itemTitle {
								color: ".$ttlcolor." !important;
								font-size: ".$ttlsize." !important
							}

							.itemText {
									color: ".$txtcolor." !important;
									font-size: ".$txtsize." !important
							}

							.itemMore {color: ".$txtcolor." !important;}

							.plistaWidgetList a:hover,
							.plistaWidgetList a:active,
							.plistaWidgetList a:focus{background-color:  ".$txthover."  !important}
				";

		} else if ($mobile_editcss == 'checked="checked"') {
				$plistacss = ".plistaWidgetHead {
								font-size: ".$mobile_hlsize." !important;
								color: ".$mobile_hlcolor." !important;
								background-color: ".$mobile_hlbgcolor." !important;
							}

							.plistaItem img,
							.itemLink img {
								width: ".$mobile_imgsize." !important;
								max-height: ".$mobile_imgheight." !important;
							}

							.itemTitle {
								color: ".$mobile_ttlcolor." !important;
								font-size: ".$mobile_ttlsize." !important
							}

							.itemText {
								color: ".$mobile_txtcolor." !important;
								font-size: ".$mobile_txtsize." !important
							}

							.itemMore {color: ".$mobile_txtcolor." !important;}
				";
		}
		if ($plistacss) {
			echo '<style type="text/css">'.$plistacss.'</style>';
		}

		return;
	}

	/**
	 * main plista js code
	 *
	 * @return string
	 */
	public function plista_content( $plista_data ) {

		$widgetname = get_option( 'plista_widgetname' );  
       	$jspath = get_option( 'plista_jspath' );
		
		$setpicads = get_option( 'plista_setpicads' );
		$setblacklist = get_option( 'plista_setblacklist' );
		$blacklistpicads = get_option( 'plista_blacklistpicads' );
		$blacklistrecads = get_option( 'plista_blacklistrecads' );
		$tags = get_option( 'plista_tags' );
		$tag_ID = array();
		$post_tags = get_the_tags();
		if (isset($post_tags) && is_array($post_tags)) {
			foreach($post_tags as $tag) {
				array_push($tag_ID,$tag->term_id);
			}
			$istag = is_array($tags) ? array_intersect($tag_ID, $tags) : '';
		} else {
			$istag = '';
		}

		$categories = get_option( 'plista_categories' );
		$mobile_categories = get_option( 'plista_mobile_categories' );
		$cat_ID = array();
		$post_categories = get_the_category();
		if (isset($post_categories)) {
			foreach($post_categories as $category) {
				array_push($cat_ID,$category->cat_ID);
			}
			$iscategory = is_array($categories) ? array_intersect($cat_ID, $categories) : '';
			$ismobilecategory = is_array($mobile_categories) ? array_intersect($cat_ID, $mobile_categories) : '';
		} else {
			$iscategory = '';
			$ismobilecategory = '';
		}

		$plistapicads = '';
		$postid = get_the_ID();
		$ispiclist = array_search((string)$postid, explode(',', $blacklistpicads));
		$isreclist = array_search((string)$postid, explode(',', $blacklistrecads));

		if (!self::plista_ismobile()) {
			if ($setpicads == 'checked="checked"' && $ispiclist === false && empty($ismobilecategory)) {
				$plistapicads = 'PLISTA.pictureads.enable(true);';
			}
			$plistapush = 'PLISTA.items.push('.json_encode($plista_data).');';
		}

		//blacklist some pages where widget should never be shown
		if ($isreclist === false && empty($iscategory) && empty($istag) && empty($ismobilecategory)) {
			if(strpos($_SERVER['REQUEST_URI'], '/attachment/') == false) {
				if((is_single() || is_page()) &&
					!is_attachment() &&
					!is_admin() &&
					get_post_status() != 'private' &&
					!post_password_required() &&
					!is_404() &&
					!is_preview() &&
					!is_feed() &&
					!is_trackback() &&
					!is_archive() &&
					!is_search()) {

					return '<!-- plista wp Version '.self::plista_version().' - PHP Version: '.PHP_VERSION.'--><div id="'.$widgetname.'"></div>
					<script type="text/javascript" src="'.$jspath.'"></script>
					<script type="text/javascript">
						'.$plistapush.'
						'.$plistapicads.'
						PLISTA.partner.init();
					</script>';
				}
			} 
		}
	}

	/**
	 * extract basic data like title, text from current post
	 *
	 * @return array
	 */
	public function plista_integration ( $content ) {
		global $post;
		$text = get_the_content();
		$bad = array(
			'@<script[^>]*?>.*?</script>@si',	// strip out javascript
			'@<iframe[^>]*?>.*?</iframe>@si',	// strip out iframe
			'@<style[^>]*?>.*?</style>@siU',	// strip style tags properly
			'@<[\/\!]*?[^<>]*?>@si',			// strip out HTML tags
			'@<![\s\S]*?--[ \t\n\r]*>@'			// strip multi-line comments including CDATA
		);
		$text = strip_tags(preg_replace($bad, '', $text));
		$defaultimg = get_option('plista_defaultimg');
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text ); // strip out caption tags
		$id = get_the_id();
		$youtubepattern = "/http:\/\/www\.youtube\.com\/(v|embed)\/([1-9|_|A-z]+)/";
		$isyoutube = preg_match($youtubepattern, $post->post_content);
		
		// first try to get the article thumbnail image
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail($id) ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id));
			$imgsrc = $thumbnail[0];
		}
		// if we couldn't find one, check for other images in the article
		if (!$imgsrc || is_null($imgsrc)) {
			$attachments = get_children( array(
				'post_parent'    => get_the_ID(),
				'post_type'      => 'attachment',
				'numberposts'    => 1, // show all -1
				'post_status'    => 'inherit',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ASC'
			));

			foreach ( $attachments as $attachment_id => $attachment ) {
				$thumbnail = wp_get_attachment_image_src( $attachment_id );
				$imgsrc = $thumbnail[0];
			}
			if (!$imgsrc || is_null($imgsrc)) {
				$imgsrc = self::get_first_plista_image();
				if (!$imgsrc || is_null($imgsrc) && !empty($isyoutube)) {
					$imgsrc = self::get_youtube_img();
				}
			}
		}

		// still no image found so take the default img
		if (!$imgsrc || is_null($imgsrc)) {
				$imgsrc = strtolower($defaultimg);
		}

		$content .= self::plista_content(array(
			'objectid' => get_the_id(),
			'title' => get_the_title(),
			'text' => $text,
			'url' => get_permalink(),
			'img' => $imgsrc
		));

		return $content;
	}

}
plista::init();

function plista_integration() {
	return plista::plista_integration(NULL);
}
?>
