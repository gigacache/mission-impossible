<?php

use Mission\Impossible\Model\Mission;
use Mission\Impossible\Test\Service;

class ParserTest extends Service
{
    public function testParseMissionsByAllEnvironment(): void
    {
        $this->set('all');
        $data = json_decode(file_get_contents($this->filepath), true);
        foreach ($data[$this->environment] as $mission) {
            $this->missionCollection->add(Mission::createFromJson($mission));
        }
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('all')->getItems());
    }

    public function testParseMissionsByDevEnvironment(): void
    {
        $this->set('dev');
        $data = json_decode(file_get_contents($this->filepath), true);
        foreach ($data[$this->environment] as $mission) {
            $this->missionCollection->add(Mission::createFromJson($mission));
        }
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('dev')->getItems());
    }

    public function testParseMissionsByStagingEnvironment(): void
    {
        $this->set('staging');
        $data = json_decode(file_get_contents($this->filepath), true);
        foreach ($data[$this->environment] as $mission) {
            $this->missionCollection->add(Mission::createFromJson($mission));
        }
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('staging')->getItems());
    }
}