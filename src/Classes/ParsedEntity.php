<?php


namespace Common\Classes;


class ParsedEntity
{
    public $content;
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }
}