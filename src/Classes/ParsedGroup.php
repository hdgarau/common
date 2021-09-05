<?php


namespace Common\Classes;

use Common\Exceptions\ParsedGroupConfigException;
use PHPUnit\Runner\Extension\PharLoader;

abstract class ParsedGroup
{
    protected $_recursive = true;
    protected $_openSymbol = '';
    protected $_closeSymbol = '';
    protected $_level = 0;
    protected $_entities = [];


    public function nextEntityGroup(string $string, int &$nextLevel = 0 ) : string
    {
        $cut_start = strpos($string, $this->_openSymbol);
        if($this->_openSymbol == $this->_closeSymbol)
        {
            if($this->_recursive)
            {
                throw new ParsedGroupConfigException(ParsedGroupConfigException::ERROR_RECURSIVE_AND_EQUAL_SIGN);
            }
            else
            {
                $cut_end = strpos($string, $this->_closeSymbol, $cut_start);
            }
        }
        else
        {
            $cut_end = strpos($string, $this->_closeSymbol);
        }
        if ($nextLevel == 0 )
        {
            if($cut_start === false ) // end
            {
                if($cut_end === false )
                {
                    return $string;
                }
                else
                {
                    throw new \Common\Exceptions\StringParsedException;
                }

            }
            $nextLevel++;
            return substr($string,0,$cut_start);
        }
        else //I am into a sublevel
        {
            if($cut_end === false )
            {
                throw new \Common\Exceptions\StringParsedException;
            }
            if($cut_start !== false ) //there are others entities
            {
                if($cut_start > $cut_end || ! $this->_recursive) //First cut (has a brother)
                {
                    $nextLevel--;
                    return substr($string, 0, $cut_end);
                }
                else
                {
                    $nextLevel++;
                    return substr($string, 0, $cut_start);
                }
            }
            else //Not open anymore
            {
                $nextLevel--;
                return substr($string, 0, $cut_end);
            }
        }

    }

    public function addEntity( $entity)
    {
        array_push($this->_entities, $entity );
        return $this;
    }
    public function parse ( string &$string ) : ParsedGroup
    {
        ///to see - bad function
        do
        {
            $level = $this->_level;
            $nextEntities = $this->nextEntityGroup ( $string, $level );
            $this->addEntity(new ParsedEntity($nextEntities));
            $offsetSymbol = $this->_level < $level ? strlen($this->_openSymbol) : strlen($this->_closeSymbol);
            $string = substr($string, strlen($nextEntities) + $offsetSymbol );
            if ($this->_recursive) {
                if ($this->_level < $level) {
                    $object = new ParsedGroupCustom($this->_openSymbol, $this->_closeSymbol, $this->_recursive, $level);
                    $object->parse($string);
                    $this->addEntity($object);
                } else {
                    return $this;
                }
            }
        } while ( !empty ( $string ) );
        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        $str = $this->_level == 0 ? '' : $this->_openSymbol;
        foreach ( $this->_entities as $entity )
        {
            $str .= $entity->__toString();
        }
        $str .= $this->_level == 0 ? '' : $this->_closeSymbol;
        return $str;
    }
}