@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier un membre</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('membres.update', $membre->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">Nom:</label>
                <input type="text" class="form-control" name="nom" value={{ $membre->nom }} />
            </div>

            <div class="form-group">
                <label for="last_name">Prenom:</label>
                <input type="text" class="form-control" name="prenom" value={{ $membre->prenom }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $membre->email }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection