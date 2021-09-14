<?php
namespace Test\Date;

use Common\Classes\Date\Period;
use PHPUnit\Framework\TestCase;

class PeriodTest extends TestCase
{
    public function testSimpleMethods()
    {
        $date = \DateTime::createFromFormat('Y-m-d','1983-02-15');
        self::assertEquals($date,Period::days(3,'1983-02-18'));
        self::assertEquals($date,Period::weeks(1,'1983-02-22'));
        self::assertEquals($date,Period::months(2,\DateTime::createFromFormat('Y-m-d','1983-04-15')));
        Period::setDefault('1985-02-15');
        self::assertEquals($date,Period::years(2));
        self::assertEquals('1985-02-11',Period::weekBegin()->format('Y-m-d'));
        self::assertEquals('1985-01-01',Period::yearFirstDay()->format('Y-m-d'));
        self::assertEquals('1985-12-31',Period::monthLastDay()->format('Y-m-d'));
        self::assertEquals('1985-02-10',Period::getByCode('D 5')->format('Y-m-d'));
    }
}