<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if(Session::has('message'))
              <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
          @endif
          <div class="col-12">
              <div class="d-flex justify-content-start mb-2">
                <a href="{{route('admin.addcategories')}}" class="btn btn-success col-md-2">Tambah</a>
              </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead class="text-center">
                  <tr>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td class="text-center">
                          <a href="{{route('admin.editcategories',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-1x"></i></a>
                          <a href="#" onclick="confirm('Yakin ingin menghapus data ini ?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-1x text-danger"></i></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>                  
                </table>
                <div><p>{{$categories->links()}}</p></div>
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