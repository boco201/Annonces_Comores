<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
     protected $fillable = [
    	'title', 'image', 'description', 'price', 'category_id',
    ];

    protected  $date = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function identite()
    {
    	return $this->belongsTo(Identite::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function ile()
    {
    	return $this->belongsTo(Ile::class);
    }

    public function product_galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    
    public static function image($fileName,$product)
    {

       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/products/', $filename);
            $product->image = $filename;
         }
    }

}
