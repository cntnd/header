<?php

namespace Cntnd\Header;

require_once("class.cntnd_util.php");

/**
 * cntnd_header Class
 */
class CntndHeader extends CntndUtil
{

    public static function anchor($value)
    {
        $clean = str_replace('&nbsp;', ' ', $value);
        $clean = strip_tags($clean);
        $clean = trim($clean);
        return preg_replace('/[\W]/', '', $clean);
    }
}

?>
