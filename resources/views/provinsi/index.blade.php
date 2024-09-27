@extends('layout')

@section('content')
    <a href="{{ route('provinsi.create') }}" class="button button-md">Tambah</a>

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

            @foreach ($provinsi as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <input type="checkbox" @if ($item->status) checked @endif>
                    </td>
                    <td>
                        <a href="{{ route('provinsi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('provinsi.destroy', $item->id) }}" method="POST">
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
