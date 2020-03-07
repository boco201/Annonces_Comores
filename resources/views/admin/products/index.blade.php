@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container">
 <h4 style="text-align:center;background-color:#000; height:20px; line-height:20px;color:#fff; margin-left:900px;" ><a href="{{route('admin.products.create')}}" >Ajouter une annonce</a></h4>
   <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>Image</td>
          <td>Titre</td>
          <td>Description</td>
          <td>Prix</td>
          <td>Editer</td>
          <td>Supprimer</td>
          <td></td>
      </tr>
      @foreach($products as $product)
    <tr>
    <td><img src="{{asset('image/products/'.$product->image )}}" width="100" height="100"></td>
        <td>{{ $product->title}}</td>
        <td>{{ str_limit($product->description, 50)}}</td>
        <td>{{ $product->price}} €</td>
        <td><a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-primary">Editer</a></td>
        <td><form method="post" action="{{ route('admin.products.destroy', $product->id)}}" enctype="multipart/form-data">
   @csrf
   @method('DELETE')

<div class="form-group">
 <button type="submit" class="btn btn-danger">Supprimer une annonce</button>

</div>
</form></td>
    </tr>
    @endforeach
      <!--@foreach($products as $product)
      <tr>
          <td><img src="{{asset('image/products/'.$product->image )}}" width="100" height="100"></td>
          <td>{{$product->title}}</td>
          <td>{{str_limit ($product->description, 100) }}</td>
          <td>{{$product->price}} €</td>
          <td><a href="" class="btn btn-primary">Editer</a></td>
          <td><form method="post" action="{{ route('admin.products.destroy', $product->id )}}" enctype="multipart/form-data">
                  @csrf
                  @method('DELETE')

       

            <div class="form-group">
                  <button type="submit" class="btn btn-danger">Supprimer</button>
            
            </div>
      </form></td>
      
          <td></td>
      </tr>
      @endforeach-->
   </table>
</div>
<div class="container">
{{$products->links()}}
</div>

@endsection