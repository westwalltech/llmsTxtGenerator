@extends('statamic::layout')
@section('title', 'LLMs Generate')

@section('content')
    <div class="max-w-xl mx-auto">

        {{-- Header --}}
        <header class="flex flex-wrap items-center justify-between gap-4 px-2 sm:px-0 py-6 max-md:pb-8 md:py-8">
            <h1 class="text-[25px] leading-[1.25] font-medium antialiased flex items-center gap-2.5">
                <div class="size-5 text-gray-500">
                    @cp_svg('icons/flash-bolt-lightning', 'size-5')
                </div>
                Generate
            </h1>
            <a href="{{ cp_route('llms-generator.index') }}" class="relative inline-flex items-center justify-center whitespace-nowrap shrink-0 font-medium antialiased no-underline px-3 h-8 text-[0.8125rem] leading-tight gap-2 rounded-lg bg-linear-to-b from-white to-gray-50 hover:to-gray-100 hover:bg-gray-50 text-gray-900 border border-gray-300 shadow-ui-sm dark:from-gray-850 dark:to-gray-900 dark:hover:to-gray-850 dark:border-gray-700/80 dark:text-gray-300 dark:shadow-ui-md [&_svg]:shrink-0 [&_svg]:text-gray-925 [&_svg]:opacity-60 [&_svg]:size-3 dark:[&_svg]:text-white">
                @cp_svg('icons/chevron-left')
                Back
            </a>
        </header>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 text-sm px-4 py-3 rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Main Card --}}
        <div class="bg-white dark:bg-gray-850 rounded-xl ring ring-gray-200 dark:ring-gray-700/80 shadow-ui-md">
            <div class="px-4 sm:px-4.5 py-5 space-y-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Use the button below to manually generate your <strong>llms.txt</strong> file. After the initial generation, the file will be automatically regenerated whenever you add, update, or remove an entry in your selected collections.
                </p>

                <form method="POST" action="{{ cp_route('llms-generator.generate_file') }}">
                    @csrf
                    <input type="hidden" name="redirect_to" value="{{ cp_route('llms-generator.generate_page') }}">
                    <button type="submit" class="relative inline-flex items-center justify-center whitespace-nowrap shrink-0 font-medium antialiased px-4 h-10 text-sm gap-2 rounded-lg bg-linear-to-b from-primary/90 to-primary hover:bg-primary-hover text-white border border-primary-border shadow-ui-md inset-shadow-2xs inset-shadow-white/25">
                        @cp_svg('icons/flash-bolt-lightning', '[&_svg]:size-4')
                        Generate llms.txt
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
