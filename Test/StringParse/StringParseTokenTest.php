<?php
namespace Test\StringParse;

use Common\Exceptions\StringParsedException;
use Common\Functions\StringParse;
use PHPUnit\Framework\TestCase;

class StringParseTokenTest extends TestCase
{
    public function testFailNonClose()
    {
        $this->expectException(StringParsedException::class);
        StringParse::strToParsedGroupByToken(' this is a # Bad Resource## ss','#');
    }
    public function testSimple()
    {
        $str = ' this is a ~ Simple Resource ~ and something';
        $token = '~';
        $oParsed = StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
    public function testBorders()
    {
        $str = '~ Simple Resource ~';
        $token = '~';
        $oParsed = StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
    public function testComplex()
    {
        $str = ' ~ Simple Resource ~~ Simple Resource ~ ~ Simple Resource ~';
        $token = '~';
        $oParsed = StringParse::strToParsedGroupByToken($str,  $token);
        self::assertEquals($str,$oParsed);
    }
}
