<?php
namespace App\Jobs\Middlewares;

use Closure;
use Illuminate\Contracts\Validation\Factory;
use ReflectionClass;
use ReflectionProperty;


class ValidatingMiddleware
{
    /**
     * The validation factory instance.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    protected $factory;

    /**
     * Create a new validating middleware instance.
     *
     * @param \Illuminate\Contracts\Validation\Factory $factory
     *
     * @return void
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Validate the command before execution.
     *
     * @param object   $command
     * @param \Closure $next
     *
     *
     * @return void
     */
    public function handle($command, Closure $next)
    {
        if (property_exists($command, 'rules') && is_array($command->rules)) {
            $this->validate($command);
        }

        return $next($command);
    }

    /**
     * Validate the command.
     *
     * @param object $command
     *
     *
     * @return void
     */
    protected function validate($command)
    {
        if (method_exists($command, 'validate')) {
            $command->validate();
        }

        $messages = property_exists($command, 'validation_messages') ? $command->validation_messages : [];

        $validator = $this->factory->make($command->attributes, $command->rules, $messages)->validate();
    }
}
