<?php


namespace Common\Classes\Parse;


class ParsedGroupParenthesis extends ParsedGroup
{
    protected $_openSymbol = '(';
    protected $_closeSymbol = ')';
    protected $_recursive = true;
}