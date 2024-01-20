<?php

namespace Mission\Impossible\Service;

use Mission\Impossible\Model\MissionCollection;
use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;

class ServiceFactory
{
    public function parser()
    {
        return new Parser(new MissionCollection());
    }

    public function sorter()
    {
        return new Sorter(new MissionCollection());
    }
}