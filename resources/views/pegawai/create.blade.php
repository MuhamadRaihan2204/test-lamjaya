@extends('layout')

@section('content')
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-control form-control-lg">
                @foreach ($kecamatan as $item)
                    <option>Pilih Kecamatan</option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Kelurahan</label>
            <select name="kelurahan_id" id="kelurahan_id" class="form-control form-control-lg">
                @foreach ($kelurahan as $item)
                    <option>Pilih Kelurahan</option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Provinsi</label>
            <select name="provinsi_id" id="provinsi_id" class="form-control form-control-lg">
                @foreach ($provinsi as $item)
                    <option>Pilih Provinsi</option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Pegawai</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nama Pegawai">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tempat Lahir</label>
            <input name="place_of_birth" type="text" class="form-control" id="place_of_birth"
                placeholder="Masukkan Tempat Lahir">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Lahir</label>
            <input name="date" type="date" class="form-control" id="date" placeholder="Masukkan Tanggal Lahir">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <textarea name="address" class="form-control" placeholder="Masukkan Alamat" id="address"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control form-control-lg">
                <option value="1">Pria</option>
                <option value="0">Wanita</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Agama</label>
            <input name="religion" class="form-control" id="religion" placeholder="Masukkan Agama">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
