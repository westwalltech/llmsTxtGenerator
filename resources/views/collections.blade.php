@extends('statamic::layout')
@section('title', 'LLMs Collections')

@section('content')
    <div class="max-w-xl mx-auto">

        {{-- Header --}}
        <header class="flex flex-wrap items-center justify-between gap-4 px-2 sm:px-0 py-6 max-md:pb-8 md:py-8">
            <h1 class="text-[25px] leading-[1.25] font-medium antialiased flex items-center gap-2.5">
                <div class="size-5 text-gray-500">
                    @cp_svg('icons/collections', 'size-5')
                </div>
                Collections
            </h1>
            <a href="{{ cp_route('llms-generator.index') }}" class="btn flex items-center gap-1.5">
                @cp_svg('icons/chevron-left', 'size-3.5')
                Back
            </a>
        </header>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 text-sm px-4 py-3 rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('empty'))
            <div class="bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 text-red-800 dark:text-red-200 text-sm px-4 py-3 rounded-xl mb-4">
                {{ session('empty') }}
            </div>
        @endif

        {{-- Main Card --}}
        <div class="bg-white dark:bg-gray-850 rounded-xl ring ring-gray-200 dark:ring-gray-700/80 shadow-ui-md">
            <div class="px-4 sm:px-4.5 py-5 space-y-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Select which collections you wish to include in your <strong>llms.txt</strong> file. When you're ready, click <strong>Save</strong> to retain your choices, then use <strong>Generate</strong> to create the file.
                </p>

                <form method="POST" action="{{ cp_route('llms-generator.collections.save') }}">
                    @csrf
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700/80 overflow-hidden divide-y divide-gray-200 dark:divide-gray-700/80">
                        @foreach ($collections as $index => $collection)
                            @php
                                $handle = $collection->handle();
                                $isChecked = in_array($handle, $saved ?? []);
                            @endphp
                            <label for="collection-{{ $index }}" class="flex items-center gap-3 px-4 py-3 cursor-pointer select-none hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors {{ $isChecked ? 'bg-gray-50 dark:bg-gray-800/50' : '' }}">
                                <input
                                    type="checkbox"
                                    name="collections[]"
                                    value="{{ $handle }}"
                                    id="collection-{{ $index }}"
                                    {{ $isChecked ? 'checked' : '' }}
                                    class="rounded border-gray-300 dark:border-gray-600 text-blue-500 focus:ring-blue-500"
                                />
                                <span class="text-sm text-gray-700 dark:text-gray-200">
                                    {{ $collection->title() ?? $handle }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
