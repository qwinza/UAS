<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            <h4>Cashier Info</h4>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="card-body">
            <table class="table table-bordered font-weight-bold">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $log->product->name }}</td>
                            <td>{{ $log->product->price }}</td>
                            <td>{{ $log->qty }}</td>
                            <td>{{ $log->total }}</td>
                        </tr>
                    @endforeach
                    @for ($i = 0; $i < 10 - count($logs); $i++)
                        <tr class="table-row-log">
                            <td>
                                <br>
                            </td>
                            <td>
                                <br>
                            </td>
                            <td>
                                <br>
                            </td>
                            <td>
                                <br>
                            </td>
                            <td>
                                <br>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
