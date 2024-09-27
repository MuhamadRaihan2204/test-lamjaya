@extends('layout')

@section('content')
    <form action="{{ route('provinsi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Code</label>
            <input name="code" type="text" class="form-control" id="code"
                placeholder="Masukkan Kode">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama Kecamatan">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select name="status" id="status" class="form-control form-control-lg">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
