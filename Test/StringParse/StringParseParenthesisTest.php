<?php
namespace Test\StringParse;

use PHPUnit\Framework\TestCase;

class StringParseParenthesisTest extends TestCase
{
    public function testFailNonClose()
    {
        $this->expectException(\Common\Exceptions\StringParsedException::class);
        \Common\Functions\StringParse::strToParsedGroupParenthesis(' this is a ( Bad Resource');
    }
    public function testFailCloseNotOpened()
    {
        $this->expectException(\Common\Exceptions\StringParsedException::class);
        \Common\Functions\StringParse::strToParsedGroupParenthesis(' this is a ( Bad Resource))');
    }
    public function testNonParenthesis()
    {
        $str = ' this is a and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testSimple()
    {
        $str = ' this is a ( Simple Resource ) and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testBorders()
    {
        $str = '( Simple Resource )';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testTwoLevelsTest()
    {
        $str = ' this is a ( Resource ( more data) something else ) and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testBrothersTest()
    {
        $str = ' this is a ( Simple Resource ) and (his brother) something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testComplexTest()
    {
        $str = '( this is a ( Complex (test) Resource ) and (his (1(2,2b(3)2c)1 ) brother) something)';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParsedGroupParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
}
