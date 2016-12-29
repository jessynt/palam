<?php

if (!function_exists('strip_all_tags')) {
    /**
     * @param string $string String containing HTML tags
     * @param bool $remove_breaks Optional. Whether to remove left over line breaks and white space chars
     *
     * @return string The processed string
     */
    function strip_all_tags($string, $remove_breaks = false)
    {
        $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
        $string = strip_tags($string);

        if ($remove_breaks) {
            $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
        }

        return trim($string);
    }
}
if (!function_exists('excerpt_more')) {
    /**
     * @param string $string
     *
     * @return string
     */
    function excerpt_more($string)
    {
        if (preg_match('/<!--more-->/', $string, $matches)) {
            return explode('<!--more-->', $string)[0];
        }

        return null;
    }
}