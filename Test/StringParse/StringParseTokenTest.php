<?php
namespace Test\StringParse;

use Common\Classes\ParsedEntity;
use Common\Classes\ParsedGroupByToken;
use Common\Classes\ParsedGroupCustom;
use PHPUnit\Framework\TestCase;

class StringParseTokenTest extends TestCase
{
    public function testFailNonClose()
    {
        $this->expectException(\Common\Exceptions\StringParsedException::class);
        \Common\Functions\StringParse::strToParsedGroupByToken(' this is a # Bad Resource## ss','#');
    }
    public function testSimple()
    {
        $str = ' this is a ~ Simple Resource ~ and something';
        $token = '~';
        $oParsed = \Common\Functions\StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
    public function testBorders()
    {
        $str = '~ Simple Resource ~';
        $token = '~';
        $oParsed = \Common\Functions\StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
    public function testComplex()
    {
        $str = ' ~ Simple Resource ~~ Simple Resource ~ ~ Simple Resource ~';
        $token = '~';
        $oParsed = \Common\Functions\StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
}
