<?php

namespace Ravenna\LlmsGenerator;

use Statamic\Facades\CP\Nav;
use Statamic\Facades\Entry;
use Statamic\Events\EntrySaved;
use Statamic\Events\EntryDeleted;
use Illuminate\Support\Facades\Event;
use Statamic\Providers\AddonServiceProvider;
use Ravenna\LlmsGenerator\Services\LlmsTxtService;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    public function bootAddon(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/llmsgenerator.php', 'llmsgenerator');

        $this->publishes([
            __DIR__ . '/../config/llmsgenerator.php' => config_path('llmsgenerator.php'),
        ], 'llms-generator-config');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'llms-generator');

        Nav::extend(function ($nav) {
            $nav->tool('LLMs Generator')
                ->section('Tools')
                ->route('llms-generator.index')
                ->icon('ai-sparks');
        });

        Event::listen(EntrySaved::class, function () {
            LlmsTxtService::generate();
        });

        Event::listen(EntryDeleted::class, function () {
            LlmsTxtService::generate();
        });
    }
}
