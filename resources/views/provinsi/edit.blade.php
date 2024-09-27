@extends('layout')

@section('content')
    <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Code</label>
            <input value="{{ $provinsi->code }}" name="code" type="text" class="form-control" id="code"
                placeholder="Masukkan Kode">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input value="{{ $provinsi->name }}" name="name" type="text" class="form-control" id="name"
                placeholder="Masukkan Nama Provinsi">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select name="status" id="status" class="form-control form-control-lg">
                <option @if ($provinsi->status == 1) selected @endif value="1">Aktif</option>
                <option @if ($provinsi->status == 0) selected @endif value="0">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
