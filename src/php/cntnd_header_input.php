?><?php
// cntnd_header_input
$cntnd_module = "cntnd_header";

// includes
cInclude('module', 'includes/class.cntnd_header.php');
cInclude('module', 'includes/script.cntnd_header.php');
cInclude('module', 'includes/style.cntnd_header.php');

// input/vars
$headline = (int)"CMS_VALUE[1]";
if ($headline<1 OR $headline>6) {
    $headline=1;
}
$show_anchor = (bool)"CMS_VALUE[2]";
$index = (int) "CMS_VALUE[3]";
if ($index<1) {
    $index=1;
}

// other vars
$uuid = rand();

?>
<div class="form-vertical">
    <div data-uuid="<?= $uuid ?>" class="index_error cntnd_alert cntnd_alert-danger"><?= mi18n("INDEX_ERROR") ?></div>
    <div class="form-group">
        <label for="headline_<?= $uuid ?>"><?= mi18n("MODULE") ?></label>
        <select name="CMS_VAR[1]" id="headline_<?= $uuid ?>" size="1">
            <option value="false"><?= mi18n("SELECT_CHOOSE") ?></option>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                $selected = "";
                if ($headline == $i) {
                    $selected = 'selected="selected"';
                }
                echo '<option value="' . $i . '" ' . $selected . '>' . mi18n("MODULE") . ' ' . $i . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-check form-check-inline">
        <input id="anchor_<?= $uuid ?>" class="form-check-input" type="checkbox" name="CMS_VAR[2]" value="true" <?php if ($show_anchor) { echo 'checked'; } ?> />
        <label for="anchor_<?= $uuid ?>"><?= mi18n("ANCHOR") ?></label>
    </div>

    <div class="form-group">
        <label for="index_<?= $uuid ?>"><?= mi18n("INDEX") ?></label>
        <input data-uuid="<?= $uuid ?>" class="cntnd_header-index" id="index_<?= $uuid ?>" name="CMS_VAR[3]" type="number" value="<?= $index ?>"/>
        <small><?= mi18n("INDEX_INFO") ?></small>
    </div>

</div>
<?php
