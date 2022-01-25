<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.orders')}}">Transaksi</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    Detail Transaksi {{$order->code}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              {{-- <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Data Customer
                  <address>
                    <strong>{{$order->cname}}</strong><br>
                    telp/WA : {{$order->phone}}<br>
                    Alamat : {{$order->alamat}}<br>
                    Kecamatan : {{$order->kecamatan}}<br>
                    Kabupate/Kota :{{$order->kota}}<br>
                    Catatan : {{$order->note}}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
              </div> --}}
              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-12">
                  <p class="lead">Data Customer</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Nama Customer:</th>
                        <td>{{$order->cname}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Telp / Whatsapp:</th>
                        <td>{{$order->phone}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Alamat Lengkap:</th>
                        <td>{{$order->alamat}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Kecamatan:</th>
                        <td>{{$order->kecamatan}}</td>
                      </tr>
                      <tr>
                        <th>Kabupaten / Kota:</th>
                        <td>{{$order->kota}}</td>
                      </tr>
                      <tr>
                        <th>Catatan:</th>
                        <td>{{$order->note}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Product</th>
                      <th>Variasi</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->orderItems as $item)
                    <tr>
                      <td>{{$item->product->SKU}}</td>
                      <td>{{$item->product->name}}</td>
                      @if($item->options)
                      <td>
                        @foreach (unserialize($item->options) as $key => $value)
                          <p>{{$key}} : <b>{{$value}}</b></p>
                        @endforeach
                      </td>
                      @endif
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->price}}</td>
                      <td>Rp. {{$item->price * $item->quantity}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              
              

              <div class="row">
                <!-- /.col -->
                <div class="col-12">
                  <p class="lead">Tanggal Transaksi {{$order->created_at->format('d/m/Y')}}</p>
                  <p class="lead">Status Transaksi <strong class="bg-warning">{{$order->status}}</strong></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Resi Pengiriman:</th>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control" value="{{$order->resi}}" disabled>
                            <div class="input-group-append">
                              <a href="https://www.sap-express.id/layanan/tracking/details/{{$order->resi}}" target="_blank" class="btn btn-default btn-sm"><i class="fas fa-shipping-fast"></i> Tracking</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Metode Pembayaran:</th>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control" value="{{$order->transaction->metode}}" disabled>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control" value="Rp. {{$order->subtotal}}" id="copysubtotal" readonly>
                            {{-- <span class="input-group-append"><button type="submit" class="btn btn-info btn-copy" onclick="copysubtotal()"><i class="far fa-copy"></i> Copy</button></span> --}}
                          </div>
                        </td>

                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{route('user.orders')}}" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-reply"></i> Kembali
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>