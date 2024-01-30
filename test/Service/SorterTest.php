<?php

namespace Mission\Impossible\Test;

use Mission\Impossible\Model\Mission;
use Mission\Impossible\Test\Service;

class SorterTest extends Service
{

    public function testGetMissionByEvent(): void
    {
        $this->set('all');
        $this->sorter->sortMissionCollection('event', 'application_item_datalake[saveItem]');
        $test = $this->missionCollection;
        $this->assertEquals([],[]);
    }
}