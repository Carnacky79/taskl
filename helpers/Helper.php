<?php


class Helper
{
    private $currencies = array(
        "GBP" => "£",
        "EUR" => "€",
        "USD" => "$"
    );

    private $curAm = array();

    public function currencyAndAmount($string){

        $encoding = mb_detect_encoding($string);

        if($encoding == "UTF-8"){
            $first = substr($string, 0, 2);
            $amount = substr($string, 2);
            foreach($this->currencies as $currency => $letter){
                if($letter === $first){
                    $curAm[] = $currency;
                    $curAm[] = $amount;

                    return $curAm;
                }else{
                    $first = substr($string, 0, 3);
                    $amount = substr($string, 3);
                }
            }
        }else{
            $first = substr($string, 0, 1);
            $amount = substr($string, 1);
            foreach($this->currencies as $currency => $letter){
                if($letter === $first){
                    $curAm[] = $currency;
                    $curAm[] = $amount;

                    return $curAm;
                }
            }
        }
    }


}