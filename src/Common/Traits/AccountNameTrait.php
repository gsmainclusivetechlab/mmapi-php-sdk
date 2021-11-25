<?php

namespace mmpsdk\Common\Traits;

trait AccountNameTrait
{
    /**
     * Retrieves the status of a given account.
     *
     * @param array $accountIdentifier
     * @return this
     */
    public static function viewAccountName($accountIdentifier)
    {
        return new \mmpsdk\Common\Process\RetrieveAccountName(
            $accountIdentifier
        );
    }
}
