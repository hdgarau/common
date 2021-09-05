<?php


namespace Common\Classes;


class ParsedGroupParenthesis extends ParsedGroup
{
    protected $_openSymbol = '(';
    protected $_closeSymbol = ')';
    protected $_recursive = true;
}