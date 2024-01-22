<?php

namespace Mission\Impossible\Test;

use Mission\Impossible\Model\Mission;
use Mission\Impossible\Test\Service;

class ParserTest extends Service
{
    public function testParseMissionsByAllEnvironment(): void
    {
        $this->set('all');
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('all')->getItems());
    }

    public function testParseMissionsByDevEnvironment(): void
    {
        $this->set('dev');
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('dev')->getItems());
    }

    public function testParseMissionsByStagingEnvironment(): void
    {
        $this->set('staging');
        $this->assertEquals($this->missionCollection->getItems(),$this->parser->read('staging')->getItems());
    }
}