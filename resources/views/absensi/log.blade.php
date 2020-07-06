@extends('content')
@section('board','Log Absensi')
@section('title','Changelog Absensi')
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
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="80%">
          <thead>
            <tr>
              <th>Tgl</th>
              <th>Waktu</th>
              <th>Keterangan</th>
              <th>NIK</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $rsKar)
              <tr>
                <td>{{$rsKar->tgl}}</td>
                <td>{{$rsKar->waktu}}</td>
                <td>{{$rsKar->keterangan}}</td>
                <td>{{$rsKar->nik}}</td>
              </tr>    
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  @endsection