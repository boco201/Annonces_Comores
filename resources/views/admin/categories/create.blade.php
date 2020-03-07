@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
	<h1>Ajouter une category</h1>
	<form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
		<div class="form-group">
			<label for="name">Nom: </label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Ajouter un nom" value="{{old('name')}}" required>
		</div>
		<div class="form-group">
			<label for="description">Description: </label>
			<textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{old('description')}}</textarea>
		</div>
		<div class="form-group">
			<label for="image">Upload une image </label><br>
			<input type="file" name="image" id="image" placeholder="Ajouter une image" valu="{{old('name')}}" >
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Ajouter une category</button>
		
		</div>
	</form>
</div>

@endsection