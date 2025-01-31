@extends('publico.layouts.app')

@section('content')
<div class="content-section-home">
    <div class="container">
        <div class="row">
            <!-- Coluna 1: Menu Principal -->
            <div class="col-md-3 mb-4">
                <h2 class="menu-header">Idiomas Disponíveis</h2>
                <ul class="nav flex-column">
                    @foreach ( $idiomas as $idioma )
                        <li><a href="#" class="nav-link">{{ $idioma->nome }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Coluna 3: Antigo Testamento -->
            <div class="col-md-3 mb-4">
                <h2 class="menu-header">Antigo Testamento</h2>
                <div class="d-flex flex-column">
                    @foreach ($testamentos->find(1)?->livros as $antigoTestamento)
                        <a href="#" class="tema-link">{{ $antigoTestamento->nome }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Coluna 4: Novo Testamento -->
            <div class="col-md-3 mb-4">
                <h2 class="menu-header">Novo Testamento</h2>
                <div class="d-flex flex-column">
                    @foreach ($testamentos->find(2)?->livros as $novoTestamento)
                        <a href="#" class="tema-link">{{ $novoTestamento->nome }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection