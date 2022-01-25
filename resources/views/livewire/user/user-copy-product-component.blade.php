<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Copy Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.orders')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.products')}}">Produk</a></li>
              <li class="breadcrumb-item active">Copy Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Copy Produk</h3>
                </div>

                  <div class="card-body">

                    <div class="input-group">
                      <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                      <input type="text" class="form-control" value="{{$product->SKU}}" id="copysku" readonly>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-copy" onclick="copysku()"><i class="far fa-copy"> Copy</i></button>
                      </div>
                    </div>

                    <div class="input-group" style="margin-top: 10px;">
                      <label for="sku" class="col-sm-2 col-form-label">Nama</label>
                      <input type="text" class="form-control" value="{{$product->name}}" id="copyname" readonly>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-copy" onclick="copyname()"><i class="far fa-copy"> Copy</i></button>
                      </div>
                    </div>

                    <div class="input-group" style="margin-top: 10px;">
                      <label for="sku" class="col-sm-2 col-form-label">Harga</label>
                      <input type="text" class="form-control" value="{{$product->regular_price}}" id="copyharga" readonly>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-copy" onclick="copyharga()"><i class="far fa-copy"> Copy</i></button>
                      </div>
                    </div>

                    <div class="input-group" style="margin-top: 10px;">
                      <label for="sku" class="col-sm-2 col-form-label">Deskripsi</label>
                      <input type="text" class="form-control" value="{{$product->description}}" id="copydesk" readonly>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-copy" onclick="copydesk()"><i class="far fa-copy"> Copy</i></button>
                      </div>
                    </div>
                    <div class="input-group" style="margin-top: 20px;">
                      <label for="sku" class="col-sm-2 col-form-label">Gambar</label>
                      <ul>
                      <div class="img-responsive">
                        <li data-thumb="{{ asset('front/assets/images/products') }}/{{$product->image}}">
                          <img src="{{ asset('front/assets/images/products') }}/{{$product->image}}" width="150"/>
                          {{-- <button wire:click="export" class="btn btn-primary">download</button> --}}
                        </li> <br>
                      </div>
                      
                      
                        @php 
                        $images = explode(",",$product->images);
                        @endphp
                        @foreach ($images as $image)
                            @if($image)
                                <li data-thumb="{{ asset('front/assets/images/products') }}/{{ $image }}">
                                    <img src="{{ asset('front/assets/images/products')}}/{{ $image }}" alt="{{ $product->name }}" width="150" />
                                    {{-- <button wire:click="export" target="_blank" style="margin-left: 3px;" class="btn btn-info" ><i class="far fa-copy"> Download</i></button> --}}
                                </li><br>
                            @endif
                        @endforeach
                        </ul>
                      

                    </div>
                    
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    
                    <a type="button" href="{{route('user.products')}}" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                  </div>
                  <!-- /.card-footer -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>