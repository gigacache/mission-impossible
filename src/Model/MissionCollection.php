<?php

namespace Mission\Impossible\Model;

class MissionCollection
{
    protected array $missions = [];
    
    public function add(Mission $mission)
    {
        $this->missions[$mission->getName()] = $mission;
    }

    public function remove(Mission $mission)
    {
        unset($this->missions[$mission->getName()]);
    }

    public function getMissionByName(string $name)
    {
        return $this->missions[$name];
    }

    public function clean()
    {
        unset($this->missions);
        $this->missions = [];
    }

    public function getItems(): array
    {
        return $this->missions;
    }
}
