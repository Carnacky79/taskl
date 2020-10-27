<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../helpers/Helper.php";
    require_once "../models/DataModel.php";
    require_once "../models/Customer.php";
    require_once "../models/CurrencyConverter.php";

    $helper = new Helper();

    const CustomerID = 2;
    const CurTo = "EUR";

    $curConv = new CurrencyConverter();

    $dataSrc = new DataModel();
    $data = $dataSrc->getData();

    $dataHeader = $data[0];

    $data = array_slice($data, 1);

    $customer = new Customer(CustomerID);

    foreach ($dataHeader as $head){
        echo $head . "\t\t";
    }

    echo "\n";

    foreach ($customer->getTransactions($data) as $transaction) {
        foreach ($transaction as $dato) {
            if (preg_match("/^[0-9]/", $dato)){
                echo $dato . "\t\t";
            }else{
                $curAm = $helper->currencyAndAmount($dato);
                echo $curConv->convert($curAm[1], $curAm[0], CurTo) . "\t\t";
            }
        }
        echo "\n";
    }
