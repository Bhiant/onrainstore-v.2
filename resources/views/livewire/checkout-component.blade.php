<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Alamat Pengiriman</h3>
                                <div class="billing-address">
                                    {{-- <p class="row-in-form">
                                        <label for="name">Nama Admin</label>
                                        <input id="name" type="text" name="name" value="" readonly>
                                    </p> --}}
                                    <p class="row-in-form">
                                        <label for="cname">Nama Pembeli<span>*</span></label>
                                        <input type="text" name="cname" value="" placeholder="Nama lengkap" wire:model="cname">
                                        @error('cname') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">No Telp/WA<span>*</span></label>
                                        <input type="number" name="phone" value="" placeholder="+62 xxxxxxxxxx" wire:model="phone">
                                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="alamat">Alamat Lengkap<span>*</span></label>
                                        <input type="text" name="alamat" value="" placeholder="Alamat lengkap" wire:model="alamat">
                                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="kecamatan">Kecamatan<span>*</span></label>
                                        <input type="text" name="kecamatan" value="" placeholder="kecamatan" wire:model="kecamatan">
                                        @error('kecamatan') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="kota">Kota/Kabupaten<span>*</span></label>
                                        <input type="text" name="kota" value="" placeholder="kota" wire:model="kota">
                                        @error('kota') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label>Provinsi<span>*</span></label>
                                        <select class="form-control select2" style="width: 100%;" wire:model="provinsi">
                                            <option value="Jawa Timur">Jawa Timur</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                            <option value="Jawa Barat">Barat</option>
                                        </select>
                                        @error('provinsi') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    </p>
                                    <p class="row-in-form">
                                        <label for="note">Note</label>
                                        <input type="text" name="note" value="" placeholder="Catatan" wire:model="note">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="summary summary-checkout">
                            <div class="summary-item payment-method">
                                <h4 class="title text-center"><strong>Metode Pembayaran</strong></h4>
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="bank" type="radio" wire:model="paymentmode">
                                        <span>Transfer Bank</span>
                                        <span class="payment-desc">Silahkan menghubungi suplier untuk metode pembayaran ini untuk bukti Transfer</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-cod" value="cod" type="radio" wire:model="paymentmode">
                                        <span>Bayar Ditempat / COD</span>
                                        <span class="payment-desc">Bayar saat barang sampai dirumah</span>
                                        <span class="payment-desc">Hanya tersedia seluruh Jawa Timur</span>
                                    </label>
                                    @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                @if(Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Rp. {{Cart::subtotal()}}</span></p>
                                @endif
                                @if($errors->isEmpty())
                                <div wire:ignore id="processing" style="font-size: 22px; margin-bottom:20px; padding-left:37px; color:green; display:none;">
                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    <span>Proses</span>
                                </div>
                                @endif

                                <button type="submit" class="btn btn-medium">Order Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>