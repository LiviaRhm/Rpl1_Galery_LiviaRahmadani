<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>| Timeline</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE css -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" data-toggle="modal" data-target="#modalUpload" class="nav-link btn btn-primary">Upload Foto <i class="fas fa-upload"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/logout') }}" class="nav-link">
          <i class=" fa fa-sign-out-alt fa-sm fa-sw"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Galery Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          @foreach ($galeris as $galeri)
            
        
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">{{ $galeri->tanggal }}</span>
              </div>
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                  <h3 class="timeline-header">{{ $galeri->judul }}</h3>

                  <div class="timeline-body">
                    <img class="img-fluid" width="400" height="400" src="{{ asset('images/'.$galeri->foto) }}" alt="Photo">
                    <br>
                    
                    {{ $galeri->deskripsi }}
                  </div>
                  <div class="timeline-footer">
                    <a href="#" data-toggle="modal" data-target="#modalEdit{{ $galeri->id }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="" data-toggle="modal" data-target="#hapusfoto{{ $galeri->id }}" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          {{-- </div> --}}
          <!-- /.col -->
          <div class="modal fade" id="modalEdit{{ $galeri->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Edit Foto</h3>
                </div>
                <form action="{{ route('galery.update',$galeri->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="judul" value="{{ $galeri->judul }}" name="judul" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" value="{{ $galeri->deskripsi }}" name="deskripsi" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <img src="{{ asset('images/'.$galeri->foto) }}" width="150" height="150" alt="">
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Upload</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
                </div>
                </div>
              </div>
          <div class="modal fade" id="hapusfoto{{ $galeri->id }}" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3>Hapus Foto</h3>
                </div>
                <div class="modal-body">
                  <p>Yakin Ingin Dihapus?</p>
                </div>
                <div class="modal-footer">
                  <a href="{{ url('galery/'.$galeri->id) }}" class="btn btn-danger" type="submit">Hapus</a>
                  <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        
        {{-- </div>
      </div> --}}
      @endforeach
      <!-- /.timeline -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Upload Foto</h3>
        </div>
        <form action="galery" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-gorup">
            <label for="judul">Judul</label>
            <input type="judul" name="judul" class="form-control">
          </div>
          <div class="form-group">
            <label for="ket">Deskripsi</label>
            <input type="deskripsi" name="deskripsi" class="form-control">
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Upload</button>
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>

  </div>
  </div>
</section>
</div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">Galery</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
