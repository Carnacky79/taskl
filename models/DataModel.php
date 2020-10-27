<?php


class DataModel
{
    private $data = [];

    public function getData($file = "../data.csv"){
        if (($h = fopen($file, "r")) !== FALSE){

            while(($read = fgetcsv($h, 1000, ";")) !== FALSE) {

                $this->data[] = $read;

            }
            fclose($h);
        }

        return $this->data;
    }
}