<?php
// cntnd_header_output
$cntnd_module = "cntnd_header";

// assert framework initialization
defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// editmode
$editmode = cRegistry::isBackendEditMode();

// includes
cInclude('module', 'includes/class.cntnd_header.php');
if ($editmode) {
    cInclude('module', 'includes/style.cntnd_header.php');
}

// input/vars
$headline = (int)"CMS_VALUE[1]";
if ($headline < 1 or $headline > 6) {
    $headline = 1;
}
$show_anchor = (bool)"CMS_VALUE[2]";
$index = (int)"CMS_VALUE[3]";
if ($index < 1) {
    $index = 1;
}

// other vars
$typeGen = new \cTypeGenerator();
$header = stripslashes($typeGen->getGeneratedCmsTag("CMS_HTMLHEAD", $index));
$clean_header = str_replace('&nbsp;', ' ', $header);
$clean_header = strip_tags($clean_header);
$clean_header = trim($clean_header);

$anchor = "";
$anchor_label = "";
if ($show_anchor) {
    $anchor = \Cntnd\Header\CntndHeader::anchor($header);
    $anchor_label = ' - ' . mi18n("ANCHOR") . ': ' . $anchor;
}

// module
if ($editmode) {
    echo '<span class="module_box"><label class="module_label">' . mi18n("MODULE") . ' ' . $headline . $anchor_label . '</label></span>';
} else {
    $header = $clean_header;
}

$tpl = cSmartyFrontend::getInstance();
$tpl->assign('anchor', $anchor);
$tpl->assign('headline', $headline);
$tpl->assign('header', $header);
$tpl->display('default.html');
?>
