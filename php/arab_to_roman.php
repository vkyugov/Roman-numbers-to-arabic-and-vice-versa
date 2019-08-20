<?php
function arab_to_roman($n)
{
    if($n<0){
       return '';
    }
    if(!$n){
       return '0';
    }

    $thousands=(int)($n/1000);
    $n-=$thousands*1000;
    $a=str_repeat("M",$thousands);
    $rome=array(
        900=>"CM",
        500=>"D",
        400=>"CD",
        100=>"C",
        90=>"XC",
        50=>"L",
        40=>"XL",
        10=>"X",
        9=>"IX",
        5=>"V",
        4=>"IV",
        1=>"I");
    /*
     *Conversion process
     */
    while($n) {
        foreach($rome as $part=>$fragment) if($part<=$n) break;
            $sum=(int)($n/$part);
            $n-=$part*$sum;
            $a.=str_repeat($fragment,$sum);
    }

    return $a;
}
