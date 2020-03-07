<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;
	  protected $fillable = [
    	'gallery_image', 'product_id', 
    ];

    protected  $date = ['deleted_at'];

     public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public static function imageGallery($fileName,$product_id)
    {
       if (request()->hasFile($fileName)) {
          foreach (request()->$fileName as $file) {
            $filename = rand() .'.'. $file->getClientOriginalExtension();
            $newFile = new ProductGallery();
            $newFile->product_id = $product_id;
            $newFile->gallery_image = $filename;
            if ($newFile->save()) {
                $file->move('image/galleries/', $filename);
            }
          }
       }
  }
}
