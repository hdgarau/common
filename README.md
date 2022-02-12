# common

## Description

Library with basics Classes.

## Index

1. Date
2. Parse
3. Functions

## 1. Date

### Period

#### Description 

Is a class with static methods. The one return a date (type \Datetime) from a date and period indicated.<br>
Some options are:
- days
- weeks
- months
- years
- weekBegin (first previous Monday)
- weekDay (first previous [day])
- monthLastDay
- getByCode (ConstantClassCode + ' ' + param)

#### Examples

<pre><code>Period::days(-3)->format('Y-m-d')); //three days ago
Period::setDefault('1985-02-15');
Period::getByCode('D 5')->format('Y-m-d'); //1985-02-20
</code></pre>

#### Parse

#### Description

Parse a string to object by a token in Entities. Each entity has a property level.
that indicates if it is contained for the previous one or a child has finished.
For example if we parse de parenthesis for "That is a test (just a simple (very) test) to do":
- EntityGroup (level:0) - entities:
  - Entity (content:"That is a test")
  - EntityGroup (level:1) - entities:
    - Entity (content:"just a simple")
    - EntityGroup: (level:2) - entities: 
      - Entity: (content:"very") 
    - Entity: (content:"test") 
  - Entity: (content:"to do") 

You can return to build the original string with casting (string)

#### Example

<pre><code>        $str = '( this is a ( Complex (test) Resource ) and (his (1(2,2b(3)2c)1 ) brother) something)';
        $oParsedParenthesis = StringParse::strToParsedGroupParenthesis($str );
        print_r($oParsedParenthesis); //print object
        echo (string) $oParsedParenthesis; // reverse to string
</code></pre>