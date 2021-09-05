<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Report\PHP;

class StringParseTest extends TestCase
{
    public function testParenthesisFailNonClose()
    {
        $this->expectException(\Common\Exceptions\StringParsedException::class);
        \Common\Functions\StringParse::strToParenthesis(' this is a ( Bad Resource');
    }
    public function testParenthesisFailCloseNotOpened()
    {
        $this->expectException(\Common\Exceptions\StringParsedException::class);
        \Common\Functions\StringParse::strToParenthesis(' this is a ( Bad Resource))');
    }
    public function testNonParenthesis()
    {
        $str = ' this is a and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testParenthesisSimple()
    {
        $str = ' this is a ( Simple Resource ) and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testParenthesisBorders()
    {
        $str = ' ( Simple Resource )';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testParenthesisIntoTest()
    {
        $str = ' this is a ( Resource ( more data) something else ) and something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function testParenthesisBrothersTest()
    {
        $str = ' this is a ( Simple Resource ) and (his brother) something';
        $oParsedParenthesis = \Common\Functions\StringParse::strToParenthesis($str );
        self::assertEquals($str,(string) $oParsedParenthesis);
    }
    public function ParenthesisComplexTest()
    {

    }
}
