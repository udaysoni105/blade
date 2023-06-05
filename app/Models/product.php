<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    
    protected $fillable = ['Name', 'Description','SKU', 'instock_Quantity', 'regular_price', 'sale_price','active','brand','category'];

    public function categories()
    {
       return $this->belongsToMany(categories::class);
    }
    // public static $rules = [
    //     'Name' => 'required|max:5',
    //     'Description' => 'required',
    //     'SKU' => 'required|unique:products',
    //     'instock_Quantity' => 'required|integer|min:0',
    //     'regular_price' => 'required|numeric|min:0',
    //     'sale_price' => 'nullable|numeric|min:0',
    //     'active' => 'boolean',
    //     'brand' => 'required',
    //     'category' => 'required',
    // ];    
}
