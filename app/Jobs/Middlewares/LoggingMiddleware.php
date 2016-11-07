<?php
namespace App\Jobs\Middlewares;

use App\Event;

class LoggingMiddleware
{
    public function handle($command, $next)
    {
        $this->logToEventStore($command);
        return $next($command);
    }

    private function logToEventStore($command)
    {
        $event['command'] = get_class($command);
        $event['data'] = $this->getCommandData($command);

        Event::create($event);
    }

    private function getCommandData($command)
    {
        $properties = $this->getCommandDataContract($command);
        $data = array();
        foreach($properties as $property) {
            $data[$property] = $this->getProperty($command, $property);
        }
        return $data;
    }

    private function getCommandDataContract($command)
    {
        $reflection = new \ReflectionClass($command);
        $contract = array();
        foreach($reflection->getConstructor()->getParameters() as $parameter) {
            $contract[] = $parameter->getName();
        }
        return $contract;
    }

    private function getProperty($obj, $prop) {
        $reflection = new \ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
    }



}
