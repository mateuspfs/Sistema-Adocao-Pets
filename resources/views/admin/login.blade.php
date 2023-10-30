
@extends('master');

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="admin/img/favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/style-admin.css') }}s" rel="stylesheet">
</head>
<body class="bg-dark">
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="admin/img/kbrtec.webp" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
                </div>
    
                <div class="col-6 d-flex align-items-center p-5">
                    <form action="{{ route('admin.painel') }}" class="form w-100">
                        <h2 class="h4 text-light mb-4">Painel Administrativo</h2>
    
                        <div class="row row-gap-3">
                            <div class="col-12 form-group text-light">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control bg-dark border-dark text-light" id="email" placeholder="example@kbrtec.com.br">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
                            </div>
    
                            <div class="col-12 form-group text-light">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
    
                                <a href="{{ route('admin.recuperar-senha') }}" class="link-light"><small>Esqueci minha senha</small></a>
                            </div>
    
                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>