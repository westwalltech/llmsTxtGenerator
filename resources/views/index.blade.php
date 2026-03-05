@extends('statamic::layout')

@section('title', 'LLMs Generator')

@section('content')
  <div class="card card-lg p-0 content">
    <header class="py-6 px-8 border-b">
      <h1>LLMs Generator</h1>
      <p>Automatically create and maintain a custom <em><b>llms.txt</b></em> file, for any and all your collections and content to allow the new proposed LLMs standard to consume your website with AI Large Language Models.</p>
    </header>
    <div class="flex flex-wrap p-4">
      <div class="w-full lg:w-1/2 p-4 flex items-start rounded-md group">
        <a href="{{ cp_route('llms-generator.collections') }}" class="mr-3 text-gray-80">
          @cp_svg('icons/collections', 'size-8')
        </a>
        <div class="flex-1">
          <h3 class="mb-1"><a href="{{ cp_route('llms-generator.collections') }}" class="text-blue">Collections</a></h3>
          <p>Select and configure which collection(s) you wish to include in your <em><b>llms.txt</b></em> file.</p>
        </div>
      </div>

      <div class="w-full lg:w-1/2 p-4 flex items-start rounded-md group">
        <a href="{{ cp_route('llms-generator.generate_page') }}" class="mr-3 text-gray-80">
          @cp_svg('icons/flash-bolt-lightning', 'size-8')
        </a>
        <div class="flex-1">
          <h3 class="mb-1"><a href="{{ cp_route('llms-generator.generate_page') }}" class="text-blue">Generate</a></h3>
          <p>Generates your <em><b>llms.txt</b></em> file and puts public on your website.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
