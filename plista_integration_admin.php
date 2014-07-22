<?php
$plistachange = isset($_POST['plista_hidden']) ? $_POST['plista_hidden'] : '';
if($plistachange == 'P') {

	$categories = isset($_POST['plista_categories']) ? $_POST['plista_categories'] : '';
	update_option('plista_categories', $categories);

	$tags = isset($_POST['plista_tags']) ? $_POST['plista_tags'] : '';
	update_option('plista_tags', $tags);

	$mobile_categories = isset($_POST['plista_mobile_categories']) ? $_POST['plista_mobile_categories'] : '';
	update_option('plista_mobile_categories', $mobile_categories);

	$widgetname = isset($_POST['plista_widgetname']) ? $_POST['plista_widgetname'] : '';
	update_option('plista_widgetname', $widgetname);

	$jspath = isset($_POST['plista_jspath']) ? $_POST['plista_jspath'] : '';
	update_option('plista_jspath', $jspath);

	$autoinsert = isset($_POST['plista_autoinsert']) ? $_POST['plista_autoinsert'] : '';
	update_option('plista_autoinsert', $autoinsert);
	if (get_option('plista_autoinsert')) {
			$autoinsert = 'checked="checked"';
			update_option('plista_autoinsert', $autoinsert);
	} else {
			$autoinsert = '';
	}

	$defaultimg = isset($_POST['plista_defaultimg']) ? $_POST['plista_defaultimg'] : '';
	update_option('plista_defaultimg', $defaultimg);

	$editcss = isset($_POST['plista_editcss']) ? $_POST['plista_editcss'] : '';
	update_option('plista_editcss', $editcss);
	if (get_option('plista_editcss')) {
		$editcss = 'checked="checked"';
		update_option('plista_editcss', $editcss);
	} else {
		$editcss = '';
	}

	$mobile_editcss = isset($_POST['plista_mobile_editcss']) ? $_POST['plista_mobile_editcss'] : '';
	update_option('plista_mobile_editcss', $mobile_editcss);
	if (get_option('plista_mobile_editcss')) {
		$mobile_editcss = 'checked="checked"';
		update_option('plista_mobile_editcss', $mobile_editcss);
	} else {
		$mobile_editcss = '';
	}

	$setpicads = isset($_POST['plista_setpicads']) ? $_POST['plista_setpicads'] : '';
	update_option('plista_setpicads', $setpicads);
	if (get_option('plista_setpicads')) {
		$setpicads = 'checked="checked"';
		update_option('plista_setpicads', $setpicads);
	} else {
		$setpicads = '';
	}

	$setblacklist = isset($_POST['plista_setblacklist']) ? $_POST['plista_setblacklist'] : '';
	update_option('plista_setblacklist', $setblacklist);
	if (get_option('plista_setblacklist')) {
		$setblacklist = 'checked="checked"';
		update_option('plista_setblacklist', $setblacklist);
	} else {
		$setblacklist = '';
	}

	$hlsize = $_POST['plista_hlsize'];
    update_option('plista_hlsize', $hlsize);

	$hlcolor = $_POST['plista_hlcolor'];
    update_option('plista_hlcolor', $hlcolor);

	$hlbgcolor = $_POST['plista_hlbgcolor'];
    update_option('plista_hlbgcolor', $hlbgcolor);

	$imgsize = $_POST['plista_imgsize'];
    update_option('plista_imgsize', $imgsize);

	$imgheight = $_POST['plista_imgheight'];
    update_option('plista_imgheight', $imgheight);

	$ttlcolor = $_POST['plista_ttlcolor'];
    update_option('plista_ttlcolor', $ttlcolor);

	$ttlsize = $_POST['plista_ttlsize'];
    update_option('plista_ttlsize', $ttlsize);

	$txtcolor = $_POST['plista_txtcolor'];
    update_option('plista_txtcolor', $txtcolor);

	$txtsize = $_POST['plista_txtsize'];
    update_option('plista_txtsize', $txtsize);

	$txthover = $_POST['plista_txthover'];
    update_option('plista_txthover', $txthover);

	$mobile_hlsize = $_POST['plista_mobile_hlsize'];
    update_option('plista_mobile_hlsize', $mobile_hlsize);

	$mobile_hlcolor = $_POST['plista_mobile_hlcolor'];
    update_option('plista_mobile_hlcolor', $mobile_hlcolor);

	$mobile_hlbgcolor = $_POST['plista_mobile_hlbgcolor'];
    update_option('plista_mobile_hlbgcolor', $mobile_hlbgcolor);

	$mobile_imgsize = $_POST['plista_mobile_imgsize'];
    update_option('plista_mobile_imgsize', $mobile_imgsize);

	$mobile_imgheight = $_POST['plista_mobile_imgheight'];
    update_option('plista_mobile_imgheight', $mobile_imgheight);

	$mobile_ttlcolor = $_POST['plista_mobile_ttlcolor'];
    update_option('plista_mobile_ttlcolor', $mobile_ttlcolor);

	$mobile_ttlsize = $_POST['plista_mobile_ttlsize'];
    update_option('plista_mobile_ttlsize', $mobile_ttlsize);

	$mobile_txtcolor = $_POST['plista_mobile_txtcolor'];
    update_option('plista_mobile_txtcolor', $mobile_txtcolor);

	$mobile_txtsize = $_POST['plista_mobile_txtsize'];
    update_option('plista_mobile_txtsize', $mobile_txtsize);


	$blacklistpicads = isset($_POST['plista_blacklistpicads']) ? $_POST['plista_blacklistpicads'] : '';
    update_option('plista_blacklistpicads', $blacklistpicads);

	$blacklistrecads = isset($_POST['plista_blacklistrecads']) ? $_POST['plista_blacklistrecads'] : '';
    update_option('plista_blacklistrecads', $blacklistrecads);

?>
	<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php

} else {
	//Show choosen options
	$widgetname = get_option('plista_widgetname');
	$jspath = get_option('plista_jspath');
	$autoinsert = get_option('plista_autoinsert');
	$defaultimg = get_option('plista_defaultimg');
	$editcss = get_option('plista_editcss');
	$setpicads = get_option('plista_setpicads');
	$setblacklist = get_option('plista_setblacklist');

	$hlsize = get_option('plista_hlsize');
	$hlcolor = get_option('plista_hlcolor');
	$hlbgcolor = get_option('plista_hlbgcolor');
	$imgsize = get_option('plista_imgsize');
	$imgheight = get_option('plista_imgheight');
	$ttlcolor = get_option('plista_ttlcolor');
	$ttlsize = get_option('plista_ttlsize');
	$txtcolor = get_option('plista_txtcolor');
	$txtsize = get_option('plista_txtsize');
	$txthover = get_option('plista_txthover');

	$mobile_editcss = get_option('plista_mobile_editcss');
	$mobile_hlsize = get_option('plista_mobile_hlsize');
	$mobile_hlcolor = get_option('plista_mobile_hlcolor');
	$mobile_hlbgcolor = get_option('plista_mobile_hlbgcolor');
	$mobile_imgsize = get_option('plista_mobile_imgsize');
	$mobile_imgheight = get_option('plista_mobile_imgheight');
	$mobile_ttlcolor = get_option('plista_mobile_ttlcolor');
	$mobile_ttlsize = get_option('plista_mobile_ttlsize');
	$mobile_txtcolor = get_option('plista_mobile_txtcolor');
	$mobile_txtsize = get_option('plista_mobile_txtsize');

	$domainid = get_option('plista_domainid');
	$blacklistpicads = get_option('plista_blacklistpicads');
	$blacklistrecads = get_option('plista_blacklistrecads');
	$categories = get_option('plista_categories');
	$tags = get_option('plista_tags');
	$mobile_categories = get_option('plista_mobile_categories');
}
?>

<div class="wrap plistawrapper">

	<h2><img src="<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . '/image/logo.png'; ?>" alt="plista logo" /><span>Version <?php echo plista::plista_version(); ?></span></h2>

	<form name="plista_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="plista_hidden" value="P">
		<div class="plistabox">
			<h3><?php _e('Hint', 'plista'); ?></h3>
			<p><?php printf(__('You have to register at %1$s first to get all necessary data.', 'plista'), '<a href="https://www.plista.com/publisher_registrations/domain">plista.com</a>'); ?></p>
			<p><?php printf(__('Please pay attention to the %1$s', 'plista'), '<a target="_blank" href="http://wordpress.org/extend/plugins/plista/installation/">Readme</a>'); ?>. </p>
		</div>

		<div id="plistabasics" class="plistabox">
			<h3><?php _e('Basic settings', 'plista'); ?></h3>
			<p>
				<label class="textlabel" for="plista_widgetname"><? _e('Widgetname', 'plista'); ?> <span class="required">*<?php _e('required', 'plista') ?></span></label>
				<input aria-required="true" required type="text" name="plista_widgetname" value="<?php echo $widgetname; ?>" size="80">
				<span><?php _e('e.g.', 'plista'); ?> plista_widget_standard_1</span>
			</p>

			<p>
				<label class="textlabel" for="plista_jspath"><?php _e('URL', 'plista'); ?> <span class="required">*<?php _e('required', 'plista') ?></span></label>
				<input aria-required="true" required type="text" name="plista_jspath" value="<?php echo $jspath; ?>" size="80">
				<span><?php _e('e.g.', 'plista'); ?> http://static.plista.com/fullplista/46895ab564asdgsagas6546.js</span>
			</p>
		</div>

		<div id="plistaposition" class="plistabox">
			<h3><?php _e('Widget position', 'plista'); ?></h3>
			<p><?php _e('The widget will be shown automatically at the bottom of every article.', 'plista') ?></p>
			<p><?php _e('Only check the option if you want to insert the widget on a different position like the sidebar.', 'plista'); ?>.</p>
			<p><?php printf(__('Please read point 11. of the %1$s before activating self positioning', 'plista'), '<a href="http://wordpress.org/extend/plugins/plista/installation/">Readme</a>'); ?>.</p>
			<p>
				<input type="checkbox" id="plista_autoinsert" name="plista_autoinsert" value="1" <?php echo $autoinsert ?>/>
				<label  for="plista_autoinsert"><?php _e('Yes, I would like to position the widget', 'plista'); ?></label>
			</p>
		</div>

		<div class="plistabox">
			<h3><?php _e('Default image', 'plista'); ?></h3>
			<p><?php _e('Define a default image for articles without an image.', 'plista') ?></p>
			<p>
				<label class="textlabel" for="plista_defaultimg"><?php _e('Default image', 'plista'); ?> <span class="optional">*<?php _e('optional', 'plista') ?></span></label>
				<input type="text" name="plista_defaultimg" value="<?php echo $defaultimg; ?>" size="80">
				<span><?php _e('e.g.', 'plista'); ?> http://www.example.org/default.jpg</span>
			</p>
		</div>

		<div class="plistabox">
			<h3><?php _e('Exclude pages', 'plista'); ?></h3>
			<p>
				<input type="checkbox" id="plista_setblacklist" name="plista_setblacklist" value="1" <?php echo $setblacklist ?>/>
				<label for="plista_setblacklist"><?php _e('Don\'t show the widget on some pages', 'plista'); ?></label>
			</p>

			<p>
				<label class="textlabel" for="plista_blacklistrecads"><?php _e('Exclude the following pages', 'plista'); ?></label>
				<input type="text" name="plista_blacklistrecads" value="<?php echo $blacklistrecads; ?>" size="42">
				<span><?php _e('Insert the Page-Id\'s separated by comma (e.g.: 5, 235, 1340) where the widget should be excluded', 'plista'); ?>.</span>
			</p>
		</div>

		<?php
			$wp_tags = get_tags(array('orderby' => 'count', 'order' => 'DESC'));
			if ($wp_tags) {
		?>
		<div class="plistabox">
			<h3><?php _e('Exclude tags', 'plista'); ?></h3>
			<ul class="plista-categories">
			<?php
			foreach ($wp_tags as $wp_tag) {
			?>
				<li>
					<input type="checkbox" name="plista_tags[]" value="<?= $wp_tag->term_id; ?>" <?php if (is_array($tags) && in_array($wp_tag->term_id,$tags)) echo "checked"; ?>/>
					<label for="plista_tags[]"><?= $wp_tag->name; ?></label>
				</li>

		  	<?php } ?>
			</ul>
			<div class="plistaclear"></div>
		</div>
		<?php } ?>

		<div class="plistabox">
			<h3><?php _e('Exclude categories', 'plista'); ?></h3>
			<ul class="plista-categories">
			<?php
			$wp_categories = get_categories(array('orderby' => 'count', 'order' => 'DESC'));
			foreach ($wp_categories as $wp_category):
			?>
				<li>
					<input type="checkbox" name="plista_categories[]" value="<?= $wp_category->cat_ID; ?>" <?php if (is_array($categories) && in_array($wp_category->cat_ID,$categories)) echo "checked"; ?>/>
					<label for="plista_categories[]"><?= $wp_category->cat_name; ?></label>
				</li>
		  	<?php endforeach; ?>
			</ul>
			<div class="plistaclear"></div>
		</div>

		<div class="plistabox" id="plistadesign">
			<h3 class="plistaclear"><?php _e('plista widget design', 'plista');?></h3>
			<p>
				<input type="checkbox" id="plista_editcss" name="plista_editcss" value="1" <?php echo $editcss ?>/>
				<label for="plista_editcss"><?php _e('I would like to change the widget design', 'plista'); ?></label>
			</p>

			<div id="plistadesignbox">
				<p>
					<label class="textlabel" for="plista_hlsize"><?php _e('Widgetheadline (font-size)', 'plista'); ?></label>
					<input type="text" name="plista_hlsize" value="<?php echo $hlsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 16px</span>
				</p>

				<p>
					<label class="textlabel" for="plista_hlcolor"><?php _e('Widgetheadline (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_hlcolor" value="<?php echo $hlcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #000000</span>
				</p>

				<p>
					<label class="textlabel" for="plista_hlbgcolor"><?php _e('Widgetheadline (background-color)', 'plista'); ?></label>
					<input type="text" name="plista_hlbgcolor" value="<?php echo $hlbgcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #EEEEEE</span>
				</p>

				<p>
					<label class="textlabel" for="plista_imgsize"><?php _e('Images (width)', 'plista'); ?></label>
					<input type="text" name="plista_imgsize" value="<?php echo $imgsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 70px</span>
				</p>

				<p>
					<label class="textlabel" for="plista_imgheight"><?php _e('Images (max-height)', 'plista'); ?></label>
					<input type="text" name="plista_imgheight" value="<?php echo $imgheight; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 70px</span>
				</p>

				<p>
					<label class="textlabel" for="plista_ttlcolor"><?php _e('Article headline (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_ttlcolor" value="<?php echo $ttlcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #000000</span>
				</p>

				<p>
					<label class="textlabel" for="plista_ttlsize"><?php _e('Article headline (font-size)', 'plista'); ?></label>
					<input type="text" name="plista_ttlsize" value="<?php echo $ttlsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 13px</span>
				</p>

				<p>
					<label class="textlabel" for="plista_txtcolor"><?php _e('Text (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_txtcolor" value="<?php echo $txtcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #333333</span>
				</p>

				<p>
					<label class="textlabel" for="plista_txtsize"><?php _e('Text (font-size)', 'plista'); ?>)</label>
					<input type="text" name="plista_txtsize" value="<?php echo $txtsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 12px</span>
				</p>

				<p>
					<label class="textlabel" for="plista_txthover"><?php _e('Mouseover (background-color)', 'plista'); ?></label>
					<input type="text" name="plista_txthover" value="<?php echo $txthover; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #FFFFFF</span>
				</p>
			</div>
		</div>

		<div class="plistabox" id="plistamobiledesign">
			<h3 class="plistaclear"><?php _e('plista widget mobile design for wptouch', 'plista');?></h3>
			<p>
				<input type="checkbox" id="plista_mobile_editcss" name="plista_mobile_editcss" value="1" <?php echo $mobile_editcss ?>/>
				<label for="plista_mobile_editcss"><?php _e('I would like to change the mobile widget design', 'plista'); ?></label>
			</p>

			<div id="plistamobiledesignbox">
				<p>
					<label class="textlabel" for="plista_mobile_hlsize"><?php _e('Widgetheadline (font-size)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_hlsize" value="<?php echo $mobile_hlsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 14px</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_hlcolor"><?php _e('Widgetheadline (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_hlcolor" value="<?php echo $mobile_hlcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #000000</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_hlbgcolor"><?php _e('Widgetheadline (background-color)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_hlbgcolor" value="<?php echo $mobile_hlbgcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #FFFFFF</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_imgsize"><?php _e('Images (width)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_imgsize" value="<?php echo $mobile_imgsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 70px</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_imgheight"><?php _e('Images (max-height)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_imgheight" value="<?php echo $mobile_imgheight; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 70px</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_ttlcolor"><?php _e('Article headline (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_ttlcolor" value="<?php echo $mobile_ttlcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #000000</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_ttlsize"><?php _e('Article headline (font-size)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_ttlsize" value="<?php echo $mobile_ttlsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 13px</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_txtcolor"><?php _e('Text (font-color)', 'plista'); ?></label>
					<input type="text" name="plista_mobile_txtcolor" value="<?php echo $mobile_txtcolor; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> #333333</span>
				</p>
				<p>
					<label class="textlabel" for="plista_mobile_txtsize"><?php _e('Text (font-size)', 'plista'); ?>)</label>
					<input type="text" name="plista_mobile_txtsize" value="<?php echo $mobile_txtsize; ?>" size="12">
					<span><?php _e('e.g.', 'plista'); ?> 12px</span>
				</p>
			</div>
		</div>

		<div id="plistapicads" class="plistabox">
			<h3>plista pictureAds <span class="optional">*<?php _e('optional', 'plista') ?></span></h3>
			<p class="picadinfo" id="plista_picads_info"><?php _e('Did plista prepare pictureAds for this domain? Otherwise feel free to contact the Support-Team.', 'plista'); ?> <br /> <?php printf(__('In order to use pictureAds the article images should at least have the size of 350px. For further information please contact %1$s', 'plista'), '<a href="mailto:wordpress@plista.com">wordpress@plista.com</a>'); ?><span id="plista_picads_info_close"><?php _e('close', 'plista'); ?></span></p>

			<p>
				<input type="checkbox" id="plista_setpicads" name="plista_setpicads" value="1" <?php echo $setpicads ?>/>
				<label for="plista_setpicads"><?php _e('Activate plista pictureAds', 'plista'); ?></label>
			</p>

			<div id="ppicadsadditional">
				<p><?php _e('Exclude categories', 'plista'); ?></p>
				<ul class="plista-categories">
				<?php
				$wp_categories = get_categories();
				foreach ($wp_categories as $wp_category): ?>
					<li>
						<input type="checkbox" name="plista_mobile_categories[]" value="<?= $wp_category->cat_ID; ?>" <?php if (is_array($mobile_categories) && in_array($wp_category->cat_ID,$mobile_categories)) echo "checked"; ?>/>
						<label for="plista_mobile_categories[]"><?= $wp_category->cat_name; ?></label>
					</li>
			  	<?php endforeach; ?>
				</ul>

				<p>
					<label class="textlabel" for="plista_blacklistpicads"><?php _e('Exclude the following pages', 'plista'); ?></label>
					<input type="text" name="plista_blacklistpicads" value="<?php echo $blacklistpicads; ?>" size="42">
					<span><?php _e('Insert the Page-Id\'s separated by comma (e.g.: 2, 89, 520) where pictureAds should be excluded', 'plista'); ?>.</span>
				</p>
				<p><?php _e('For more information about finding the page id please visit', 'plista');?> <a href="http://en.support.wordpress.com/pages/#how-to-find-the-page-id" target="_blank">wordpress.com</a>.</p>
			</div>
		</div>

		<p class="submit">
			<input type="submit" name="Submit" value="Speichern" />
		</p>
	</form>
</div>
