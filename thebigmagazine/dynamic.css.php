<?php
header('Content-type: text/css');

require '/../../../wp-load.php'; // load wordpress bootstrap, this is what I don't like
global $data;
// and from here on generate the css file and having access to the
// functions provided by wordpress
?>

body { background: <?php echo $data['color_bg'] ?> !important; }
a { color: <?php echo $data['color_link'] ?>}
a:hover { color: <?php echo $data['color_hover_link'] ?>; }
#branding h1.branding.custom-logo  {background: transparent url("<?php echo $data['logo'] ?>") no-repeat top center;}
aside#sidebar .widget-title,header#page-header,
nav#page-navigation ul.nav li a:hover,
.search-section .searchform input, .search-section .searchform button,
aside#single-sidebar .widget.widget_recent_entries ul li a:hover { background: <?php echo $data['color_main'] ?> }
.news-wrapper {	border-top: 8px solid <?php echo $data['color_main'] ?> }
.section-heading {color: <?php echo $data['color_main'] ?> ;}
nav#page-navigation {background: <?php echo $data['color_menu_bg'] ?>}