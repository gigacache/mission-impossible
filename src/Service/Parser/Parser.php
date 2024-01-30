<?php

namespace Mission\Impossible\Service\Parser;

use Mission\Impossible\Model\Mission;
use Mission\Impossible\Model\MissionCollection;
use Mission\Impossible\Service\Service;

class Parser extends Service
{
    protected string $filePath = '/Users/dan/src/mission-impossible/resource/mission-data.json';

    public function __construct(MissionCollection $missionCollection)
    {
        parent::__construct($missionCollection);
    }

    public function read(?string $environment): MissionCollection
    {
        $missionData = file_get_contents($this->filePath);
        $data = json_decode($missionData, true);

        if (!isset($data[$environment])) {
            return $this->missionCollection;
        }

        foreach ($data[$environment] as $mission) {
            $this->missionCollection->add(Mission::createFromJson($mission));
        }

        return $this->missionCollection;
    }
}
