<?php
namespace App\Services;

use Parsedown;

class Parsedowner
{
    public function toHTML($text)
    {
        return Parsedown::instance()
            ->text($text);
    }
}