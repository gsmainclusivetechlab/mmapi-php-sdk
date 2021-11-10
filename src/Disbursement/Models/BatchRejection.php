<?php

namespace mmpsdk\Disbursement\Models;

use mmpsdk\Disbursement\Models\BatchStatus;

/**
 * Class BatchRejection
 * @package mmpsdk\Disbursement\Models
 */
class BatchRejection extends BatchStatus
{
    /**
     * @var string
     */
    private $rejectionReason;

    /**
     * @var string
     */
    private $rejectionDate;

    /**
     * @return string|null
     */
    public function getRejectionReason()
    {
        return $this->rejectionReason;
    }

    /**
     * @param string|null $rejectionReason
     *
     * @return BatchRejection
     */
    public function setRejectionReason($rejectionReason)
    {
        $this->rejectionReason = $rejectionReason;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRejectionDate()
    {
        return $this->rejectionDate;
    }

    /**
     * @param string|null $rejectionDate
     *
     * @return BatchRejection
     */
    public function setRejectionDate($rejectionDate)
    {
        $this->rejectionDate = $rejectionDate;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'customData' => $this->customData
        ]);
    }
}
