<?php

function parse( $str )
{
    $array=[];
    $equation=0;
    for( $i=0; $i < strlen($str); $i++)
    {
        if( $str[$i]=='m' )
        {
            $equation +=-1;
        }
        elseif( $str[$i]=='p' )
        {
            $equation +=1;
        }
        elseif( $str[$i]=='s' )
        {
            $equation = $equation*$equation;
        }
        if( $str[$i]=='o' )
        {
            $array[]=$equation;
        }
    }
    return $array;
}
print_r(parse( 'ppppsmoso' ));