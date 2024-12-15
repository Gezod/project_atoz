@extends('admin.layout.index')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
    <div class="card rounded-full p-2">
        <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Id Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nilai Trx</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x => $item)
                        <tr class="align-middle">
                            <td>{{ ++$x }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->code_transaksi }}</td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ number_format($item->total_harga) }}</td>
                            <td>
                                <form action="{{ route('admin.update-status', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="form-select
                                        {{ $item->status === 'Paid' ? 'bg-success text-white' : ($item->status === 'Unpaid' ? 'bg-danger text-white' : '') }}">
                                        <option value="Unpaid" {{ $item->status === 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="Paid" {{ $item->status === 'Paid' ? 'selected' : '' }}>Paid</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
