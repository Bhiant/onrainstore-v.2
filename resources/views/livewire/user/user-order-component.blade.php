<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="col-lg-12">
              <div class="d-flex mb-2">
                <div>
                  <label>Pencarian</label>
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" wire:model="search">
                </div>
                <div style="margin-left: 10px;">
                  <label>Status</label>
                  <select class="form-control" wire:model="search">
                      <option value="">Semua</option>
                      <option value="Pending">Pending</option>
                      <option value="Dipacking">Dipacking</option>
                      <option value="Dikirim">Dikirim</option>
                      <option value="Terkirim">Terkirim</option>
                      <option value="Selesai">Selesai</option>
                      <option value="Cancel">Cancel</option>
                      <option value="Return">Return</option>
                  </select>
                </div>
                {{-- <div style="margin-left: 10px;">
                  <label>Bulan</label>
                  <select class="form-control">
                    <option value="">Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                  </select>
                </div> --}}
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-lg">
                  <thead class="text-center">
                  <tr>
                    <th>Status Transaksi</th>
                    <th>Code Transaksi</th>
                    <th>Nama Customer</th>
                    <th>Telp/Wa</th>
                    <th>Kota / Kabupaten</th>
                    <th>Total Belanja</th>
                    <th>Tanggal Transaksi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @forelse ($orders as $order)
                      <tr>
                        <td class="text-center">
                          <a class="btn btn-success" href="https://www.sap-express.id/layanan/tracking/details/{{$order->resi}}" target="_blank">{{$order->status}}</a>
                        </td>
                        <td class="text-center">{{$order->code}}</td>
                        <td>{{$order->cname}}</td>
                        <td class="text-center">{{$order->phone}}</td>
                        <td class="text-center">{{$order->kota}}</td>
                        <td class="text-center">Rp. {{$order->subtotal}}</td>
                        <td class="text-center">{{$order->created_at->format('d/m/Y')}}</td>
                        <td class="text-center">
                          <a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a>
                        </td>
                      </tr>
                      @empty
                      <tr class="text-center">
                        <td colspan="8">Transaksi tidak ditemukan</td>
                      </tr>
                      @endforelse
                  </tbody>
                </table>
                <div><p>{{$orders->links()}}</p></div>
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