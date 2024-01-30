<?php

namespace Mission\Impossible\Service;

use Mission\Impossible\Model\MissionCollection;

class Service
{
    protected MissionCollection $missionCollection;

    public function __construct(MissionCollection $missionCollection)
    {
        $this->missionCollection = $missionCollection;
    }
}
