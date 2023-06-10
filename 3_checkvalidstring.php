<?php
function getCapitalandSmallLetter( )
{
    $letter=[];
    $small = range('a', 'n');
    foreach( range('A', 'N') as $index=> $elements) {
    	 $letter[$small[$index]] = $elements;
    }
    return $letter;
}

function checkValidString( $str )
{
    $letters = getCapitalandSmallLetter();
    $extra_characters=0;
    for( $i=0; $i<strlen($str);$i++ )
    {
        foreach ( $letters as $index => $letter )
        {
            if(  $str[$i] == $index || $str[$i] == $letter )
            {
                $extra_characters++;
            }
        }
    }
    return ( strlen($str) - $extra_characters);
}
echo checkValidString( 'aaabdbnhaikjjm' )."<br>";
echo checkValidString( 'abaxbdbbyyhwawiwjjjwem' );
