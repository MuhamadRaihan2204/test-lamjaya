@extends('layout')

@section('content')
    <a href="{{ route('pegawai.create') }}" class="button button-md">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($pegawai as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->place_of_birth }}</td>
                    <td>{{ $item->date }}</td>
                    <td>

                        @if ($item->gender == 1)
                            Pria
                        @else
                            Wanita
                        @endif
                    </td>
                    <td>{{ $item->religion }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->kelurahan->name ?? '' }}</td>
                    <td>{{ $item->kecamatan->name ?? '' }}</td>
                    <td>{{ $item->provinsi->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
