@extends('content')
@section('board','Data Karyawan')
@section('title','Data Karyawan')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <a href="{{url('addkaryawan')}}" class="btn btn-primary">ADD NEW</a>
        @if (session('status'))
                <div class="alert alert-success alert-dismissable" style="margin-top:10px;" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <p><i class="icon fa fa-check"></i>{{session('status')}}</p>
                </div>
            @endif
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Telepon</th>
              <th>E-mail</th>
              <th>Tanggal Lahir</th>
              <th>Foto</th>
              <th>Username</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $rsKar)
              <tr>
                <td>{{$rsKar->nik}}</td>
                <td>{{$rsKar->nama}}</td>
                <td>{{$rsKar->telp}}</td>
                <td>{{$rsKar->email}}</td>
                <td>{{$rsKar->tgl}}</td>
                <td><img src="{{asset('uploads/'.$rsKar->foto)}}" style="height: 50px; width: 50px; object-fit:cover;" alt=""></td>
                <td>{{$rsKar->username}}</td>
                <td>
                    <a href="{{url('karyawan/edit/'.$rsKar->id_kar)}}" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-pencil"></i></a>
                    <a href="{{url('karyawan/delete/'.$rsKar->id_kar)}}" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash"></i></a></td>
              </tr>    
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  @endsection