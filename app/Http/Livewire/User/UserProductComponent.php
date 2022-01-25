<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class UserProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        $products = Product::where([['stock_status', 'Ready']])->latest()->paginate(10);

        if ($this->search !== null) {
            $products = Product::where([['name', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])
                ->orWhere([['SKU', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])
                ->orWhere([['regular_price', 'like', '%' . $this->search . '%'], ['stock_status', 'Ready']])
                ->latest()->paginate(10);
        }
        return view('livewire.user.user-product-component', ['products' => $products])->layout("layouts_admin.base");
    }
}
