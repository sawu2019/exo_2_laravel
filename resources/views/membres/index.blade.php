@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    <h1 class="display-3">Membres</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('membres.create')}}" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> New membre</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($membres as $membre)
        <tr>
            <td>{{$membre->id}}</td>
            <td>{{$membre->nom}} {{$membre->prenom}}</td>
            <td>{{$membre->email}}</td>
            <td>
                <a href="{{ route('membres.edit',$membre->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
            </td>
            <td>
                <form action="{{ route('membres.destroy', $membre->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection