@include('../template/header');
@include('../template/sidebar');
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-money-check-alt"></i>
                  diskon_d
              </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Diskon</th>
                <th>Nama Produk </th> 
                <th>Diskon</th> 
                <th>Minimum</th> 
                <th>Maximum</th> 
                <th>Edit</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
                @foreach ($data_user as $d)
                  <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nama}}</td>
                    <td>{{ $d->diskon}}</td>
                    <td>{{ $d->min}}</td>
                    <td>{{ $d->max}}</td>
                    <td align="center"><button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss{{$i}}"><i class="fas fa-edit"></i></button></td>
                    <td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals{{$i}}"><i class="fas fa-trash"></i></button></td>
                    </tr>
                   <div class="modal fade" id="exampleModals{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="{{route('delete_diskon_d')}}">
                        @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data {{$d->nama}}?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="text" value="{{$d->id}}" name="del"style="display:none">
                            <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="modal fade" id="exampleModalss{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="{{route('edit_diskon_d')}}">
                      @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">ID Diskon</label>
                            <div class="col-sm-6">
                              <select  name="id" class="form-control" placeholder="" required>
                                @foreach($data as $z)
                                  <option value="{{$z->id}}">{{$z->id}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Produk</label>
                            <div class="col-sm-6">
                              <select  name="id_produk" class="form-control" placeholder="" required>
                                @foreach($datas as $z)
                                  <option value="{{$z->id}}">{{$z->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>  
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Diskon</label>
                            <div class="col-sm-6">
                              <input type="number" name="diskon" class="form-control" value="{{$d->diskon}}" placeholder="" required>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Min</label>
                            <div class="col-sm-6">
                              <input type="number" name="min" class="form-control" value="{{$d->min}}" placeholder="" required>
                            </div>
                          </div> 
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Max</label>
                            <div class="col-sm-6">
                              <input type="number" name="max" class="form-control" placeholder="" value="{{$d->max}}"  required>
                            </div>
                          </div>    
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text" value="{{ $d->id }}" name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-warning" value="EDIT">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                    {{$i++}}
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID Diskon</th>
                    <th>Nama Produk </th> 
                    <th>Diskon</th> 
                    <th>Minimum</th> 
                    <th>Maximum</th> 
                    <th>Edit</th>
                    <th>DELETE</th>
                  </tr>
                  </tfoot>
                </table>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post" action="{{ route('add_diskon_d') }}">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">ID Diskon</label>
          <div class="col-sm-6">
            <select  name="id" class="form-control" placeholder="" required>
              @foreach($data as $z)
                <option value="{{$z->id}}">{{$z->id}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Produk</label>
          <div class="col-sm-6">
            <select  name="id_produk" class="form-control" placeholder="" required>
              @foreach($datas as $z)
                <option value="{{$z->id}}">{{$z->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>  
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Diskon</label>
          <div class="col-sm-6">
            <input type="number" name="diskon" class="form-control" placeholder="" required>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Min</label>
          <div class="col-sm-6">
            <input type="number" name="min" class="form-control" placeholder="" required>
          </div>
        </div> 
        <div class="form-group row" style="margin-left:-120px;">
          <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Max</label>
          <div class="col-sm-6">
            <input type="number" name="max" class="form-control" placeholder="" required>
          </div>
        </div>   
        
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary" value="Simpan data">
      </div>
    </div>
     </form>
  </div>
</div>

@include('../template/footer');