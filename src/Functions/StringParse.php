<?php
namespace Common\Functions;

use Common\Classes\Parse\ParsedGroup;
use Common\Classes\Parse\ParsedGroupByToken;
use Common\Classes\Parse\ParsedGroupParenthesis;

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