<?php

namespace Mission\Impossible\Service\Sorter;

use Mission\Impossible\Model\MissionCollection;

class Sorter
{
    protected array $sortedMissions = [];

    public static function create()
    {
        return new Sorter();
    }

    public function search(MissionCollection $missionCollection, string $param, string $data): MissionCollection
    {
        $currentMissions = $missionCollection->getItems();
        foreach ($currentMissions as $mission) {
            switch ($param) {
                case 'name':
                    if ($mission->getName() != $data) {
                        $missionCollection->remove($mission);
                    }
                    break;
                case 'status';
                    if ($mission->getStatus() != $data) {
                        $missionCollection->remove($mission);
                    }
                    break;
                case 'event':
                    if ($mission->getEvent() != $data) {
                        $missionCollection->remove($mission);
                    }
                    break;
                case 'function':
                    if ($mission->getFunction() != $data) {
                        $missionCollection->remove($mission);
                    }
                    break;
                case 'command':
                    if ($mission->getCommand() != $data) {
                        $missionCollection->remove($mission);
                    }
                    break;
            }
        }
        return $missionCollection;
    }
}