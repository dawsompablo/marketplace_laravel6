<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
            
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/stores*')) active @endif" aria-current="page" href="{{ route('admin.stores.index') }}">Lojas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/products*')) active @endif" href="{{ route('admin.products.index') }}">Produtos</a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/categories*')) active @endif" href="{{ route('admin.categories.index') }}">Categorias</a>
                     </li>
                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->user()->name }}</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer" onclick="event.preventDefault();document.querySelector('form.logout').submit();">Sair</a>
                            <form action="{{route('logout')}}" class="logout d-none" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        <main class="py-4">
            @include('flash::message')
            @yield('content')
        </main>
    </div>
</body>
</html>
