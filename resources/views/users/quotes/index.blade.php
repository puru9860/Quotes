@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4">
                    <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                    <p>Posted {{ $quotes->count() }} {{ Str::plural('quote', $quotes->count()) }} and received
                        {{ $user->favoritesReceived->count() }} {{ Str::plural('favorite', $user->favoritesReceived->count()) }} </p>
                </div>
                <div class=" bg-white p-6 rounded-lg">
                    @if ($quotes->count())
                        @foreach ($quotes as $quote)
                            <x-quote :quote="$quote" />
                        @endforeach

                        {{ $quotes->links() }}
                    @else
                        <p>{{ $user->name }} does not have any quotes</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
