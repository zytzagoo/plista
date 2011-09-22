<?php header("Content-type: text/css");?>
.plistaHl,
.plistaWidgetHead {
	color: <?php print $_GET['hlcolor']; ?> !important;
	background-color: <?php print $_GET['hlbgcolor']; ?> !important;
}

.plistaItem img {
	width: <?php print $_GET['imgsize']; ?> !important;
	max-height: <?php print $_GET['imgheight']; ?> !important;
}

.itemTitle {
	color: <?php print $_GET['ttlcolor']; ?> !important;
	font-size:  <?php print $_GET['ttlsize']; ?> !important
}

.itemText {
	color: <?php print $_GET['txtcolor']; ?> !important;
	font-size: <?php print $_GET['txtsize']; ?> !important
}

.itemMore {color: <?php print $_GET['txtcolor']; ?> !important;}

.plistaWidgetList a:hover,
.plistaWidgetList a:active,
.plistaWidgetList a:focus{background-color:  <?php print $_GET['txthover']; ?> !important}
