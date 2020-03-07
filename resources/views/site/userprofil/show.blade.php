@extends('site.app')

@section('title', 'Userprofil')
@section('content')

<div class="container mt-4">
   <div class="row">
       <div class="col-md-8">
       <img src="{{ asset('image/products/'. $product->image)}}" alt="" width="800" height="400">
             
       </div>
       <div class="col-md-4">
       <h3><a href="">Titre: {{ $product->title}}</a></h3>
       <h4 style="font-size:bold;color:red;">Prix: {{ $product->price}} €</h4>
       </div>
   </div>
</div>
 <div class="container mt-4">
           
                  @foreach($product->product_galleries as $gallery)
                   <img src="{{ asset('image/galleries/'. $gallery->gallery_image)}}" alt="" width="200" height="200">
             
                  @endforeach
         
         </div>
<div class="container mt-4">
    <p>{{$product->description}}</p>       
  </div>


  
@endsection


