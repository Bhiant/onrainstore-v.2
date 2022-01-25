<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserOrderComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $month;

    // public function bulan($month)
    // {
    //     $month = Carbon::now()->addMonth(1)->format('m');

    // }

    public function render()
    {
        // $month = Carbon::now()->format('m');
        $orders = Order::where([['user_id', Auth::user()->id]])->latest()->paginate(10);
        // $orders = Order::where([['user_id', Auth::user()->id]])->whereMonth('created_at', '=', $month)->latest()->paginate(10);

        if ($this->search !== null) {
            $orders = Order::where([['cname', 'like', '%' . $this->search . '%'], ['user_id', Auth::user()->id]])
                ->orWhere([['code', 'like', '%' . $this->search . '%'], ['user_id', Auth::user()->id]])
                ->orWhere([['kota', 'like', '%' . $this->search . '%'], ['user_id', Auth::user()->id]])
                ->orWhere([['status', 'like', '%' . $this->search . '%'], ['user_id', Auth::user()->id]])
                ->latest()->paginate(10);
        }

        return view('livewire.user.user-order-component', ['orders' => $orders])->layout('layouts_admin.base');
    }
}
