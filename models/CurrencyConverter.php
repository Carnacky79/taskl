<?php
require_once "CurrencyWebservice.php";
/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    public function convert($amount, $from, $to)
    {
        $ws = new CurrencyWebservice();

        return $amount * $ws->getExchangeRate($from, $to);
    }
}