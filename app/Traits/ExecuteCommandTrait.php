<?php
namespace App\Traits;

use ReflectionClass;
use InvalidArgumentException;
use Request, App;

trait ExecuteCommandTrait {

    /**
     * Execute the command.
     *
     * @param  string $command
     * @param  array $input
     * @param  array $middlewares
     * @return mixed
     */
    protected function executeCommand($command, array $input = null, $middlewares = [])
    {
        $bus = $this->getCommandBus();

        if($input)
            $command = $this->mapInputToCommand($command, $input);

        if(! empty($middlewares))
            $bus->pipeThrough($middlewares);

        return $bus->dispatch($command);
    }

    /**
     * Fetch the command bus
     *
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('CommandBus');
    }

    /**
     * Map an array of input to a command's properties.
     *
     * @param  string $command
     * @param  array $input
     * @throws InvalidArgumentException
     * @author Taylor Otwell
     *
     * @return mixed
     */
    protected function mapInputToCommand($command, array $input)
    {
        $dependencies = [];

        $class = new ReflectionClass($command);

        foreach ($class->getConstructor()->getParameters() as $parameter) {
            $name = $parameter->getName();

            if (array_key_exists($name, $input)) {
                $dependencies[] = $input[$name];
            } elseif ($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                throw new InvalidArgumentException("Unable to map input to command: {$name}");
            }
        }

        return $class->newInstanceArgs($dependencies);
    }

}
