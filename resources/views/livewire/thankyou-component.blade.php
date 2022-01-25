<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Thank You</span></li>
            </ul>
        </div>
    </div>
    
    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Terimakasih Orderan akan segera diproses</h2>
                {{-- <p>A confirmation email was sent.</p> --}}
                <a href="/" class="btn btn-submit btn-submitx">Lanjut Belanja</a>
                <a href="{{route('user.orders')}}" class="btn btn-submit btn-submitx">Lihat Transaksi</a>
            </div>
        </div>
    </div><!--end container-->

</main>