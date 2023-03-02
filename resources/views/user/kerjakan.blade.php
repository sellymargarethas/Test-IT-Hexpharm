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
                Soal No{{$data[0]->no}}
              </h3>
            <div class="card-tools">
            @if($data[0]->no>1)
          <form >
            <input type="submit"  class="btn btn-sm bg-danger" value="Previous" <?php if($p == 0 && $tipe=="Submit"){?> disabled <?php }?>><input type="text" value="{{ $data[0]->id_ujian }}" name="id_ujian"style="display:none"><input type="text" value="{{ $del }}" name="del"style="display:none">
            <input type="hidden"  class="btn btn-sm bg-primary" name="z" value="{{$data[0]->no-1}}">
            <input type="hidden"  class="btn btn-sm bg-primary" name="no" value="{{$data[0]->no-1}}">
            <br>
            <br>
          </form>
            @endif
           <form >
            <input type="submit"  class="btn btn-sm bg-primary" value="{{$tipe}}" <?php if($p == 0 && $tipe=="Submit"){?> disabled <?php }?>><input type="text" value="{{ $data[0]->id_ujian }}" name="id_ujian"style="display:none"><input type="text" value="{{ $del }}" name="del"style="display:none">
            <input type="hidden"  class="btn btn-sm bg-primary" name="no" value="{{$data[0]->no+1}}">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <p>{{$data[0]->soal}}</p>
            @if ($tipes=="pg")
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jawaban" value="a">A. {{$data[0]->a}}
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jawaban" value="b">B. {{$data[0]->b}}
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jawaban" value="c">C. {{$data[0]->c}}
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jawaban" value="d">D. {{$data[0]->d}}
              </label>
            </div>
            @endif
            @if ($tipes=="isian")
                <textarea class="form-control" name="jawaban" ></textarea>
            @endif
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
          </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('../template/footer');