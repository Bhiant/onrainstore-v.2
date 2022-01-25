<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = null;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            unlink('front/assets/images/products' . '/' . $product->image);
        }
        if ($product->images) {
            $images = explode(",", $product->images);
            foreach ($images as $image) {
                if ($image) {
                    unlink('front/assets/images/products' . '/' . $image);
                }
            }
        }

        $product->delete();
        session()->flash('message', 'Produk berhasil dihapus');
    }
    public function render()
    {
        $products = Product::query()
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('SKU', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout("layouts_admin.base");
    }
}
