<?php

namespace App\Console\Commands;

use App\Event;
use ReflectionClass;
use InvalidArgumentException;
use Illuminate\Console\Command;

class EventReplay extends Command
{
    private $dispatcher;

    private $tables = ['categories', 'designers', 'media', 'mediables', 'posts', 'products', 'tags', 'tagged', 'customers', 'projects', 'stages'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event-store:replay {--time=now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replay events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->dispatcher = app('CommandBus');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->clearRecords();

        if($this->option('time') == 'now')
            return $this->replayToTime(date('Y-m-d H:i:s'));
        else
            return $this->replayToTime($this->option('time'));
    }

    protected function replayToTime($time)
    {
        Event::oldest()->where('created_at', '<=', $time)->chunk(50, function($events) {
            foreach ($events as $event) {
                $this->executeEvent($event);
            }
        });
    }

    protected function executeEvent($event)
    {
        try {
            $commandName = '\\'.$event->command;
            $newCommand = $this->mapInputToCommand($commandName, $event->data);

            $this->dispatchCommand($newCommand);

        } catch(\Illuminate\Validation\ValidationException $e) {
            // safely replay events if violate validation errors
        }
    }

    protected function dispatchCommand($command)
    {
        $this->dispatcher->pipeThrough([
            \App\Jobs\Middlewares\ValidatingMiddleware::class,
            \App\Jobs\Middlewares\DatabaseTransactionsMiddleware::class,
        ]);
        $this->dispatcher->dispatch($command);
    }

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

    protected function clearRecords()
    {
        foreach($this->tables as $table)
            \DB::table($table)->delete();
    }

}
