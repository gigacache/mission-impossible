<?php

namespace Mission\Impossible\Service\Parser;

use Mission\Impossible\Model\Mission;
use Mission\Impossible\Model\MissionCollection;

class Parser
{
    protected string $filePath = '/Users/dan/src/mission-impossible/resource/event-data.json';

    public static function create()
    {
        return new Parser();
    }

    public function read(string $environment): MissionCollection
    {
        $missionCollection = MissionCollection::create();
        $missionData = file_get_contents($this->filePath);
        $data = json_decode($missionData, true);
        foreach ($data[$environment] as $mission) {
            $missionCollection->add(Mission::createFromJson($mission));
        };
        return $missionCollection;
    }
}