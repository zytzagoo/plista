<?php
	if($_POST['plista_hidden'] == 'P') {

		$categories = $_POST['plista_categories'];
		update_option('plista_categories', $categories);

		$widgetname = $_POST['plista_widgetname'];
		update_option('plista_widgetname', $widgetname); 

		$jspath = $_POST['plista_jspath'];  
		update_option('plista_jspath', $jspath); 

		$autoinsert = $_POST['plista_autoinsert'];
		update_option('plista_autoinsert', $autoinsert);
		if (get_option('plista_autoinsert')) {
				$autoinsert = 'checked="checked"';
				update_option('plista_autoinsert', $autoinsert);
		} else {
				$autoinsert = '';
		}
		
		$editcss = $_POST['plista_editcss'];
		update_option('plista_editcss', $editcss);
		if (get_option('plista_editcss')) {
			$editcss = 'checked="checked"';
			update_option('plista_editcss', $editcss);
		} else {
			$editcss = '';
		}

		$setpicads = $_POST['plista_setpicads'];
		update_option('plista_setpicads', $setpicads);
		if (get_option('plista_setpicads')) {
			$setpicads = 'checked="checked"';
			update_option('plista_setpicads', $setpicads);
		} else {
			$setpicads = '';
		}

		$setblacklist = $_POST['plista_setblacklist'];
		update_option('plista_setblacklist', $setblacklist);
		if (get_option('plista_setblacklist')) {
			$setblacklist = 'checked="checked"';
			update_option('plista_setblacklist', $setblacklist);
		} else {
			$setblacklist = '';
		}

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

		$domainid = $_POST['plista_domainid'];
        update_option('plista_domainid', $domainid);

		$blacklistpicads = $_POST['plista_blacklistpicads'];
        update_option('plista_blacklistpicads', $blacklistpicads);

		$blacklistrecads = $_POST['plista_blacklistrecads'];
        update_option('plista_blacklistrecads', $blacklistrecads);

?>

<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

<?php
	} else {  
		//Show choosen options
		$widgetname = get_option('plista_widgetname');
		$jspath = get_option('plista_jspath'); 	
		$autoinsert = get_option('plista_autoinsert');
		$editcss = get_option('plista_editcss'); 
		$setpicads = get_option('plista_setpicads');
		$setblacklist = get_option('plista_setblacklist');
		$hlcolor = get_option('plista_hlcolor'); 
		$hlbgcolor = get_option('plista_hlbgcolor');
		$imgsize = get_option('plista_imgsize'); 
		$imgheight = get_option('plista_imgheight');
		$ttlcolor = get_option('plista_ttlcolor');	
		$ttlsize = get_option('plista_ttlsize');	
		$txtcolor = get_option('plista_txtcolor');
		$txtsize = get_option('plista_txtsize');
		$txthover = get_option('plista_txthover');
		$domainid = get_option('plista_domainid');
		$blacklistpicads = get_option('plista_blacklistpicads');
		$blacklistrecads = get_option('plista_blacklistrecads');
		$categories = get_option('plista_categories');
		
	}
?>

<div class="wrap plistawrapper">
	<h2><?php _e('Your plista widget', 'plista'); ?></h2>

	<form name="plista_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="plista_hidden" value="P">
		<h3><?php _e('plista settings', 'plista'); ?></h3>
		<h4><?php printf(__('Please pay attention to the %1$s', 'plista'), '<a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">Readme</a>'); ?>. </h4>
		<h3><?php _e('plista basic settings', 'plista'); ?></h3>
		<p><?php printf(__('Please register at %1$s first to get all necessary data.', 'plista'), '<a href="https://www.plista.com/publisher_registrations/domain">plista.com</a>'); ?></p>
		<p>
			<label class="textlabel" for="plista_widgetname"><? _e('Widgetname', 'plista'); ?></label>
			<input type="text" name="plista_widgetname" value="<?php echo $widgetname; ?>" size="80">
			<span><?php _e('For example', 'plista'); ?> plista_widget_standard_1</span>
		</p>

		<p>
			<label class="textlabel" for="plista_jspath"><?php _e('URL', 'plista'); ?></label>
			<input type="text" name="plista_jspath" value="<?php echo $jspath; ?>" size="80">
			<span><?php _e('For example', 'plista'); ?> http://static.plista.com/fullplista/46895ab564asdgsagas6546.js</span>
		</p>


		<h3><?php _e('Widget position', 'plista'); ?></h3>
		<p><?php printf(__('The widget will be shown automatically at the bottom of every article. Only check the option if you want to insert the widget on a different position like the sidebar. You will find more information in the %1$s', 'plista'), '<a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">Readme</a>'); ?>.</p>
		<p>
			<input type="checkbox" id="plista_autoinsert" name="plista_autoinsert" value="1" <?php echo $autoinsert ?>/>
			<label  for="plista_autoinsert"><?php _e('I would like to position the widget', 'plista'); ?></label>
			
		</p>

		<h3><?php _e('Exclude pages', 'plista'); ?></h3>
		
		<p>
			<input type="checkbox" id="plista_setblacklist" name="plista_setblacklist" value="1" <?php echo $setblacklist ?>/>
			<label for="plista_setblacklist"><?php _e('Don\'t show the widget on some pages', 'plista'); ?></label>
		</p>

		<p>
			<label class="textlabel" for="plista_blacklistrecads"><?php _e('Exclude the following pages', 'plista'); ?></label>
			<input type="text" name="plista_blacklistrecads" value="<?php echo $blacklistrecads; ?>" size="12">
			<span><?php _e('Insert the Page-Id\'s separated by comma (for example: 5, 235, 1340) where the widget should be excluded', 'plista'); ?>.</span>
		</p>

		<h3><?php _e('Exclude categories', 'plista'); ?></h3>
		<ul class="plista_categories">
		<?php 
		$wp_categories = get_categories();
		foreach ($wp_categories as $wp_category): ?>
			<li>
				<input type="checkbox" name="plista_categories[]" value="<?= $wp_category->cat_ID; ?>" <?php if (is_array($categories) && in_array($wp_category->cat_ID,$categories)) echo "checked"; ?>/>
				<label for="plista_categories[]"><?= $wp_category->cat_name; ?></label>
			</li>
	  	<?php endforeach; ?>
		</ul>
		<h3 class="plistaclear"><?php _e('plista widget design', 'plista');?></h3>

		<p>
			<input type="checkbox" id="plista_editcss" name="plista_editcss" value="1" <?php echo $editcss ?>/>
			<label for="plista_editcss"><?php _e('I would like to change the widget design', 'plista'); ?></label>
		</p>

		<div id="plistadesignbox">
			<p>
				<label class="textlabel" for="plista_hlcolor"><?php _e('Widgetheadline (font-color)', 'plista'); ?></label>
				<input type="text" name="plista_hlcolor" value="<?php echo $hlcolor; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> #000000</span>
			</p>

			<p>
				<label class="textlabel" for="plista_hlbgcolor"><?php _e('Widgetheadline (background-color)', 'plista'); ?></label>
				<input type="text" name="plista_hlbgcolor" value="<?php echo $hlbgcolor; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> #000000</span>
			</p>

			<p>
				<label class="textlabel" for="plista_imgsize"><?php _e('Images (width)', 'plista'); ?></label>
				<input type="text" name="plista_imgsize" value="<?php echo $imgsize; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> 70px</span>
			</p>

			<p>
				<label class="textlabel" for="plista_imgheight"><?php _e('Images (max-height)', 'plista'); ?></label>
				<input type="text" name="plista_imgheight" value="<?php echo $imgheight; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> 70px</span>
			</p>

			<p>
				<label class="textlabel" for="plista_ttlcolor"><?php _e('Article headline (font-color)', 'plista'); ?></label>
				<input type="text" name="plista_ttlcolor" value="<?php echo $ttlcolor; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> #000000</span>
			</p>

			<p>
				<label class="textlabel" for="plista_ttlsize"><?php _e('Article headline (font-size)', 'plista'); ?></label>
				<input type="text" name="plista_ttlsize" value="<?php echo $ttlsize; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> 13px</span>
			</p>

			<p>
				<label class="textlabel" for="plista_txtcolor"><?php _e('Text (font-color)', 'plista'); ?></label>
				<input type="text" name="plista_txtcolor" value="<?php echo $txtcolor; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> #333333</span>
			</p>

			<p>
				<label class="textlabel" for="plista_txtsize"><?php _e('Text (font-size)', 'plista'); ?>)</label>
				<input type="text" name="plista_txtsize" value="<?php echo $txtsize; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> 12px</span>
			</p>

			<p>
				<label class="textlabel" for="plista_txthover"><?php _e('Mouseover (background-color)', 'plista'); ?></label>
				<input type="text" name="plista_txthover" value="<?php echo $txthover; ?>" size="12">
				<span><?php _e('For example', 'plista'); ?> #FFFFFF</span>
			</p>
		</div>

		<h3>plista pictureAds</h3>
		<p><?php printf(__('In order to use pictureAds the article images should at least have the size of 350px. For further information please contact %1$s', 'plista'), '<a href="mailto:wordpress@plista.com">wordpress@plista.com</a>'); ?></p>

		<p>
			<input type="checkbox" id="plista_setpicads" name="plista_setpicads" value="1" <?php echo $setpicads ?>/>
			<label for="plista_setpicads"><?php _e('Activate plista pictureAds', 'plista'); ?></label>
		</p>

		<p>
			<label class="textlabel" for="plista_blacklistpicads"><?php _e('Exclude the following pages', 'plista'); ?></label>
			<input type="text" name="plista_blacklistpicads" value="<?php echo $blacklistpicads; ?>" size="12">
			<span><?php _e('Insert the Page-Id\'s separated by comma (for example: 2, 89, 520) where pictureAds should be excluded', 'plista'); ?>.</span>
		</p>
		<p><?php _e('For more information about finding the page id please visit', 'plista');?> <a href="http://en.support.wordpress.com/pages/#how-to-find-the-page-id" target="_blank">wordpress.com</a>.</p>

		<p class="submit">
			<input type="submit" name="Submit" value="Speichern" />
		</p>
	</form>

</div>
<script>
var pdesign = document.getElementById('plistadesignbox'),
pcheckdesign = document.getElementById('plista_editcss');
pdesign.style.display = 'none';
if (pcheckdesign.checked == '1') {
	pdesign.style.display = 'block';
}
pcheckdesign.onchange = function () {
	if (pcheckdesign.checked == '1') {
		pdesign.style.display = 'block';
	} else {
		pdesign.style.display = 'none';
	}
}
</script>
