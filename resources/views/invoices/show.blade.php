@extends('layouts.master')

@section('content')
    @include('partials.navbar')
    <div class="container col-md-12" style="margin-top: 10%">
        <div class="card mt-3">
            <div class="card-header">
                <h4>Invoice</h4>
            </div>
            <div class="text-right mr-5">
                <p>Bandung, {{ \Carbon\Carbon::parse($invoice->created_at)->translatedFormat('d M Y') }}</p>
                <p>Kepada Yth, {{ $invoice->customer }}</p>
                <p>No. Nota N-12321312</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered font-weight-bold">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Banyaknya</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->logs as $log)
                            <tr class="centered-text">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $log->product->name }}</td>
                                <td>{{ $log->product->price }}</td>
                                <td>{{ $log->qty }}</td>
                                <td>{{ $log->product->price * $log->qty }}</td>
                            </tr>
                        @endforeach
                        @for ($i = $invoice->logs->count() + 1; $i <= 10; $i++)
                            <tr>
                                <td class="centered-text">
                                    {{ $i }}
                                </td>
                                <td><br></td>
                                <td><br></td>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="invoice-footer" colspan="3">Terbilang: Rupiah</th>
                            <th class="invoice-footer" colspan="2">Total: Rp. {{ $invoice->grandTotal }}</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="table-footer">
                    <div>
                        <p>Perhatian</p>
                        <p>Barang yang sudah dibeli tidak bisa dikembalikan</p>
                    </div>
                    <div>
                        <p>Hormat kami, {{ $invoice->user->username }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
