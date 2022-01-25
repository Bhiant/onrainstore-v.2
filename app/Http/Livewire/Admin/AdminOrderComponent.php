<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = null;
    public $resi;

    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        // $order->resi = $this->resi;
        if ($status == "Diproses") {
            $order->status = 'Diproses';
        } else if ($status == "Dipacking") {
            $order->status = 'Dipacking';
        } else if ($status == "Dikirim") {
            $order->status = 'Dikirim';
            $order->resi = $this->resi;
        } else if ($status == "Terkirim") {
            $order->status = 'Terkirim';
        } else if ($status == "Cancel") {
            $order->status = 'Cancel';
        } else if ($status == "Selesai") {
            $order->status = 'Selesai';
        } else if ($status == "Return") {
            $order->status = 'Return';
        }
        $order->save();
        session()->flash('message', 'Status telah diubah');
    }

    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();
        session()->flash('message', 'Transaksi berhasil dihapus');
    }

    public function render()
    {
        $orders = Order::query()
            ->where('cname', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('kecamatan', 'like', '%' . $this->search . '%')
            ->orWhere('kota', 'like', '%' . $this->search . '%')
            ->orWhere('provinsi', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-order-component', ['orders' => $orders])->layout("layouts_admin.base");
    }
}
