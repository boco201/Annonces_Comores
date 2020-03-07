@extends('site.app')

@section('title', 'Userprofil')

@section('content')
<div class="container">
	<div class="container">
		<h1 class="espace_membres">Bienvenue dans votre espace membre !!!!!!!!!!!!!</h1>
	</div>
	<div class="row">
		<div class="col-md-9">
        <h2 class="espace_membre">Gestion des annonces</h2>
        	@forelse($products as $product)
			<h4>Catégorie: {{ $product->category->name }}</h4>
		  <li class="list-group-item my-2">
		    <h3 class="float-left"><a href="{{ route('site.userprofil.show', $product->id)}}"> {{$product->title}}</a></h3>
		    <p class="float-right" style="color: red;font-weight: bold;font-style: italic;">Ajouté(e)  {{$product->created_at->diffForHumans()}} par {{$product->user->first_name}} !</p>
		    <div class="clearfix"></div>
            <p><img src="{{asset('image/products/'.$product->image)}}" width="300" height="200"></p>
		    <p>{{str_limit($product->description,100)}}</p>
            <h3 class="float-left"><a href=""> {{$product->price}} €</a></h3><br><br>
	
		    <table>
		    	<tr>
		    <td><a href="{{route('site.userprofil.create')}}" class="btn btn-primary">Ajouter une annonce</a></td>
			<td><a href="{{route('site.userprofil.edit', $product->id)}}" class="btn btn-secondary">Editer une annonce</a></td>
			<td style="padding-top:15px;"><form method="post" action="{{ route('site.userprofil.destroy', $product->id)}}" enctype="multipart/form-data">
   @csrf
   @method('DELETE')

<div class="form-group">
 <button type="submit" class="btn btn-danger">Supprimer une annonce</button>

</div>
</form></td>
			</tr>
		    </table>
		  </li>
		@empty
		   <h4 class="text-center">Aucune article trouvée publier maintenant!</h4>
		@endforelse
		</div>
		
	</div>
</div>

@endsection