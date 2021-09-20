<?php
    namespace Common\Classes\Date;

    abstract class Period
    {
        const DAYS              = 'D';
        const WEEKS             = 'W';
        const MONTHS            = 'M';
        const YEARS             = 'Y';
        const WEEKDAY           = 'DW';
        const FIRST_DAY_MONTH   = 'BM';
        const LAST_DAY_MONTH    = 'EM';
        const FIRST_DAY_YEAR    = 'BY';
        const LAST_DAY_YEAR     = 'EY';

        static private $_date = null;

        private static function _get( $period_code, $date = null, $param = 1)
        {
            if($date === null)
            {
                $date = clone self::getDefault();
            }
            if(is_string($date))
            {
                $date = \DateTime::createFromFormat("Y-m-d", $date);
            }
            if($param == 0)
            {
                return $date;
            }
            switch ($period_code)
            {
                case self::DAYS:
                case self::MONTHS:
                case self::WEEKS:
                case self::YEARS:
                    return $date->sub(new \DateInterval('P' . $param . $period_code));
                case self::WEEKDAY:
                    return $date->modify('+1 day')->modify("last " . $param);
                case self::FIRST_DAY_MONTH:
                    return $date->modify('first day of this month');
                case self::LAST_DAY_MONTH:
                    return $date->modify('last day of this month');
                case self::FIRST_DAY_YEAR:
                    return $date->modify('first day of this year');
                case self::LAST_DAY_YEAR:
                    return $date->modify('last day of this year');
                default: //formato valido strtotime
                    return $date->modify($period_code);
            }
        }
        static function setDefault($date = 'now')
        {
            self::$_date = new \DateTime($date);
        }
        static function getDefault($date = 'now')
        {
            if(self::$_date === null)
            {
                self::setDefault();
            }
            return self::$_date;
        }
        static function days($n, $date = null)
        {
            return self::_get(self::DAYS,$date,$n);
        }
        static function weeks($n, $date = null)
        {
            return self::_get(self::WEEKS,$date,$n);
        }
        static function months($n, $date = null)
        {
            return self::_get(self::MONTHS,$date,$n);
        }
        static function years($n, $date = null)
        {
            return self::_get(self::YEARS,$date,$n);
        }
        static function weekBegin($date = null)
        {
            return self::_get(self::WEEKDAY,$date,'Monday');
        }
        static function weekDay($day,$date = null)
        {
            return self::_get(self::WEEKDAY,$date,$day);
        }
        static function monthFirstDay($date = null)
        {
            return self::_get(self::FIRST_DAY_MONTH,$date);
        }
        static function monthLastDay($date = null)
        {
            return self::_get(self::LAST_DAY_MONTH,$date);
        }
        static function yearFirstDay($date = null)
        {
            return self::_get(self::FIRST_DAY_YEAR,$date);
        }
        static function yearLastDay($date = null)
        {
            return self::_get(self::LAST_DAY_YEAR,$date);
        }
        static function getByCode($code, $date = null)
        {
            if(preg_match('/^([A-Z]+)\\s?(\\d*|[A-Z]+)$/i',$code, $matches))
            {
                list($all, $period_code, $n) = $matches;
                return self::_get($period_code, $date,$n !== '' ? ltrim($n) : 1);
            }
            else
            {
                return self::_get($code,$date);
            }
        }
    }