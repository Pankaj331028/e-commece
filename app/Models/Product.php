<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Category;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected $fillable=['status','name','sku','image','price','special_price','special_price_from','special_price_to','category','short_description','description','url_key'];
   
    // public function category(){
    //         // return $this->hasMany('Spatie\Permission\Models\Role','role_id');
    //         return $this->belongsToMany(Category::class, 'product_id', 'category_id');
    //     }
    public function categories() {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    // public function categoryIds() {
    //     return $this->belongsToMany(Category::class, 'products_categories');
    // }
    // foreach($product->categories as $cat) {
    //     $product = Product::with('categories')->find(1);
    //     echo $cat->name;
    // }
    // public  function getCategoryName($cId) {
    //     $category = Category::find($cId);
    //     if($category) {
    //         return $category->category_name;
    //     } else {
    //         return "-";
    //     }
    // }
}
