@extends('master')

@if (session()->has('message')) {
    {{ session()->get('message') }}
}
@endif

<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="admin/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">
</head>
<body class="bg-dark h-100">
    <header class="bg-light py-2 shadow">
        <div class="container-fluid">
            <div class="row">
                <div style="width: 250px;">
                    <img src="admin/img/kbrtec.webp" alt="KBRTEC" height="60" width="150" class="object-fit-contain">
                </div>

                <div class="col dropdown d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Bem vindo {{ auth()->user()->nome }}!
    
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill ms-2" viewBox="0 0 16 16">
                            <path fill="#6c757D"  d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                    </div>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item text-end" href="{{ route('admin.recuperar-senha') }}">
                                <small>Alterar Senha</small>
                            </a>
                            <a class="dropdown-item text-end" href="{{ route('admin.login') }}">
                                <small>Sair</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
        <aside class="bg-custom text-light py-4" style="width: 250px;">
            <div class="menu">
                <div class="item">
                    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
    
                        Usuários
                    </div>

                    <div class="collapse show" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            <a href="{{ route('animals.create') }}" class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                </small>
                            </a>
                            <a href="{{ route('animals.index') }}" class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="{{ route('admin.adocao') }}" class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Adoções
                                </small>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.login') }}" class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>

                    Sair
                </a>
            </div>
        </aside>

        <main class="col h-100 text-light p-4">
            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Atualizar Animal</h1>

                <a href="{{ route('animals.index') }}" class="btn btn-light">Voltar</a>
            </div>

            <form action="{{ route('animals.update', ['animal' => $animal->id_animal ]) }}" method="post" class="bg-custom rounded col-12 py-3 px-4">
                
                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="id_animal" name="id_animal" value="{{ $animal->id_animal }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="nome" name="nome" value="{{ $animal->nome }}">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="idade" class="col-sm-2 col-form-label">Idade:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control bg-dark text-light border-dark" id="idade" name="idade" value="{{ getNumeroIdade($animal->idade) }}">
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select bg-dark text-light border-dark" id="unidade_tempo" name="unidade_tempo">
                            <option value="Dias" {{ getUnidadeIdade($animal->idade) === "Dias" ? 'selected' : '' }} >Dias</option>
                            <option value="Semanas" {{ getUnidadeIdade($animal->idade) === "Semanas" ? 'selected' : '' }} >Semanas</option>
                            <option value="Meses" {{ getUnidadeIdade($animal->idade) === "Meses" ? 'selected' : '' }} >Meses</option>
                            <option value="Anos" {{ getUnidadeIdade($animal->idade) === "Anos" ? 'selected' : '' }} >Anos</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control bg-dark text-light border-dark" id="peso" name="peso" value="{{ getNumeroPeso($animal->peso) }}">
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select bg-dark text-light border-dark" id="unidade_medida" name="unidade_medida">
                            <option value="Gramas" {{ getUnidadePeso($animal->peso) === "Gramas" ? 'selected' : '' }} >Gramas</option>
                            <option value="Kg" {{ getUnidadePeso($animal->peso) === "Kg" ? 'selected' : '' }}>Kg</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="sobre" class="col-sm-2 col-form-label">Sobre:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control bg-dark text-light border-dark" id="sobre" name="sobre">{{ $animal->sobre }}</textarea>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="endereco" class="col-sm-2 col-form-label">Endereço:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="endereco" name="endereco" value="{{ $animal->endereco }}">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="id_sexo" class="col-sm-2 col-form-label">Sexo:</label>
                    <div class="col-sm-10">
                        <select class="form-select bg-dark text-light border-dark" id="id_sexo" name="id_sexo">
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id_sexo }}"
                                    @if ($sexo->id_sexo === $animal->id_sexo)
                                    selected
                                    @endif
                                >{{ $sexo->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="id_porte" class="col-sm-2 col-form-label">Porte:</label>
                    <div class="col-sm-10">
                        <select class="form-select bg-dark text-light border-dark" id="id_porte" name="id_porte">
                            @foreach ($portes as $porte)
                                <option value="{{ $porte->id_porte }}"
                                    @if ($porte->id_porte === $animal->id_porte)
                                    selected
                                    @endif
                                >{{ $porte->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_especie" class="col-sm-2 col-form-label">Espécie:</label>
                    <div class="col-sm-10">
                        <select class="form-select bg-dark text-light border-dark" id="id_especie" name="id_especie">
                            @foreach ($especies as $especie)
                                <option value="{{ $especie->id_especie }}"
                                    @if ($especie->id_especie === $animal->raca->especie->id_especie)
                                    selected
                                    @endif
                                >{{ $especie->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="id_raca" class="col-sm-2 col-form-label">Raça:</label>
                    <div class="col-sm-10">
                        <select class="form-select bg-dark text-light border-dark" id="id_raca" name="id_raca">
                            @foreach ($racas as $raca)
                                <option value="{{ $raca->id_raca }}"
                                    @if ($raca->id_raca === $animal->id_raca)
                                    selected
                                    @endif
                                >{{ $raca->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_raca" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select class="form-select bg-dark text-light border-dark" id="id_status" name="id_status">
                            @foreach ($statuss as $status)
                                <option value="{{ $status->id_status }}"
                                    @if ($status->id_status === $animal->id_status)
                                    selected
                                    @endif
                                >{{ $status->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Salvar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
    </div>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('sobre', {
        language: 'pt-br', // Definir idioma
        contentsLangDirection: 'ltr', // Direção do idioma (ltr para esquerda para direita)
        fullPage: true, // Habilitar funcionar página inteira
        entities: false, // Evita que o CKEditor converta entidades HTML
        });
    </script>
</body>
</html>