<?php

namespace mmpsdk\Common\Models;

class ServiceAvailability extends BaseModel
{
    /**
     * @var string
     */
    private $serviceStatus;

    /**
     * @var int
     */
    private $delay;

    /**
     * @var string
     */
    private $plannedRestorationTime;

    /**
     * @return string|null
     */
    public function getServiceStatus()
    {
        return $this->serviceStatus;
    }

    /**
     * @param string|null $serviceStatus
     *
     * @return HeartBeat
     */
    public function setServiceStatus($serviceStatus)
    {
        $this->serviceStatus = $serviceStatus;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param int|null $delay
     *
     * @return HeartBeat
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlannedRestorationTime()
    {
        return $this->plannedRestorationTime;
    }

    /**
     * @param string|null $plannedRestorationTime
     *
     * @return HeartBeat
     */
    public function setPlannedRestorationTime($plannedRestorationTime)
    {
        $this->plannedRestorationTime = $plannedRestorationTime;

        return $this;
    }
}
