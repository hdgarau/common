<?php


namespace Common\Classes;


class ParsedGroupCustom extends ParsedGroup
{
    public function __construct( string $openSymbol, string $closeSymbol, bool $_recursive = true, $level = 0)
    {
        $this->_openSymbol = $openSymbol;
        $this->_closeSymbol = $closeSymbol;
        $this->_recursive = $_recursive;
        $this->_level = $level;
    }
}