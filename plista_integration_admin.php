<?php  
   	 if($_POST['plista_hidden'] == 'P') {  

		/* set data */ 
		$options = array(
			'widgetname' => $_POST['plista_widgetname'],
			'publickey' => $_POST['plista_publickey'],
			'autoinsert' => $_POST['plista_autoinsert'],
			'editcss' => $_POST['plista_editcss'],
			'setpicads' => $_POST['plista_setpicads'],
			'setblacklist' => $_POST['plista_setblacklist'],
			'hlcolor' => $_POST['plista_hlcolor'],
			'hlbgcolor' => $_POST['plista_hlbgcolor'],
			'imgsize' => $_POST['plista_imgsize'],
			'imgheight' => $_POST['plista_imgheight'],
			'ttlcolor' => $_POST['plista_ttlcolor'],
			'ttlsize' => $_POST['plista_ttlsize'],
			'txtcolor' => $_POST['plista_txtcolor'],
			'txtsize' => $_POST['plista_txtsize'],
			'txthover' => $_POST['plista_txthover'],
			'blacklistpicads' => $_POST['plista_blacklistpicads'],
			'blacklistrecads' => $_POST['plista_blacklistrecads']
		);

		foreach ($options as $key => $val) {
			$a[$key] = $val;
			update_option('plista_'.$key, $a[$key]);
		}

		if (get_option('plista_autoinsert')) {
			$a['autoinsert'] = 'checked="checked"';
			update_option('plista_autoinsert', $a['autoinsert']);
		} else {
			$a['autoinsert'] = '';
		}	

		if (get_option('plista_editcss')) {
			$a['editcss'] = 'checked="checked"';
			update_option('plista_editcss', $a['editcss']);
		} else {
			$a['editcss'] = '';
		}
	
		if (get_option('plista_setpicads')) {
			$a['setpicads'] = 'checked="checked"';
			update_option('plista_setpicads', $a['setpicads']);
		} else {
			$a['setpicads'] = '';
		}
	
		if (get_option('plista_setblacklist')) {
			$a['setblacklist'] = 'checked="checked"';
			update_option('plista_setblacklist', $a['setblacklist']);
		} else {
			$a['setblacklist'] = '';
		}
		
?>  
        
<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		
<?php
} else {
	/* show options */
	$a['widgetname'] = get_option('plista_widgetname');
	$a['publickey'] = get_option('plista_publickey'); 	
	$a['autoinsert'] = get_option('plista_autoinsert');
	$a['editcss'] = get_option('plista_editcss'); 
	$a['setpicads'] = get_option('plista_setpicads');
	$a['setblacklist'] = get_option('plista_setblacklist');
	$a['hlcolor'] = get_option('plista_hlcolor'); 
	$a['hlbgcolor'] = get_option('plista_hlbgcolor');
	$a['imgsize'] = get_option('plista_imgsize'); 
	$a['imgheight'] = get_option('plista_imgheight');
	$a['ttlcolor'] = get_option('plista_ttlcolor');	
	$a['ttlsize'] = get_option('plista_ttlsize');	
	$a['txtcolor'] = get_option('plista_txtcolor');
	$a['txtsize'] = get_option('plista_txtsize');
	$a['txthover'] = get_option('plista_txthover');
	$a['domainid'] = get_option('plista_domainid');
	$a['blacklistpicads'] = get_option('plista_blacklistpicads');
	$a['blacklistrecads'] = get_option('plista_blacklistrecads');
	
}
?>

<div class="wrap">
	<h2>Ihr plista Widget</h2>

	<form name="plista_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="plista_hidden" value="P">
		<h4>Bitte beachten Sie die Hinweise in der <a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">readme.txt</a> und in unserer <a href="http://wiki.plista.com/Publisher/FAQ">Wiki</a>.</h4>
		<h3>plista Grundeinstellungen</h3>
		<p>Falls Ihnen die folgenden Daten nicht bekannt sind, helfen wir Ihnen gern weiter. Sie erreichen uns per E-Mail unter <a href="mailto:wordpress@plista.com">wordpress@plista.com</a>.</p>
		<p>
			<label style="width: 230px; display: block; float: left" for="plista_widgetname">Name des Widgets:</label>
			<input required type="text" name="plista_widgetname" value="<?php echo $a['widgetname']; ?>" size="50">
			<span>Beispiel: standard_1 oder plista_widget_standard_1</span>
		</p>
		
		<p>
			<label style="width: 230px; display: block; float: left" for="plista_publickey">Path:</label>
			<input required type="text" name="plista_publickey" value="<?php echo $a['publickey']; ?>" size="50">
			<span>Beispiel: http://static.plista.com/fullplista/a76212beafd7d95aa47fd245.js</span>
		</p>	
		
		<h3>Platzierung des plista Widgets</h3>
		<p>Das plista Widget wird automatisch in Ihre Webseite eingefügt. Aktivieren Sie diese Funktion nur, falls Sie dies selbst übernehmen möchten. Nähere Hinweise finden Sie in der <a target="_blank" href="http://www.plista.com/plugins/wordpress/readme.txt">readme.txt</a></p>
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_autoinsert" name="plista_autoinsert" value="1" <?php echo $a['autoinsert'] ?>/>
			<label  for="plista_autoinsert">Ich möchte das plista Widget selbst platzieren.</label>
			
		</p>
		
		<h3>Seiten ausschließen</h3>
		
		<p>Bitte beachten Sie, dass Seiten ausgeschlossen werden müssen bevor die Seite bzw. das Plugin aktiv ist. Um eine Seite nachträglich zu deaktivieren kontaktieren Sie bitte <a href="mailto:wordpress@plista.com">wordpress@plista.com</a></p>
		
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_setblacklist" name="plista_setblacklist" value="1" <?php echo $a['$setblacklist'] ?>/>
			<label for="plista_setblacklist">Seiten von plista ausschließen</label>
		</p>
		
		<p>
			<label style="width: 280px; display: block; float: left" for="plista_blacklistrecads">Seiten ausschließen</label>
			<input type="text" name="plista_blacklistrecads" value="<?php echo $a['blacklistrecads'] ?>" size="12">
			<span>Gebe Sie hier die Seiten-ID`s (getrennt durch Kommas zb. 12, 3, 4) ein, bei welchen plista deaktiviert werden soll.</span>
		</p>
		
		<h3>Design des plista Widgets</h3>
		
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_editcss" name="plista_editcss" value="1" <?php echo $a['editcss'] ?>/>
			<label for="plista_editcss">Ich möchte die Farben und Maße des plista Widgets anpassen.</label>
		</p>
		
		<div id="plistadesignbox">
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_hlcolor">Titel des Widgets (Schriftfarbe)</label>
				<input type="text" name="plista_hlcolor" value="<?php echo $a['hlcolor'] ?>" size="12">
				<span>z.B. #000000</span>
			</p>
		
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_hlbgcolor">Titel des Widgets (Hintergrundfarbe)</label>
				<input type="text" name="plista_hlbgcolor" value="<?php echo $a['hlbgcolor'] ?>" size="12">
				<span>z.B. #000000</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_imgsize">Vorschaubilder (Breite)</label>
				<input type="text" name="plista_imgsize" value="<?php echo $a['imgsize'] ?>" size="12">
				<span>z.B. 70px</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_imgheight">Vorschaubilder (Max. Höhe)</label>
				<input type="text" name="plista_imgheight" value="<?php echo $a['imgheight'] ?>" size="12">
				<span>z.B. 70px</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_ttlcolor">Artikelüberschrift (Schriftfarbe)</label>
				<input type="text" name="plista_ttlcolor" value="<?php echo $a['ttlcolor'] ?>" size="12">
				<span>z.B. #000000</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_ttlsize">Artikelüberschrift (Schriftgröße)</label>
				<input type="text" name="plista_ttlsize" value="<?php echo $a['ttlsize'] ?>" size="12">
				<span>z.B. 13px</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txtcolor">Text (Schriftfarbe)</label>
				<input type="text" name="plista_txtcolor" value="<?php echo $a['txtcolor'] ?>" size="12">
				<span>z.B. #333333</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txtsize">Text (Schriftgröße)</label>
				<input type="text" name="plista_txtsize" value="<?php echo $a['txtsize'] ?>" size="12">
				<span>z.B. 12px</span>
			</p>
			
			<p>
				<label style="width: 280px; display: block; float: left" for="plista_txthover">MouseOver-Effekt (Hintergrundfarbe)</label>
				<input type="text" name="plista_txthover" value="<?php echo $a['txthover'] ?>" size="12">
				<span>z.B. #FFFFFF</span>
			</p>
		</div>
		
		<h3>plista pictureAds</h3>
		<p>Um pictureAds nutzen zu können müssen die Artikelbilder mindestens 350px breit sein, kontaktieren Sie uns hierzu bitte unter <a href="mailto:wordpress@plista.com">wordpress@plista.com</a></p>
		<p>Nähere Informationen zu pictureAds finden Sie <a href="http://www.plista.com/publishers/info/picturead">hier</a>.</p>
		<p>
			<input style="margin: 4px" type="checkbox" id="plista_setpicads" name="plista_setpicads" value="1" <?php echo $a['setpicads'] ?>/>
			<label for="plista_setpicads">plista pictureAds aktivieren.</label>
		</p>
		
		<p>
			<label style="width: 280px; display: block; float: left" for="plista_blacklistpicads">Seiten ausschließen</label>
			<input type="text" name="plista_blacklistpicads" value="<?php echo $a['blacklistpicads'] ?>" size="12">
			<span>Gebe Sie hier die Seiten-ID`s (getrennt durch Kommas zb. 12, 3, 4) ein, bei welchen PictureAds deaktiviert werden sollen.</span>
		</p>
		<p>Nähere Informationen wie Sie die Seiten-ID finden gibt es <a href="http://en.support.wordpress.com/pages/#how-to-find-the-page-id" target="_blank">hier</a></p>
		
		<p class="submit">
			<input type="submit" name="Submit" value="Speichern" />
		</p>
	</form>
	
	<h3 id="updateplista">Löschen / Updaten eines Artikels</h3>
	<p>Hierfür steht eine API zu Verfügung, welche es erlaubt einzelne Artikel zu löschen bzw. zu updaten. Kontaktieren Sie hierzu bitte unseren Publisher Support 		<a href="mailto:publisher@plista.com">publisher@plista.com</a></p>
		
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
