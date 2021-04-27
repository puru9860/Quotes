@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        Post a new Quote
                    </div>
                    <div class="card-body">
                        <form action="{{route('quote.update',$quote->id)}} " method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">

                                <textarea class="form-control @error('body') border-danger @enderror" name="body"
                                 rows="6" required>{{ $quote->body }}</textarea>
                                @error('body')
                                    <div class="text-danger mt-2 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
