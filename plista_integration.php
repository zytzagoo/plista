<?php
	/*
	Plugin Name: plista
	Plugin URI: http://www.plista.com
	Description: Plugin for displaying plista Recommendations 
	Author: msch
	Version: 1.0
	Author URI: http://www.plista.com
	
	/* check php and wordpress version */
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

	// autoinsert widget after content or not
	$autoinsert = get_option('plista_autoinsert');
	if ($autoinsert != 'checked="checked"') {
		add_filter('the_content', 'plista_integration');
	}
	
	// function for finding the first image in a post
	function get_first_plista_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];

		return $first_img;
	} 

	function plista_query($plista_data) {
		$context = stream_context_create(array(
			'http' => array('timeout' => 0.5)
		));
		$source = 'http://static-seo.plista.com/?'.http_build_query($plista_data);
		$plista = @file_get_contents($source, 0, $context)."";
		return $plista;
	}

	function add_plista_styles() {
		global $post;
		$hlcolor = urlencode(get_option('plista_hlcolor'));
		$hlbgcolor = urlencode(get_option('plista_hlbgcolor'));
		$imgsize = urlencode(get_option('plista_imgsize'));
		$imgheight = urlencode(get_option('plista_imgheight'));
		$ttlcolor = urlencode(get_option('plista_ttlcolor'));
		$ttlsize = urlencode(get_option('plista_ttlsize'));
		$txtcolor = urlencode(get_option('plista_txtcolor'));
		$txtsize = urlencode(get_option('plista_txtsize'));
		$txthover = urlencode(get_option('plista_txthover'));
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo WP_PLUGIN_URL . '/plista/lib/plistastyles.php?hlcolor=' . $hlcolor . '&hlbgcolor=' . $hlbgcolor . '&imgsize=' . $imgsize . '&imgheight=' . $imgheight . '&ttlcolor=' . $ttlcolor . '&ttlsize=' . $ttlsize . '&txtcolor=' . $txtcolor . '&txtsize=' . $txtsize . '&txthover=' . $txthover; ?>" />
		<?php
	}
	
	// add stylesheet if edit css is activated
	if (get_option('plista_editcss') == 'checked="checked"') {
		add_action('wp_head','add_plista_styles');
	}


	// get current objectid, title, text, url and image
	function plista_integration ($content) {
		global $post;
		$widgetname = get_option('plista_widgetname');
		$widgetname = str_replace('plista_widget_', '', $widgetname);
        $publickey = get_option('plista_publickey');
		$publickey = preg_replace('/(http:\/\/static.plista.com\/fullplista\/|\.js)/', '', $publickey);
		$publickey = preg_replace('/(http:\/\/farm.plista.com\/widgets\/|\.js)/', '', $publickey);
		$setpicads = get_option('plista_setpicads');
		$setblacklist = get_option('plista_setblacklist');
		$blacklistpicads = get_option('plista_blacklistpicads');
		$blacklistrecads = get_option('plista_blacklistrecads');
		$plistacss || $plistapicads = '';
		$postid = get_the_ID();
		$ispiclist = array_search((string)$postid, explode(',', $blacklistpicads));
		$isreclist = array_search((string)$postid, explode(',', $blacklistrecads));

		// enable plista pictureAds
		if ($setpicads == 'checked="checked"' && $ispiclist === false) {
				$plistapicads = '<script type="text/javascript">PLISTA.pictureads.enable(true);</script>';
		}
		$text = get_the_content();
		// filter all the bad stuff
		$badtags = array(
			'@<script[^>]*?>.*?</script>@si',  // Strip out javascript
			'@<iframe[^>]*?>.*?</iframe>@si',  // Strip out iframe
			'@<style[^>]*?>.*?</style>@siU',   // Strip style tags properly
			'@<[\/\!]*?[^<>]*?>@si',           // Strip out HTML tags
			'@<![\s\S]*?--[ \t\n\r]*>@'        // Strip multi-line comments including CDATA
		);
		$text = strip_tags(preg_replace($badtags, '', $text));
		// strip out caption tags
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
		$id = get_the_id();
		// first try to get the article thumbnail image
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail($id) ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), full );
			$imgsrc = $thumbnail[0];
		// if we couldn't find one, check for other images in the article
		} else {
			$imgsrc = get_first_plista_image();
		}

		$content .= plista_query(array(
			'publickey' => $publickey,
			'widgetname' => $widgetname,
			'objectid' => get_the_id(),
			'title' => get_the_title(),
			'text' => $text,
			'url' => get_permalink(),
			'img' => $imgsrc	
		));


		if ($isreclist === false) {
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
					
					return '<!-- plista wp Version 1.0 - PHP Version: '.PHP_VERSION.'-->'.$content.$plistapicads;
				} 
			} 
		}
		
	}
	
	// plista admin
	function plista_admin() {  
		include('plista_integration_admin.php');  
	}
	
	// only allow admin users access to plista settings 
	add_action('admin_menu', 'plista_admin_actions');

	function plista_admin_actions() {
		if( current_user_can('level_10')) {
			add_options_page("plista", "plista", 1, "plista", "plista_admin");
		}

	}
	
?>
