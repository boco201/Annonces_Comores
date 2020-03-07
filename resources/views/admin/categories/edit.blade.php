@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
	<h1>Ajouter une category</h1>
	<form method="post" action="{{ route('admin.categories.update', $category->id)}}" enctype="multipart/form-data">
   @csrf
   @method('PATCH')
		<div class="form-group">
			<label for="name">Nom: </label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Ajouter un nom" value="{{$category->name}}" required>
		</div>
		<div class="form-group">
			<label for="description">Description: </label>
			<textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{$category->description}}}</textarea>
		</div>
		<div class="form-group">
        <img src="{{asset('image/categories/'.$category->image )}}" class="img-thumbnail" width="100" />
         <input type="file" name="image" value="{{ $category->image }}" />
		</div>


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Editer une category</button>
		
		</div>
	</form>
</div>

@endsection