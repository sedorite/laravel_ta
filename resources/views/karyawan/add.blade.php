@extends('content')
@section('board','Tambah')
@section('title','Add Karyawan')
@section('content')
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('karyawan/save/'.$id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group @error('nik') has-error @enderror">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik"> NIK <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nik" name="nik" required="required" class="form-control col-md-7 col-xs-12" value="@if(isset($rsKar->nik)){{$rsKar->nik}}@else{{old('nik')}}@endif">
      @error('nik')
          <div class="help-block">{{$message}}</div>
      @enderror
      </div>
    </div>
    <div class="form-group @error('nama') has-error @enderror">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap"> Nama Lengkap <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="@if(isset($rsKar->nama)){{$rsKar->nama}}@else{{old('nama')}}@endif">
        @error('nama')
          <div class="help-block">{{$message}}</div>
      @enderror
      </div>
    </div>
    <div class="form-group @error('telp') has-error @enderror">
      <label for="telp" class="control-label col-md-3 col-sm-3 col-xs-12"> Telepon </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="telp" class="form-control col-md-7 col-xs-12" type="text" name="telp" value="@if(isset($rsKar->telp)){{$rsKar->telp}}@else{{old('telp')}}@endif">
        @error('telp')
          <div class="help-block">{{$message}}</div>
      @enderror
      </div>
    </div>
    <div class="form-group @error('email') has-error @enderror">
      <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12"> E-mail </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" value="@if(isset($rsKar->email)){{$rsKar->email}}@else{{old('email')}}@endif">
        @error('email')
          <div class="help-block">{{$message}}</div>
      @enderror
      </div>
    </div>
    <div class="form-group @error('tgl') has-error @enderror">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tanggal Lahir <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" name="tgl" id="tgl" class="form-control col-md-7 col-xs-12" value="@if(isset($rsKar->tgl)){{$rsKar->tgl}}@else{{old('tgl')}}@endif">
        @error('tgl')
          <div class="help-block">{{$message}}</div>
      @enderror
      </div>
    </div>
    <div class="form-group @error('username') has-error @enderror">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"> Username <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="@if(isset($rsKar->username)){{$rsKar->username}}@else{{old('username')}}@endif">
          @error('username')
          <div class="help-block">{{$message}}</div>
      @enderror
        </div>
    </div>
    <div class="form-group @error('password') has-error @enderror">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> Password <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" value="@if(isset($rsKar->password)){{$rsKar->password}}@else{{old('password')}}@endif">
          @error('password')
          <div class="help-block">{{$message}}</div>
      @enderror
        </div>
    </div>
    <div class="form-group @error('foto') has-error @enderror">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto"> Foto <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        @if (isset($rsKar->foto))
            <img src="{{asset('uploads/'.$rsKar->foto)}}" id="thumb" alt="" style="width:100px;height:100px;object-fit:cover">
        @else
            <img src="{{asset('uploads/no-foto.png')}}" id="thumb" alt="" style="width:100px;height:100px;object-fit:cover">
        @endif
        <input type="file" name="foto" id="foto">
        <input type="hidden" name="old_foto" id="old_foto" value="@if(isset($rsKar->foto)){{$rsKar->foto}}@endif">
        </div>
        @error('foto')
          <div class="help-block">{{$message}}</div>
      @enderror
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button class="btn btn-primary" type="button">Cancel</button>
        <button class="btn btn-primary" type="reset">Reset</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>

  </form>
@endsection