@extends('layout')

@section('content')
    <a href="{{ route('kecamatan.create') }}" class="button button-md">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Active</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($kecamatan as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <input type="checkbox" @if ($item->status) checked @endif>
                    </td>
                    <td>
                        <a href="{{ route('kecamatan.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('kecamatan.destroy', $item->id) }}" method="POST">
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
