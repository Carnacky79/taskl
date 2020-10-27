<?php

class Customer
{
    private $id;
    private $transactions = [];

    public function __construct($id) {
        $this->id = $id;
    }

    public function getTransactions($data, $whereId = 0)
    {

        foreach ($data as $row){
            if($row[$whereId] == $this->id) {
                $this->transactions[] = $row;
            }
        }

        return $this->transactions;
    }
}
