@extends('statamic::layout')

@section('title', 'LLMs Generator')

@section('content')
    <div class="max-w-xl mx-auto">

        {{-- Header --}}
        <header class="flex flex-wrap items-center justify-between gap-4 px-2 sm:px-0 py-6 max-md:pb-8 md:py-8">
            <h1 class="text-[25px] leading-[1.25] font-medium antialiased flex items-center gap-2.5">
                <div class="size-5 text-gray-500">
                    @cp_svg('icons/ai-sparks', 'size-5')
                </div>
                LLMs Generator
            </h1>
        </header>

        {{-- Main Card --}}
        <div class="bg-white dark:bg-gray-850 rounded-xl ring ring-gray-200 dark:ring-gray-700/80 shadow-ui-md">
            <div class="px-4 sm:px-4.5 py-5">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Automatically create and maintain a custom <strong>llms.txt</strong> file for your collections and content, allowing AI Large Language Models to consume your website.
                </p>
            </div>

            <div class="flex flex-wrap border-t border-gray-200 dark:border-gray-700/80">
                <a href="{{ cp_route('llms-generator.collections') }}" class="group w-full items-start rounded-b-xl border border-transparent px-4 py-4 lg:p-5 hover:bg-gray-100 dark:hover:bg-gray-800 md:flex lg:w-1/2 lg:rounded-bl-xl lg:rounded-br-none">
                    <div class="size-6 text-gray-400 mt-0.5 mb-2 me-3 shrink-0">
                        @cp_svg('icons/collections', 'size-6')
                    </div>
                    <div class="flex-1">
                        <div class="text-base font-medium text-gray-700 dark:text-white mb-0.5">Collections</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Select and configure which collections to include in your <strong>llms.txt</strong> file.</p>
                    </div>
                </a>

                <a href="{{ cp_route('llms-generator.generate_page') }}" class="group w-full items-start rounded-b-xl border border-transparent px-4 py-4 lg:p-5 hover:bg-gray-100 dark:hover:bg-gray-800 md:flex lg:w-1/2 lg:rounded-br-xl lg:rounded-bl-none">
                    <div class="size-6 text-gray-400 mt-0.5 mb-2 me-3 shrink-0">
                        @cp_svg('icons/flash-bolt-lightning', 'size-6')
                    </div>
                    <div class="flex-1">
                        <div class="text-base font-medium text-gray-700 dark:text-white mb-0.5">Generate</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Generate your <strong>llms.txt</strong> file and publish it to your website.</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection
