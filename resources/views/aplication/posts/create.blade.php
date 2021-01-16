@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Crear Artículo
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            - {{ $error }} <br>
                        @endforeach
                        </div>
                    @endif
                    
                    <form 
                        action="{{ route('posts.store') }}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input 
                                type="text" 
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                placeholder="Ingrese el título de su artículo">
                        </div>
                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="form-group">
                            <label for="body">Descripción</label>
                            <textarea 
                                name="body"
                                class="form-control" 
                                rows="6"
                                value="{{ old('body') }}"
                                placeholder="Ingrese el contenido de su artículo"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="iframe">iframe</label>
                            <textarea 
                                name="iframe"
                                class="form-control" 
                                rows="2"
                                value="{{ old('iframe') }}"
                                placeholder="Ingrese el contenido embebido"
                            ></textarea>
                        </div>
                        <div class="form-group text-center">
                            @csrf
                            <input type="submit" value="Crear" class="form-control btn btn-success col-6">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
