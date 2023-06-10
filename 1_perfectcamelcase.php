<?php

// Get capital and small letters;
function getCapitalandSmallLetter( )
{
    $letter=[];
    $small = range('a', 'z');
    foreach( range('A', 'Z') as $index=> $elements) {
    	 $letter[$small[$index]] = $elements;
    }
    return $letter;
}


// get lower case string for perfect camelCase;
function converttoLowerCase($str)
{
    $strings='';
    for( $i=0; $i < strlen($str);$i++  )
    {
        $strings .= checkString( $str[$i] );
    }
    return $strings;
}

// string condition for lower case;
function checkString( $str )
{
    $letters = getCapitalandSmallLetter();
    foreach ( $letters as $index => $letter )
    {
        if(  $str == $index || $str == $letter )
        {
            return $index;
        }
    }
    return $str;
    
}

// Break into string;
function breakStringToArray( $str, $delimiter ) {
    $lower_string = converttoLowerCase($str);
    $array = [];
    $current = '';
    for ( $i = 0; $i < strlen($lower_string); $i++ ) {
        if ($lower_string[$i] == $delimiter) {
            $array[] = $current;
            $current = '';
        } else {
            $current .= $lower_string[$i];
        }
    }
    $array[] = $current;

    return $array;
}


function camelCase($str, $delimeter)
{
    $str_arrays = breakStringToArray($str,$delimeter);
    $camel_case_string = "";
    $capital_letters = getCapitalandSmallLetter();
    foreach ($str_arrays as $in=> $str_array)
    {
    
        foreach ( $capital_letters as $index => $capital_letter )
        {
            // echo $str_array."<BR>";
            if( strlen($str_array)>0 &&  $str_array[0]==$index )
            {
                $str_array[0]=$capital_letter;
            }
        }
        $camel_case_string.= $str_array; 
    }
    return $camel_case_string;
}

// First test case: If there are strings with any delemeter
echo camelCase("simple-camel-case","-");
// First test case: If there are strings with upper case also, then convert it in lower case and then camelCase
echo PHP_EOL."<br>".camelCase("MULTIPLE_string_CAMEL_CaSe","_");
// First test case: If there is double or multiple delemeter then find perfect camelCase string;
echo PHP_EOL."<br>".camelCase("MULTIPLE_delemter_CAMEL___CaSe","_");
