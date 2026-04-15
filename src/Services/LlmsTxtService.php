<?php

namespace Ravenna\LlmsGenerator\Services;

use Statamic\Facades\Entry;
use Statamic\Facades\YAML;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LlmsTxtService
{
    protected static $path = 'addons/llmsgenerator/collections.yaml';

    public static function generate(string $source = 'event'): void
    {
        $siteName = config('app.name', 'My Statamic Site');
        $summary = "Overview of collections and entries on {$siteName}";

        // Load selected collections from YAML
        $selected = [];
        if (Storage::disk('local')->exists(self::$path)) {
            $selected = YAML::parse(Storage::disk('local')->get(self::$path))['selected_collections'] ?? [];
        }

        if (empty($selected)) {
            // Fetch all entries
            $entries = Entry::all()
                ->sortBy(fn($entry) => $entry->collectionHandle() . ' ' . $entry->get('title'));
        } else {
            // Fetch selected entries
            $entries = Entry::all()
                ->filter(fn($entry) => in_array($entry->collectionHandle(), $selected)) // 🚀 filter here
                ->sortBy(fn($entry) => $entry->collectionHandle() . ' ' . $entry->get('title'));
        }



        $groups = $entries->groupBy(fn($entry) => $entry->collectionHandle());

        $lines = [];

        $lines[] = "# {$siteName}";
        $lines[] = "";
        $lines[] = "> {$summary}";
        $lines[] = "";
        $lines[] = "This llms.txt file lists selected collections and their entries in Markdown format for LLM consumption.";
        $lines[] = "";

        foreach ($groups as $collection => $groupEntries) {
            $lines[] = "## " . ucfirst($collection);
            foreach ($groupEntries as $entry) {
                $title = $entry->get('title');
                $url = $entry->absoluteUrl();
                $lines[] = "- [{$title}]({$url}): Entry in collection “{$collection}”";
            }
            $lines[] = "";
        }

        $outputPath = config('llmsgenerator.output_path') ?: public_path('llms.txt');

        File::ensureDirectoryExists(dirname($outputPath));

        File::put($outputPath, implode(PHP_EOL, $lines));
    }
}
