<?php
namespace Common\Functions;

use Common\Classes\ParsedGroup;
use Common\Classes\ParsedGroupParenthesis;

abstract class StringParse
{
    static function strToParenthesis ( string $string ) : ParsedGroup
    {
        $o = new ParsedGroupParenthesis;
        return $o->parse($string);
    }
}