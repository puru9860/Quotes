@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @forelse ($quotes as $quote )
                    <div class="mb-4 card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4><a href="#">
                                        {{ $quote->user->username }}
                                    </a> says
                                </h4>
                                @can('update', $quote)
                                    <div class="d-flex">
                                        <form action="{{route('quote.edit', $quote->id)}} " method="GET" >
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="bi bi-pencil-fill"></i></button>
                                        </form>
                                        <form action="{{route('quote.destory', $quote->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>

                                    </div>
                                @endcan
                            </div>
                        </div>

                        <div class="card-body">{{ $quote->body }}</div>
                    </div>
                @empty
                    There are no quotes
                @endforelse
            </div>
        </div>
    </div>

@endsection
