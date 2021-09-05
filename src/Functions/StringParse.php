<?php
namespace Common\Functions;

use Common\Classes\ParsedGroup;
use Common\Classes\ParsedGroupByToken;
use Common\Classes\ParsedGroupParenthesis;

abstract class StringParse
{
    static function strToParsedGroupParenthesis (string $string ) : ParsedGroup
    {
        $o = new ParsedGroupParenthesis;
        return $o->parse($string);
    }
    static function strToParsedGroupByToken (string $string, string $token) : ParsedGroup
    {
        $o = new ParsedGroupByToken($token);
        return $o->parse($string);
    }
}