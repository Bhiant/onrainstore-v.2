<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Barang berhasil ditambahkan ke keranjang');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::where([['SKU', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orWhere([['name', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orderBy('created_at', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::where([['SKU', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orWhere([['name', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == "price-desc") {
            $products = Product::where([['SKU', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orWhere([['name', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where([['SKU', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orWhere([['name', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }

        $categories = Category::all();
        return view('livewire.search-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
