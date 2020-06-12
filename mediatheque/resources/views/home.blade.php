@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($resources as $resource)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $resource->titre }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $resource->author }}</h6>
                    <p class="card-text">{{ $resource->content }}</p>
                    <p class="card-text">{{ $resource->additional_info }}</p>
                    <p class="card-text">{{ $resource->date }}</p>
                    <p class="card-text">{{ $resource->id }}</p>
                    <a class="btn btn-info" href="{{ route('resource.show', $resource->id) }}">
                        <button>show</button>
                    </a>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
