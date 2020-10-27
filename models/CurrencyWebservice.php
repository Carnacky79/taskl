<?php

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{
    // I prefer to put all the currencies in an array to make this class more expandable
    // so the function getExchangeRate will be more flexible

    private $currencies = array(
        "EUR" => array("GBP" => 0.91, "USD" => 1.18),
        "GBP" => array("EUR" => 1.10, "USD" => 1.30),
        "USD" => array("EUR" => 0.85, "GBP" => 1.18)
    );

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public function getExchangeRate($fromCur, $toCur)
    {
        if($fromCur == $toCur){
            return 1;
        }else {
            foreach ($this->currencies as $key => $val) {
                if ($key == $fromCur) {
                    foreach ($val as $k => $v) {
                        if ($k == $toCur)
                            return $v;
                    }
                }
            }
        }
    }
}