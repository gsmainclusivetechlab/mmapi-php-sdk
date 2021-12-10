<?php

namespace mmpsdk\Common\Models;

class ChannelType
{
    /**
     * @var string
     */
    private $channelType;


    /**
     * @return string|null
     */
    public function getChannelType()
    {
        return $this->channelType;
    }

    /**
     * @param string|null $channelType
     *
     * @return ChannelType
     */
    public function setChannelType($channelType)
    {
        $this->channelType = $channelType;
        
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->filterEmpty([
            'channelType' => $this->channelType
        ]);
    }
}

