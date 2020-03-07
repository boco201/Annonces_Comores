<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'name', 'image', 'description',
    ];

    protected  $date = ['deleted_at'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public static function image($fileName,$category)
    {

       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/categories/', $filename);
            $category->image = $filename;
         }
    }
}
