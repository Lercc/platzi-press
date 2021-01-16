@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lercc">
                <div class="card-header">
                  Artículos
                  <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary float-right">Crear</a>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table ">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>TÍTULO</th>
                            <th>TÍTULO</th>
                            <th>TÍTULO</th>
                            <th>TÍTULO</th>
                            <th>TÍTULO</th>
                            <th colspan="2">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td class="user-select-all">{{ $post->id }}</td>
                              <td class="user-select-all">{{ $post->title }}</td>
                              <td class="user-select-all">{{ $post->title }}</td>
                              <td class="user-select-all">{{ $post->title }}</td>
                              <td class="user-select-all">{{ $post->title }}</td>
                              <td class="user-select-all">{{ $post->title }}</td>
                              <td >
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-success">Editar</a>
                              </td>
                              <td>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input  
                                    type="submit" 
                                    value="Eliminar" 
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Desea eliminar el campo?')">
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div>
                      {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
