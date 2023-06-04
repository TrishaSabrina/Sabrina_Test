<?php





namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image', 'shop_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
