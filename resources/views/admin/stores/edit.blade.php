@extends('layouts.app')

@section('content')
<h1>Editar Loja</h1>

<form action=" {{ route('admin.stores.update', ['store' => $store->id]) }}" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Nome Loja</label>
        <input type="text" name="name" class="form-control" value="{{$store->name}}">
    </div>

    <div class="mb-3">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$store->description}}">
    </div>

    <div class="mb-3">
        <label for="">Telefone</label>
        <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
    </div>

    <div class="mb-3">
        <label for="">Celular/Whatsapp</label>
        <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>

    <div class="form-group">
        <p>
            <img src="{{ asset('storage/' . $store->logo) }}" alt="">
        </p>
        <label>Logo</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" />
        @error('logo') 
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
    </div>

    <div>
        @csrf
        @method("PUT")
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-primary">Atualizar loja</button>
    </div>
</form>
@endsection
