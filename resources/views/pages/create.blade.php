@extends('layouts.app')

@section('title', 'Create a new Page')

@section('content')

@include('layouts.partials.pageheader')

<div  class="container mx-auto">
    <div class="sm:w-2/3 lg:mx-auto bg-card p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            New Page
        </h1>

        <form
            method="POST"
            action="/product"
        >
            @include ('pages.form', [
                'page' => new App\Models\Page,
                'buttonText' => 'Save'
            ])
        </form>
    </div>
    </div>

@endsection