@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container">
<h4 style="text-align:center;background-color:#000; height:20px; line-height:20px;color:#fff; margin-left:900px;" ><a href="{{route('admin.categories.create')}}" >Ajouter une category</a></h4>
   <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>Titre</td>
          <td>Description</td>
          <td>Image</td>
          <td>Editer</td>
          <td>Supprimer</td>
          <td></td>
      </tr>
      @foreach($categories as $category)
      <tr>
          <td>{{$category->name}}</td>
          <td>{{str_limit ($category->description, 100) }}</td>
          <td><img src="{{asset('image/categories/'.$category->image )}}" width="100" height="100"></td>
          <td><a href="{{ route('admin.categories.edit', $category->id)}}" class="btn btn-primary">Editer</a></td>
          <td><form method="post" action="{{ route('admin.categories.destroy', $category->id)}}" enctype="multipart/form-data">
   @csrf
   @method('DELETE')

<div class="form-group">
 <button type="submit" class="btn btn-danger">Supprimer une annonce</button>

</div>
</form></td>
          <td></td>
      </tr>
      @endforeach
   </table>
</div>
@endsection