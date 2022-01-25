<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Helpers\Helper;

class CheckoutComponent extends Component
{
    public $cname;
    public $phone;
    public $alamat;
    public $kecamatan;
    public $kota;
    public $provinsi;
    public $note;

    public $paymentmode;
    public $thankyou;

    public function mount()
    {
        $this->provinsi = 'Jawa Timur';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'cname' => 'required',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'paymentmode' => 'required',
        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'cname' => 'required',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'paymentmode' => 'required',
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->code = Helper::IDGenerator(new Order, 'code', 5, 'TRS');
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->cname = $this->cname;
        $order->phone = $this->phone;
        $order->alamat = $this->alamat;
        $order->kecamatan = $this->kecamatan;
        $order->kota = $this->kota;
        $order->provinsi = $this->provinsi;
        $order->note = $this->note;
        $order->status = 'Pending';
        $order->save();

        foreach (Cart::content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->link = $item->short_description;
            if ($item->options) {
                $orderItem->options = serialize($item->options);
            }
            $orderItem->save();
        }

        if ($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id, 'Pending');
            $this->resetCart();
        } else if ($this->paymentmode == 'tf') {
            $this->makeTransaction($order->id, 'Pending');
            $this->resetCart();
        }
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->metode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
