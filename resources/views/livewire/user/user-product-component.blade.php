<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.orders')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          {{-- @if(Session::has('message'))
              <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
          @endif --}}
          <div class="col-12">
            <div class="col-lg-12">
              <div class="d-flex justify-content-between mb-2">
                <div>
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" wire:model="search">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead class="text-center">
                  <tr>
                    <th>Contoh Produk</th>
                    <th>SKU</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse ($products as $product)
                      <tr>
                        <td class="text-center"><img src="{{asset('front/assets/images/products')}}/{{$product->image}}" width="60"></td>
                        <td>{{$product->SKU}}</td>
                        <td>{{$product->name}}</td>
                        <td class="text-center">Rp. {{$product->regular_price}}</td>
                        <td class="text-center">
                          <a href="{{route('user.copyproduct',['product_id'=>$product->id])}}"><i class="fa fa-copy fa-2x"></i></a>
                        </td>
                      </tr>
                      @empty
                      <tr class="text-center">
                        <td colspan="8">Produk tidak ditemukan</td>
                      </tr>
                      @endforelse
                  </tbody>                  
                </table>
                <div><p>{{$products->links()}}</p></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>