@extends('statamic::layout')
@section('title', 'LLMs Collections')

@section('content')

  <div class="flex py-4 justify-end">
    <a href="{{ cp_route('llms-generator.index') }}" class="btn btn-primary ml-auto flex items-center gap-1">
      @cp_svg('icons/chevron-left', 'size-4')
      Back
    </a>
  </div>

  <div class="card card-lg p-0 content">
    <header class="py-6 px-8 border-b">
      <div class="inline-flex items-center gap-3">
        @cp_svg('icons/collections', 'size-8')
        <h1>LLMs Collections</h1>
      </div>
      <p>Select and configure which collection(s) you wish to include in your <em><b>llms.txt</b></em> file.</p>
    </header>
    <div class="flex flex-wrap p-4">
      <div class="w-full lg:w-1/2 p-4 rounded-md flex flex-col items-start group">

        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Collections</h3>

        <p>From the list on the right showing all of your collections, select which of them you wish to have included in your websites <em><b>llms.txt</b></em> file. When you're ready click the "Save" button below to retain your choices. Then go back to the <em>Generate</em> page to generate your new <em><b>llms.txt</b></em> file</p>

        <div class="py-4 flex flex-col items-start rounded-md group">

          @if (session('success'))
            <div class="py-4 flex items-start rounded-md group">
              <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md">
                <p>{{ session('success') }}</p>
              </div>
            </div>
          @endif

          @if (session('empty'))
            <div class="py-4 flex items-start rounded-md group">
              <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-md">
                <p>{{ session('empty') }}</p>
              </div>
            </div>
          @endif

        </div>

      </div>
      <div class="w-full lg:w-1/2 p-4 rounded-md flex flex-col items-start group">

      <form method="POST" action="{{ cp_route('llms-generator.collections.save') }}" class="w-full">
          @csrf
          <ul class="w-full list-none p-0 m-0 border border-gray-300 dark:border-dark-200 rounded-md overflow-hidden">
              @foreach ($collections as $index => $collection)
                  @php
                      $handle = $collection->handle();
                      $isChecked = in_array($handle, $saved ?? []);
                  @endphp
                  <li class="w-full flex items-center px-4 py-3 {{ $index % 2 === 0 ? 'bg-gray-100 dark:bg-dark-575' : 'bg-white dark:bg-dark-550' }} {{ $index !== count($collections) - 1 ? 'border-b border-gray-300 dark:border-dark-200' : '' }}">
                      <input
                          type="checkbox"
                          name="collections[]"
                          value="{{ $handle }}"
                          id="collection-{{ $index }}"
                          {{ $isChecked ? 'checked' : '' }}
                          class="mr-3"
                      />
                      <label for="collection-{{ $index }}" class="cursor-pointer flex-grow select-none">
                          {{ $collection->title() ?? $handle }}
                      </label>
                  </li>
              @endforeach
          </ul>

          <div class="mt-4">
              <button type="submit" class="btn-primary">Save</button>
          </div>

      </form>

      </div>
    </div>
  </div>
@endsection
