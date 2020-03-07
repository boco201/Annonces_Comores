@extends('site.app')
@section('title', 'Userprofil')
@section('content')
<div class="container mt-4">
	<form method="post" action="{{ route('site.userprofil.update', $product->id)}}" enctype="multipart/form-data">
   @csrf
   @method('PATCH')

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
 <input type="text" name="title" id="title" class="form-control" placeholder="Ajouter un Titre" value="{{$product->title}}" required>
</div>
<div class="form-group">
 <label for="description">Description: </label>
 <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{$product->description}}</textarea>
</div>
<div class="form-group">
 <label for="price">Prix: </label>
 <input type="text" name="price" id="price" class="form-control" placeholder="Ajouter un prix" value="{{$product->price}}"required>
</div>
<div class="form-group">
 <label for="image">Upload une image </label><br>
 <img src="{{asset('image/products/'.$product->image )}}" class="img-thumbnail" width="100" />
 <input type="file" name="image" value="{{ $product->image }}" />
</div>

<div class="form-group">
 <label for="imageGalleries">Upload une image </label><br>
 <input type="file" name="imageGalleries[]" id="imageGalleries" multiple placeholder="Ajouter les images" value="{{old('imageGalleries')}}" >
</div>

<div class="form-group">
 <button type="submit" class="btn btn-primary">Editer une annonce</button>

</div>
</form>
</div>
@endsection



