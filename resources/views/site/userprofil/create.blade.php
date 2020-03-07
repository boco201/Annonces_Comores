@extends('site.app')
@section('title', 'Userprofil')

@section('content')
<div class="container mt-4">
	<h1>Ajouter une Annonce</h1>
	<form method="post" action="{{route('site.userprofil.store')}}" enctype="multipart/form-data">
   @csrf
<div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="category_id">Category * : </label></h5>
   <select name="category_id" id="category_id" class="form-control">
       @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
     </select>
     </div>

     <div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="identite_id">Category * : </label></h5>
   <select name="identite_id" id="identite_id" class="form-control">
       @foreach($identites as $identite)
        <option value="{{ $identite->id }}">{{$identite->name }}</option>
        @endforeach
     </select>
     </div>

     <div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="ile_id">Category * : </label></h5>
   <select name="ile_id" id="ile_id" class="form-control">
       @foreach($iles as $ile)
        <option value="{{$ile->id }}">{{$ile->name }}</option>
        @endforeach
     </select>
     </div>

<div class="form-group">
 <label for="title">Titre: </label>
 <input type="text" name="title" id="title" class="form-control" placeholder="Ajouter un Titre" value="{{old('title')}}" required>
</div>
<div class="form-group">
 <label for="description">Description: </label>
 <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{old('description')}}</textarea>
</div>
<div class="form-group">
 <label for="price">Prix: </label>
 <input type="text" name="price" id="price" class="form-control" placeholder="Ajouter un prix" value="{{old('price')}}" required>
</div>
<div class="form-group">
 <label for="image">Upload une image </label><br>
 <input type="file" name="image" id="image" placeholder="Ajouter une image" valu="{{old('name')}}" >
</div>

<div class="form-group">
 <label for="imageGalleries">Upload une image </label><br>
 <input type="file" name="imageGalleries[]" id="imageGalleries" multiple placeholder="Ajouter les images" valu="{{old('imageGalleries')}}" >
</div>

<div class="form-group">
 <button type="submit" class="btn btn-primary">Ajouter une annonce</button>

</div>
</form>
</div>
</form>
</div>
@endsection
