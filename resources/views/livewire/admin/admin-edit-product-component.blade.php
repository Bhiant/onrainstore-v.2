<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.products')}}">Produk</a></li>
              <li class="breadcrumb-item active">Edit Produk</li>
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
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card-header">
                  <h3 class="card-title">Edit Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct" onsubmit="$('#processing').show();">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Kategori</label>
                        <div  class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" wire:model="category_id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                        <div  class="col-sm-10">
                          <input type="text" class="form-control" id="sku" placeholder="SKU" wire:model="SKU"/>
                          @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="namaproduk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div  class="col-sm-10">
                          <input type="text" class="form-control" id="namaproduk" placeholder="Nama Produk" wire:model="name" wire:keyup="generateSlug"/>
                          @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hargaproduk" class="col-sm-2 col-form-label">Harga Produk</label>
                        <div  class="col-sm-10">
                          <input type="text" class="form-control" id="hargaproduk" placeholder="Harga Produk" wire:model="regular_price"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div  class="col-sm-10">
                          <textarea class="form-control" id="deskripsi" placeholder="Deskripsi" wire:model="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <div  class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" wire:model="stock_status">
                                <option value="Ready">Ready</option>
                                <option value="Kosong">Kosong</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Featured</label>
                        <div  class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" wire:model="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jmlstock" class="col-sm-2 col-form-label">Jumlah Stock</label>
                        <div  class="col-sm-10">
                          <input type="text" class="form-control" id="jmlstock" placeholder="Jumlah Stock" wire:model="quantity"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">Link</label>
                        <div  class="col-sm-10">
                          <input typ="text" class="form-control" id="link" placeholder="Link" wire:model="short_description"/>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="stock" class="col-sm-2 col-form-label">Attribute</label>
                      <div class="col-sm-8">
                          <select class="form-control select2" style="width: 100%;" wire:model="attr">
                              <option value="">Pilih Attribute</option>
                              @foreach ($pattributes as $pattribute)
                              <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-info" wire:click.prevent="add">Tambah</button>
                      </div>
                    </div>
                    @foreach ($inputs as $key=>$value)
                    <div class="form-group row">
                      <label for="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" class="col-sm-2 col-form-label">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                      <div  class="col-sm-6">
                        <input type="text" class="form-control" id="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}"/>
                      </div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                      </div>
                    </div>
                    @endforeach

                    <div class="form-group row">
                        <label for="gbrproduk" class="col-sm-2 col-form-label">Gambar Produk</label>
                        <div  class="col-sm-10">
                          <input type="file" class="input-file" id="gbrproduk" wire:model="newimage"/>
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="120">
                            @else
                              <img src="{{asset('front/assets/images/products')}}/{{$image}}" width="120"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gbrproduk" class="col-sm-2 col-form-label">Galeri Produk</label>
                        <div  class="col-sm-10">
                          <input type="file" class="input-file" id="gbrproduk" wire:model="newimages" multiple/>
                            @if($newimages)
                              @foreach($newimages as $newimage)
                                @if($newimage)
                                  <img src="{{$newimage->temporaryUrl()}}" width="120">
                                @endif
                              @endforeach
                            @else
                              @foreach($images as $image)
                                @if($image)
                                  <img src="{{asset('front/assets/images/products')}}/{{$image}}" width="120"/>
                                @endif
                              @endforeach
                            @endif
                        </div>
                    </div>

                    

                  <!-- /.card-body -->
                  <div class="card-footer">
                    @if($errors->isEmpty())
                    <div wire:ignore id="processing" style="font-size: 22px; margin-bottom:20px; padding-left:37px; color:white; display:none;">
                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                        <span>Proses</span>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a type="button" href="{{route('admin.products')}}" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
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