<?php
namespace App\Services;

use Parsedown;

class Parsedowner
{
    public function toHTML($text)
    {
        $html = Parsedown::instance()->text($text);

        return $html;
    }
}