@extends('posts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fonctionnement de Laravel 10 CRUD étape par étape </h2>
            </div>
            <br>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Crée un nouveau message</a>
            </div>
            <br>


        </div>
    </div>

    <!-- Message de succes apres ajout de message-->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- end Message de succes apres ajout de message-->

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Détailles</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->detail }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
