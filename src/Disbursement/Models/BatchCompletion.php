<?php

namespace mmpsdk\Disbursement\Models;

use mmpsdk\Disbursement\Models\BatchStatus;

/**
 * Class BatchCompletion
 * @package mmpsdk\Disbursement\Models
 */
class BatchCompletion extends BatchStatus
{
    /**
     * @var string
     */
    private $completionDate;

    /**
     * @var string
     */
    private $link;

    /**
     * @return string|null
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * @param string|null $completionDate
     *
     * @return BatchCompletion
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     *
     * @return BatchCompletion
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'customData' => $this->customData
        ]);
    }
}
