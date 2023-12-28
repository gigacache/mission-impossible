<?php

namespace Mission\Impossible\Model;

class Mission
{
    protected string $name;
    protected string $status;
    protected string $event;
    protected string $command;
    protected string $function;

    public static function create(){
        return new Mission();
    }

    public static function createFromJson(array $json): Mission
    {
        $mission = new Mission();
        $mission->setName($json['name']);
        $mission->setStatus($json['status']);
        $mission->setEvent($json['event']);
        $mission->setCommand($json['command']);
        $mission->setFunction($json['function']);
        return $mission;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setEvent(string $event)
    {
        $this->event = $event;
    }

    public function setCommand(string $command)
    {
        $this->command = $command;
    }

    public function setFunction(string $function)
    {
        $this->function = $function;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getFunction(): string
    {
        return $this->function;
    }
}