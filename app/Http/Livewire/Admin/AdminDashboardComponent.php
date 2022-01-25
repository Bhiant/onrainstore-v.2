<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        $orderSelesai = Order::where('status', 'Selesai')->count();
        $orderDikirim = Order::where('status', 'Dikirim')->count();
        $orderPending = Order::where('status', 'Pending')->whereDate('created_at', Carbon::today())->count();
        $totalSelesai = Order::where('status', 'Selesai')->sum('subtotal');


        return view('livewire.admin.admin-dashboard-component', [
            'orders' => $orders,
            'totalSelesai' => $totalSelesai,
            'orderSelesai' => $orderSelesai,
            'orderDikirim' => $orderDikirim,
            'orderPending' => $orderPending
        ])->layout("layouts_admin.base");
    }
}
