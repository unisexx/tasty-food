<?php
if (!function_exists('get_first_paragraph')) {
    function get_first_paragraph($text)
    {
        $p = substr($text, strpos($text, "<p"), strpos($text, "</p>") + 4);
        return $p;
    }
}
