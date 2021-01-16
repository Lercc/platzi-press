@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Artículo</div>

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
                      action="{{ route('posts.update', $post) }}"
                      method="post"
                      enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label for="title">Tílulo</label>
                            <input 
                                type="text"
                                class="form-control"
                                name="title"
                            	value="{{ old('title', $post->title)}}">
                        </div>
                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <label for="body">Descripción</label>
                            <textarea 
                                name="body" 
                                rows="6"
                                class="form-control"
                            > {{ old('body', $post->body)}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="iframe">Ifrane</label>
                            <textarea 
                                name="iframe" 
                                rows="2"
                                class="form-control"
                            >{{ old('iframe', $post->iframe)}}
                            </textarea>
                        </div>
                        <div class="form-group text-center">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-success col-6">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
