@props(['quote' => $quote])

<div class="mb-4 card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4><a href="{{ route('users.quotes',  $quote->user->username) }}">
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
    <div class="card-footer">
       <form action="{{route('quotes.favorite',$quote->id)}} " method="POST">
        @csrf
           <span>{{$quote->favorites->count()}}</span>
           <button type="submit" class="btn btn-sm btn-outline-danger" @guest disabled @endguest> <i class="bi bi-heart-fill"></i></button>
       </form>
    </div>
</div>
