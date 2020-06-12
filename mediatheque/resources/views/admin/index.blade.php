@extends('layouts.app')

@section('content')
<p>page admin</p>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ressources</a>
        <a href="{{ route('resource.create') }}">more +</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Type de support</a>
        <a href="{{ route('type.create') }}">more +</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Catégories</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @foreach ($resources as $resource)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $resource->titre }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $resource->author }}</h6>
                    <p class="card-text">{{ $resource->content }}</p>
                    <p class="card-text">{{ $resource->additional_info }}</p>
                    <p class="card-text">{{ $resource->date }}</p>
                    <p class="card-text">{{ $resource->id }}</p>
                    
                    @if (count($user->resource) <= 0)
                        <a href="/admin/resource/take/{{ $resource->id }}"><button>take</button></a>
                    @else
                        @foreach ($user->resource as $userResource)
                            @if ($userResource->id === $resource->id)
                                <a href="/admin/resource/remove/{{ $resource->id }}"><button>remove</button></a>
                            @else
                                <a href="/admin/resource/take/{{ $resource->id }}"><button>take</button></a>
                            @endif
                        @endforeach
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @foreach ($types as $type)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $type->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $type->color }}</h6>
                    <p class="card-text">{{ $type->id }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @foreach ($categories as $category)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $category->color }}</h6>
                    <p class="card-text">{{ $category->id }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
