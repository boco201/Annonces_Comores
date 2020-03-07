<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Product, Ile, Identite, Category, ProductGallery, User};
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class UserProfilController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = Auth::user();
       
       $products = $user->products()->orderBy('created_at','desc')->paginate(8);
       $product_galleries = DB::table('product_galleries')->orderBy('product_id','desc')->get();
   
        return view('site.userprofil.index', compact('products','product_galleries'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function OverStripe(Rquest $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
   
             $customer = Customer::create(array(
           'email' => $request->stripeEmail,
           'source' => $request->stripeToken
       ));
   
       $charge = Charge::create(array(
           'customer' => $customer->id,
           'amount' =>  '900',
           'currency' => 'eur'
       ));
   
     } catch (\Exception $ex) {
       return $ex->getMessage();
   
   }

        return view('auth.register');
    }


   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
   {

    $iles = Ile::all();
    $identites = Identite::all();
    $categories = Category::all();

    return view('site.userprofil.create', compact('iles','identites','categories'));

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->identite_id = $request->identite_id;
        $product->ile_id = $request->ile_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = Auth()->user()->id;
        $product->image('image', $product);

        if ($product->save()) {

            ProductGallery::imageGallery('imageGalleries',$product->id);
        }

        return redirect()->route('site.userprofil.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 /*  public function store(Request $request, Annonce $annonce)
    {

         request()->validate([
           'title'    =>  'required|min:3',
            'description'     =>  'required|min:10',
            'price'     =>  'required',
            'region_id' => 'required',
            'identite_id' => 'required',
            'type_id' => 'required',
            'departement' => 'required',
            'ville' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'tel'   => 'required'

        ]);

        $annonce = Annonce::create([
            'title'       =>  request('title'),
            'description'        =>   request('description'),
            'price'     =>  request('price'),
            'region_id' => request('region_id'),
            'identite_id' => request('identite_id'),
            'type_id' =>  request('type_id'),
            'departement' => request('departement'),
            'ville' =>  request('ville'),
            'name' =>  request('name'),
            'email' => request('email'),
            'tel'   => request('tel'),
            'user_id'     => Auth::id()

        ]);

         if($request->session()->has('index')) {
        $index = $request->session()->get('index');
        Upload::whereIndex($index)->update(['annonce_id' => $annonce->id, 'index' => 0]);
        }

        return redirect('/userprofil');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id, $slug)
    {
        $annonce = Annonce::find($id);
        $uploads = DB::table('uploads')->orderBy('resized_name','desc')->get();


        return view('backend.admin.profils.show',compact('annonce','uploads'));

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_galleries = ProductGallery::all();

        return view('site.userprofil.show', compact('product', 'product_galleries'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $iles = Ile::all();
        $identites = Identite::all();

        return view('site.userprofil.edit',compact('categories', 'iles', 'identites', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->identite_id = $request->identite_id;
        $product->ile_id = $request->ile_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image('image', $product);

        if ($product->save()) {

            ProductGallery::imageGallery('imageGalleries',$product->id);
        }

        return redirect()->route('site.userprofil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
           ProductGallery::with('product_id')->delete();
           
           return redirect()->route('site.userprofil.index');
        }
    }
}

 