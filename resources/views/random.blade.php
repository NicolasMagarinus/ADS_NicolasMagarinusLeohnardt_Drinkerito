@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <button class="btn btn-random btn-lg mb-4" onclick="location.reload();">
                <i class="fas fa-random me-2"></i>Sortear Nova Bebida
            </button>
            <p class="text-muted">Clique no botão para descobrir uma bebida aleatória</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 mb-4">
            <div class="drink-card">
                <img src="{{ $bebida->ds_imagem }}" class="card-img-top" alt="{{ $bebida->nm_bebida }}" style="height: 400px; object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-7 mb-4">
            <div class="card h-100 drink-card">
                <div class="card-body">
                    <h2 class="card-title">{{ $bebida->nm_bebida }}</h2>
                    <div class="d-flex align-items-center mb-3">
                        @for ($i = 0; $i <= floor($bebida->nota); $i++)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-warning me-1"></i>
                        @endfor
                        <span class="text-muted">{{ $bebida->nota }} ({{ $bebida->qt_avaliacao }} avaliações)</span>
                    </div>
                    {{-- <p class="card-text">O Mojito é uma bebida cubana refrescante que combina rum, limão, hortelã e água com gás. Perfeita para dias quentes!</p> --}}
                    
                    <h5 class="mt-4">Ingredientes</h5>
                    @foreach ($bebida->ingredientes as $ingrediente)
                        <li><i class="fas fa-check-circle text-success me-2"></i> {{ $ingrediente }}</li>
                    @endforeach
                    
                    <h5 class="mt-4">Modo de Preparo</h5>
                    <div class="instructions">
                        @foreach ($bebida->preparo as $passo)
                            <p>{{ $passo }}</p>
                        @endforeach
                    </div>
                    
                    <div class="mt-4">
                        <button class="btn btn-primary me-2">
                            <i class="fas fa-heart me-1"></i> Favoritar
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-share-alt me-1"></i> Compartilhar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mb-4">Bebidas Semelhantes</h3>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card drink-card h-100">
                <img src="https://images.unsplash.com/photo-1551538827-9c037cb4f32a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Caipirinha" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Caipirinha</h5>
                    <p class="card-text"><i class="fas fa-star text-warning"></i> 4.8 (425 avaliações)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card drink-card h-100">
                <img src="https://images.unsplash.com/photo-1605270012917-bf157c5a9541?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Margarita" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Margarita</h5>
                    <p class="card-text"><i class="fas fa-star text-warning"></i> 4.6 (312 avaliações)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card drink-card h-100">
                <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Daiquiri" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Daiquiri</h5>
                    <p class="card-text"><i class="fas fa-star text-warning"></i> 4.4 (278 avaliações)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card drink-card h-100">
                <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Cosmopolitan" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Cosmopolitan</h5>
                    <p class="card-text"><i class="fas fa-star text-warning"></i> 4.3 (256 avaliações)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection