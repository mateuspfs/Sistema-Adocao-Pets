@extends('master')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC PETS</title>

    <link rel="icon" type="image/x-icon" href="user/img/favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style-site.css') }}" rel="stylesheet">
</head>
<body>
    <header class="border-bottom-1 shadow py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <a href="{{ route('site.home') }}" title="KBR TEC" class="d-inline-block">
                        <h1>
                            <img src="user/img/logo.webp" alt="KBR TEC" width="150">
                        </h1>
                    </a>
                </div>

                <div class="col-8">
                    <nav class="d-flex gap-4 align-items-center justify-content-end">
                        <a href="{{ route('site.home') }}">Home</a>
                        <a href="{{ route('site.index') }}">Quero Adotar</a>
                        <a href="{{ route('admin.login') }}" class="btn btn-custom">Admin</a>
                    <nav>
                </div>
            </div>
        </div>
    </header>

    <nav aria-label="breadcrumb" class="p-3 ps-5 bg-custom-light">
        <div class="container">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item fs-sm"><a href="{{ route('site.index') }}">Home</a></li>
                <li class="breadcrumb-item active fs-sm" aria-current="page">Quero Adotar</li>
            </ol>
        </div>                      
    </nav>

    <section>
        <div class="container-fluid">
            <div class="row">
                <aside style="width: 320px;">
                    <form method="get" action="" class="bg-custom rounded p-3 text-uppercase pt-4 mt-2 position-sticky" style="top: 1rem;">
                        <div class="mb-3 text-light bowlby-one">
                            Filtros
                        </div>

                        <div class="form-group py-2">
                            <label for="especie" class="text-capitalize text-light">Espécie</label>
                            <select name="especie" id="especie" class="form-control form-select">
                                <option value="" disabled @if (empty($selectedFilters['especie'])) selected @endif>Selecione</option>
                                @foreach ($especies as $especie)
                                    <option value="{{ $especie->id_especie }}" @if ($selectedFilters['especie'] == $especie->id_especie) selected @endif>{{ $especie->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="raca" class="text-capitalize text-light">Raça</label>
                            <select name="raca" id="raca" class="form-control form-select">
                                <option value="" disabled @if (empty($selectedFilters['raca'])) selected @endif>Selecione</option>
                                    @foreach ($racas as $raca)
                                        <option value="{{ $raca->id_raca }}" @if ($selectedFilters['raca'] == $raca->id_raca) selected @endif>{{ $raca->nome }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="local" class="text-capitalize text-light">Local</label>
                            <input type="text" class="form-control" name="endereco" id="local" placeholder="Ex: São Paulo" value="{{ isset($selectedFilters['endereco']) ? $selectedFilters['endereco'] : ' ' }}">
                        </div>

                        <div class="form-group py-2">
                            <label for="porte" class="text-capitalize text-light">Porte</label>
                            <select name="porte" id="porte" class="form-control form-select">
                                <option value="" disabled @if (empty($selectedFilters['porte'])) selected @endif>Selecione</option>
                                @foreach ($portes as $porte)
                                    <option value="{{ $porte->id_porte }}" @if ($selectedFilters['porte'] == $porte->id_porte) selected @endif >{{ $porte->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <div class="w-100 text-capitalize text-light">Sexo</div>
                            
                            <div class="bg-light p-2 rounded d-flex flex-wrap row-gap-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="femea" value="1" @if ($selectedFilters['sexo'] == 1) checked @endif>
                                    <label class="form-check-label text-capitalize" for="femea">Fêmea</label>
                                </div>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="macho" value="2" @if ($selectedFilters['sexo'] == 2) checked @endif>
                                    <label class="form-check-label text-capitalize" for="macho">Macho</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-custom-2 mt-4">Buscar</button>
                        </div>
                    </form>
                </aside>
    
                <main class="bg-light p-4 pb-5 col">
                    <h2 class="h4 py-2 pb-0 text-uppercase m-0 bowlby-one">Quero Adotar</h2>
                    <p class="m-0 pb-2">Conheça os pets disponíveis para adoção</p>

                    <div class="row row-gap-4 mt-4">

                        @foreach ($animals as $animal)
                            
                            <div class="col-xxl-3 col-4">
                                <div class="card rounded overflow-hidden">
                                    <a href="{{ route('site.integra', $animal->id_animal) }}">
                                        <img src="user/img/bili.webp" alt="" class="w-100 object-fit-cover" height="320">
                                    </a>

                                    <div class="p-3">
                                        <p class="m-0 fs-sm">{{ $animal->id_animal }}</p>

                                        <div class="d-flex align-items-center gap-2 mt-2 py-2">
                                            <h3 class="h4 m-0">{{ $animal->nome }}</h3>
                                            
                                            @if ($animal->id_sexo === 2 ) 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                    <path fill="#006AB0" fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                                                </svg>
                                            @else 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                    <path fill="#FF7373" fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                                                </svg>
                                            
                                            @endif

                                        </div>

                                        <p class="mb-4 fs-md">{{ $animal->endereco }}</p>

                                        <a href="{{ route('site.integra', $animal->id_animal) }}" class="btn btn-custom-2 d-flex align-items-center justify-content-center gap-2 w-100">
                                            Quero Adotar

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item @if ($animals->onFirstPage()) disabled @endif">
                                <a class="page-link btn-custom" href="{{ $animals->previousPageUrl() }}" aria-label="Anterior">
                                    Anterior
                                </a>
                            </li>
                            @if ($animals->hasPages())
                                @foreach (range(1, $animals->lastPage()) as $page)
                                    <li class="page-item @if ($page === $animals->currentPage()) active @endif">
                                        <a class="page-link btn-custom" href="{{ $animals->url($page) }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            <li class="page-item @if (!$animals->hasMorePages()) disabled @endif">
                                <a class="page-link btn-custom" href="{{ $animals->nextPageUrl() }}" aria-label="Próximo">
                                    Próximo
                                </a>
                            </li>
                        </ul>
                    </nav>                      
                </main>
            </div>
        </div>
    </section>

    <footer class="py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <p class="m-0">
                    Copyright © 2023. Todos os direitos reservados
                </p>

                <a href="https://www.kbrtec.com.br/" target="_blank" title="Acesse o site da KBR TEC">
                    <img src="user/img/kbrtec.webp" alt="KBRTEC" width="100">
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>