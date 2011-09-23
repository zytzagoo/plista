<?php
	if($_POST['plista_hidden'] == 'P') {
		//Form data sent  
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
	}
?>

<div class="wrap">
	<?php  echo "<h2>Ihr plista Widget</h2>"; ?>

	<form name="plista_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="plista_hidden" value="P">
		<h3>plista Grundeinstellungen</h3>
		<h4>Bitte beachten Sie die Hinweise in der <a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">readme.txt</a> und in unserer <a href="http://wiki.plista.com/Publisher/FAQ">Wiki</a>.</h4>
		<h3>plista Grundeinstellungen</h3>
		<p>Sie müssen Sich erst kurz <a href="https://www.plista.com/publisher_registrations/domain">hier</a> für plista registrieren um die erforderlichen Daten zu erhalten.</p>
		<p>
			<label style="width: 230px; display: block; float: left" for="plista_widgetname">Name des Widgets:</label>
			<input type="text" name="plista_widgetname" value="<?php echo $widgetname; ?>" size="80">
			<span>Beispiel: plista_widget_standard_1</span>
		</p>

		<p>
			<label style="width: 230px; display: block; float: left" for="plista_jspath">URL des Widgets:</label>
			<input type="text" name="plista_jspath" value="<?php echo $jspath; ?>" size="80">
			<span>Beispiel: http://static.plista.com/fullplista/46895ab564asdgsagas6546.js</span>
		</p>


		<h3>Platzierung des plista Widgets</h3>
		<p>Das plista Widget wird automatisch in Ihre Webseite eingefügt. Aktivieren Sie diese Funktion nur, falls Sie dies selbst übernehmen möchten. Nähere Hinweise finden Sie in der <a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">readme.txt</a></p>
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_autoinsert" name="plista_autoinsert" value="1" <?php echo $autoinsert ?>/>
			<label  for="plista_autoinsert">Ich möchte das plista Widget selbst platzieren.</label>
			
		</p>

		<h3>Seiten ausschließen</h3>

		<p>Bitte beachten Sie, dass Seiten ausgeschlossen werden müssen bevor die Seite bzw. das Plugin aktiv ist. Um eine Seite nachträglich zu deaktivieren kontaktieren Sie bitte <a href="mailto:wordpress@plista.com">wordpress@plista.com</a></p>
		
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_setblacklist" name="plista_setblacklist" value="1" <?php echo $setblacklist ?>/>
			<label for="plista_setblacklist">Seiten von plista ausschließen</label>
		</p>

		<p>
			<label style="width: 280px; display: block; float: left" for="plista_blacklistrecads">Seiten ausschließen</label>
			<input type="text" name="plista_blacklistrecads" value="<?php echo $blacklistrecads; ?>" size="12">
			<span>Gebe Sie hier die Seiten-ID`s (getrennt durch Kommas zb. 12, 3, 4) ein, bei welchen plista deaktiviert werden soll.</span>
		</p>

		<h3>Design des plista Widgets</h3>

		<p>
			<input style="margin: 4px" type="checkbox" id="plista_editcss" name="plista_editcss" value="1" <?php echo $editcss ?>/>
			<label for="plista_editcss">Ich möchte die Farben und Maße des plista Widgets anpassen.</label>
		</p>

		<div id="plistadesignbox">
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_hlcolor">Titel des Widgets (Schriftfarbe)</label>
				<input type="text" name="plista_hlcolor" value="<?php echo $hlcolor; ?>" size="12">
				<span>z.B. #000000</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_hlbgcolor">Titel des Widgets (Hintergrundfarbe)</label>
				<input type="text" name="plista_hlbgcolor" value="<?php echo $hlbgcolor; ?>" size="12">
				<span>z.B. #000000</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_imgsize">Vorschaubilder (Breite)</label>
				<input type="text" name="plista_imgsize" value="<?php echo $imgsize; ?>" size="12">
				<span>z.B. 70px</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_imgheight">Vorschaubilder (Max. Höhe)</label>
				<input type="text" name="plista_imgheight" value="<?php echo $imgheight; ?>" size="12">
				<span>z.B. 70px</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_ttlcolor">Artikelüberschrift (Schriftfarbe)</label>
				<input type="text" name="plista_ttlcolor" value="<?php echo $ttlcolor; ?>" size="12">
				<span>z.B. #000000</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_ttlsize">Artikelüberschrift (Schriftgröße)</label>
				<input type="text" name="plista_ttlsize" value="<?php echo $ttlsize; ?>" size="12">
				<span>z.B. 13px</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txtcolor">Text (Schriftfarbe)</label>
				<input type="text" name="plista_txtcolor" value="<?php echo $txtcolor; ?>" size="12">
				<span>z.B. #333333</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txtsize">Text (Schriftgröße)</label>
				<input type="text" name="plista_txtsize" value="<?php echo $txtsize; ?>" size="12">
				<span>z.B. 12px</span>
			</p>

			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txthover">MouseOver-Effekt (Hintergrundfarbe)</label>
				<input type="text" name="plista_txthover" value="<?php echo $txthover; ?>" size="12">
				<span>z.B. #FFFFFF</span>
			</p>
		</div>

		<h3>plista pictureAds</h3>
		<p>Um pictureAds nutzen zu können müssen die Artikelbilder mindestens 350px brei sein, kontaktieren Sie uns hierzu bitte unter <a href="mailto:wordpress@plista.com">wordpress@plista.com</a></p>

		<p>
			<input style="margin: 4px" type="checkbox" id="plista_setpicads" name="plista_setpicads" value="1" <?php echo $setpicads ?>/>
			<label for="plista_setpicads">plista pictureAds aktivieren.</label>
		</p>

		<p>
			<label style="width: 280px; display: block; float: left" for="plista_blacklistpicads">Seiten ausschließen</label>
			<input type="text" name="plista_blacklistpicads" value="<?php echo $blacklistpicads; ?>" size="12">
			<span>Gebe Sie hier die Seiten-ID`s (getrennt durch Kommas zb. 12, 3, 4) ein, bei welchen PictureAds deaktiviert werden sollen.</span>
		</p>
		<p>Nähere Informationen wie Sie die Seiten-ID finden gibt es <a href="http://en.support.wordpress.com/pages/#how-to-find-the-page-id" target="_blank">hier</a></p>

		<p class="submit">
			<input type="submit" name="Submit" value="Speichern" />
		</p>
	</form>

	<h3 id="updateplista">Löschen / Updaten eines Artikels</h3>
	<p>Hierfür steht eine API zu Verfügung, welche es erlaubt einzelne Artikel zu löschen bzw. zu updaten. Kontaktieren Sie hierzu bitte unseren Publisher Support <a href="mailto:publisher@plista.com">publisher@plista.com</a></p>

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
