<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attribute Baru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.attributes')}}">Attribute</a></li>
              <li class="breadcrumb-item active">Tambah Attribute</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                @if(Session::has('message'))
              <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @endif
              <div class="card-header">
                <h3 class="card-title">Tambah Attribute</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form wire:submit.prevent="storeAttribute" onsubmit="$('#processing').show();">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Attribute</label>
                    <input type="text" class="form-control input-md" placeholder="Jenis Attribute" wire:model="name" />
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {{-- @if($errors->isEmpty())
                    <div wire:ignore id="processing" style="font-size: 22px; margin-bottom:20px; padding-left:37px; color:white; display:none;">
                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                        <span>Proses</span>
                    </div>
                    @endif --}}
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a type="button" href="{{route('admin.attributes')}}" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
              </form>
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