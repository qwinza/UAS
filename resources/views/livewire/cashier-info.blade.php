<div class="col-md-12 mb-2">
    <div class="card mt-3">
        <div class="card-header">
            <h4>Transaction Summary</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" id="grand-total" class="form-control" disabled
                    value="{{ number_format($grandTotal, 2, ',', '.') }}">
            </div>

            <div class="form-group">
                <label for="inputMoney">Input Money:</label>
                <input wire:model="payAmount" type="number" class="form-control" id="inputMoney">
            </div>

            <div class="form-group">
                <label for="kembali">Kembali</label>
                @php
                    $exchange = (int) $payAmount - $grandTotal;
                    if ($exchange < 0) {
                        $exchange = 0;
                    }
                @endphp
                <input type="text" id="kembali" class="form-control"
                    value="{{ number_format($exchange, 2, ',', '.') }}" disabled>
            </div>

            <button wire:click="onSubmitClick" class="btn btn-primary">Process Transaction</button>
        </div>
    </div>
</div>
