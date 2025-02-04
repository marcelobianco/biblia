@extends('publico.layouts.app')

@section('content')
<!-- Título do Livro -->
<div class="content-section">
    <div class="container">
        <div class="container-fluid bg-light py-3">
            <div class="container">
                <h1 class="h3">{{ $versiculos->first()->livro->nome }} {{ $versiculos->first()->capitulo }}</h1>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="container my-4">
            <div class="row">
                <!-- Texto Bíblico -->
                <div class="col-md-8">
                    <div class="verses">
                        @foreach ( $versiculos as $versiculo )
                            <div class="verse">
                                <span class="verse-number">{{ $versiculo->versiculo }}</span>
                                <span class="verse-text">{{ $versiculo->texto }}</span>
                            </div>
                        @endforeach
                        <!-- Adicione mais versículos conforme necessário -->
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="sidebar rounded">
                        <h4>{{ $versiculos->first()->livro->nome }}</h4>
                        <div class="chapter-links mb-4">
                            <!-- Links para os capítulos -->
                            <div class="row g-2">
                                @foreach ( $capitulos as $capitulo )
                                    <div class="col-auto"><a href="{{ route('versiculos', [$versiculos->first()->livro->versao->abreviacao, $versiculos->first()->livro->abreviacao ,$capitulo->capitulo]) }}">{{ $capitulo->capitulo }}</a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="other-links">
                            <div class="mb-2">
                                <a href="#" class="text-decoration-none">📖 Bíblia</a>
                            </div>
                            
                            <div class="mb-2">
                                <a href="#" class="text-decoration-none">📚 Bíblia Secundária</a>
                                @if($proximoCapitulo)
                                    <a href="{{ route('versiculos', [$versiculos->first()->livro->versao->abreviacao, $versiculos->first()->livro->abreviacao ,$proximoCapitulo]) }}" class="btn btn-primary">Próximo Capítulo</a>
                                @endif
                                @if($proximoLivro)
                                    <a href="{{ route('versiculos', [$versiculos->first()->livro->versao->abreviacao, $proximoLivro ,1]) }}" class="btn btn-primary">Próximo Livro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection