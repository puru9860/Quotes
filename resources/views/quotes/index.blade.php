@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @forelse ($quotes as $quote )
                <x-quote :quote="$quote" />
                @empty
                    There are no quotes
                @endforelse
            </div>
        </div>
    </div>

@endsection
