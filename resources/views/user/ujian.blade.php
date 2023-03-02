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
                <i class="fas fa-users mr-1"></i>
                  Matkul
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
                <th>Nama Ujian</th>
                <th>Nama Matkul</th>
                <th>Tanggal</th>
                <th>Durasi</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
                <th>Feedback</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
                @foreach ($ada as $d)
                  <tr>
                    <td>{{ $d->nama_ujian }}</td>
                    <td>{{ $d->nama_matkul }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->durasi }}</td>
                    <td>{{ $d->jam_mulai}}</td>
                    <td>{{ $d->jam_selesai }}</td>
                    <td>{{ $d->feedback }}</td>
                    @if($d->status==0)
                    <td align="center"><form action="{{ route('kerjakan') }}" method="GET">
                      @csrf<input type="text" value="$%^" name="jawaban"style="display:none"><input type="text" value="{{ $d->durasi }}" name="jam"style="display:none"><input type="text" value="1" name="no"style="display:none"><input type="text" value="{{ $d->id }}" name="del"style="display:none"><input type="submit"  class="btn btn-sm bg-warning" value="Lanjutkan"></form></td>
                    @endif
                    @if($d->status==1)
                    <td align="center">
                  
                  <input type="submit"  class="btn btn-sm bg-succes" value="Selesai" disabled>
                  <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#exampleModalss{{$i}}">Feedback</button>
                  </td>
                 
                    <div class="modal fade" id="exampleModalss{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="{{route('feedback')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">FEEDBACK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Feedback</label>
                            <div class="col-sm-6">
                              <textarea name="feedback" class="form-control"></textarea>
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
                    @endif
                    </tr>
                   
                    {{$i++}}
                  @endforeach
                @foreach ($tidak as $d)
                  <tr>
                    <td>{{ $d->nama_ujian }}</td>
                    <td>{{ $d->nama_matkul }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->durasi }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td align="center"><form action="{{ route('add_hasil_kerja') }}" method="POST">
                      @csrf<input type="text" value="{{ $d->durasi }}" name="jam"style="display:none"><input type="text" value="{{ $d->id }}" name="del"style="display:none"><input type="submit"  class="btn btn-sm bg-primary" value="Kerjakan"></form></td>
                      
                    </tr>
                   
                    
                    {{$i++}}
                  @endforeach

                  </tbody>
                </table>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@include('../template/footer');