<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    |
    | A key/value pair array of Collections to be included within the llms.txt file.
    |
    | 'collections' => [
    |     'Cache-Control' => 'no-cache, must-revalidate',
    | ];
    |
    */

    'collections' => [],

    /*
    |--------------------------------------------------------------------------
    | Output Path
    |--------------------------------------------------------------------------
    |
    | Absolute filesystem path where the generated llms.txt file is written.
    | Defaults to public/llms.txt for backwards compatibility. Point this at a
    | non-public location (e.g. storage_path('app/llms.txt')) if you want to
    | serve the file through a Laravel route — useful for logging, analytics,
    | or auth.
    |
    */

    'output_path' => public_path('llms.txt'),

];
