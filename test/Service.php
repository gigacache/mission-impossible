<?php

namespace Mission\Impossible\Test;

use Mission\Impossible\Service\ServiceFactory;
use Mission\Impossible\Model\MissionCollection;
use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;
use Mission\Impossible\Model\Mission;
use PHPUnit\Framework\TestCase;

class Service extends TestCase
{
    public $filepath = '/Users/dan/src/mission-impossible/resource/mission-data.json';
    public string $environment;
    public MissionCollection $missionCollection;
    public Parser $parser;
    public Sorter $sorter;
    public ServiceFactory $serviceFactory;

    public function set(string $environment)
    {
        $this->environment = $environment;
        $this->serviceFactory = ServiceFactory::create();
        $this->missionCollection = MissionCollection::create();
        $this->parser = $this->serviceFactory->parser();
        $this->sorter = $this->serviceFactory->sorter();

        $data = json_decode(file_get_contents($this->filepath), true);
        foreach ($data[$this->environment] as $mission) {
            $this->missionCollection->add(Mission::createFromJson($mission));
        }
    }
}