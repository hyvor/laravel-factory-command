<?php declare(strict_types=1);

namespace Hyvor\LaravelFactoryCommand;

use Illuminate\Console\Command;

class FactoryCommand extends Command
{

    protected $signature = 'hyvor:factory {json}';

    protected $description = 'Create a new model factory';

    public function handle() : int
    {

        $json = $this->argument('json');
        $json = json_decode($json, true);

        if (!$json) {
            $this->error('Invalid JSON');
            return 1;
        }

        $model = $json['model'] ?? null;

        if (!$model) {
            $this->error('Model not specified');
            return 1;
        }

        if (!class_exists($model)) {
            $this->error('Model does not exist');
            return 1;
        }

        $factory = $model::factory();
        $count = intval($json['count'] ?? 1);

        if ($count > 1) {
            $factory = $factory->count($count);
        }

        $return = $factory->create($json['attributes'] ?? []);

        $this->line(json_encode($return));

        return 0;

    }

}