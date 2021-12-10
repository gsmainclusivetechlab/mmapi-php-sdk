<?php

namespace mmpsdk\Common\Models;

class TransactionType
{
    /**
     * @var string
     */
    private $transactionType;

    /**
     * @var string
     */
    private $transactionSubtype;


    /**
     * @return string|null
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string|null $transactionType
     *
     * @return TransactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransactionSubtype()
    {
        return $this->transactionSubtype;
    }

    /**
     * @param string|null $transactionSubtype
     *
     * @return TransactionType
     */
    public function setTransactionSubtype($transactionSubtype)
    {
        $this->transactionSubtype = $transactionSubtype;
        
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'transactionType' => $this->transactionType,
            'transactionSubType' => $this->transactionSubtype
        ]);
    }
}

