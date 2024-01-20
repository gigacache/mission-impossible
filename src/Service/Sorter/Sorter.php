<?php

namespace Mission\Impossible\Service\Sorter;

use Mission\Impossible\Model\MissionCollection;
use Mission\Impossible\Service\Service;

class Sorter extends Service
{
    protected array $sortedMissions = [];

    public function __construct(MissionCollection $missionCollection)
    {
        parent::__construct($missionCollection);
    }

    public function search(string $param, string $data)
    {
        foreach ($this->missionCollection->getItems() as $mission) {
            switch ($param) {
                case 'name':
                    if ($mission->getName() != $data) {
                        $this->missionCollection->remove($mission);
                    }
                    break;
                case 'status';
                    if ($mission->getStatus() != $data) {
                        $this->missionCollection->remove($mission);
                    }
                    break;
                case 'event':
                    if ($mission->getEvent() != $data) {
                        $this->missionCollection->remove($mission);
                    }
                    break;
                case 'function':
                    if ($mission->getFunction() != $data) {
                        $this->missionCollection->remove($mission);
                    }
                    break;
                case 'command':
                    if ($mission->getCommand() != $data) {
                        $this->missionCollection->remove($mission);
                    }
                    break;
            }
        }
    }

    public function environment(mixed $environment): string
    {
        switch ($environment) {
            case ('staging'):
                return 'staging';
            case ('production'):
                return 'production';
            default:
                return 'all';
        }
    }
}