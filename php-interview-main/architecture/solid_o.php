<?php

interface ISomeObject {
    public function getObjectName(): string;
}

class SomeObject implements ISomeObject
{
    public function getObjectName(): string
    {
        return get_class();
    }
}

class SomeObject2 implements ISomeObject
{
    public function getObjectName(): string
    {
        return get_class();
    }
}

class SomeObjectsHandler {
    public function __construct() { }

    public function handleObjects(array $objects): array {
        $handlers = [];
        /** @var ISomeObject[] $objects */
        foreach ($objects as $object) {
            $handlers[] = $object->getObjectName();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObject(),
    new SomeObject2(),
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);