<?php

namespace App\Http\Livewire\User;

use Livewire\Livewire;
use Livewire\Component;
use App\Models\Product;
use Response;
use Illuminate\Support\Facades\Storage;

class UserCopyProductComponent extends Component
{
    public $product_id;
    // public $SKU;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    // public function export()
    // {
    // $product = Product::find($this->product_id);
    // if ($product->image) {
    //     return response()->download(public_path('front/assets/images/products' . '/' . $product->image));
    // }
    //     if ($product->images) {
    //         $images = explode(",", $product->images);
    //         foreach ($images as $image) {
    //             if ($image) {
    //                 return response()->download(public_path('front/assets/images/products' . '/' . $image));
    //             }
    //         }
    //     }
    // }

    public function render()
    {
        $product = Product::find($this->product_id);
        return view('livewire.user.user-copy-product-component', ['product' => $product])->layout('layouts_admin.base');
    }
}
