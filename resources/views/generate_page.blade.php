@extends('statamic::layout')
@section('title', 'LLMs Generate')

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
        @cp_svg('icons/flash-bolt-lightning', 'size-8')
        <h1>LLMs Generate</h1>
      </div>
      <p>When you first install LLMs Generator please use the manual generate button below to create your new <em><b>llms.txt</b></em> file for your website.<br>Then whenever you add or remove an entry in any of your collections a new <em><b>llms.txt</b></em> file will be created to replace it.</p>
    </header>
    <div class="flex flex-wrap p-4 items-start">
      <div class="w-half lg:w-50 p-4 flex items-start rounded-md group">

        <form method="POST" action="{{ cp_route('llms-generator.generate_file') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Generate</button>
            <input type="hidden" name="redirect_to" value="{{ cp_route('llms-generator.generate_page') }}">
        </form>

      </div>

        @if (session('success'))
          <div class="w-half lg:w-50 p-4 flex items-start rounded-md group">
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md">
              <p>{{ session('success') }}</p>
            </div>
          </div>
        @endif

    </div>
  </div>
@endsection
