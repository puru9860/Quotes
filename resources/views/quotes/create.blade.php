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
                        <form action="{{route('quote.store')}} " method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control @error('body') border-danger @enderror" name="body"
                                 rows="6" required>{{ old('body') }}</textarea>
                                @error('body')
                                    <div class="text-danger mt-2 ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Post</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
