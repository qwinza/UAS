<div class="card mt-3">

    <div class="card-header">
        <h4>Cashier Input</h4>
        <p style="margin: 0">{{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}</p>
    </div>
    @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="card-body">
        <form wire:submit.prevent="onAddClick" class="row">
            <div class="form-group col-md-3">
                <label for="customer">Customer</label>
                <input wire:model="customer" id="customer" type="text" name="customer" class="form-control"
                    placeholder="Customer Name">
            </div>
            <div class="form-group col-md-3">
                <label for="customer">Product</label>
                <select wire:model="selectProductId" wire:change="onProductChange" class="form-control">
                    <option value="Select product">Select Product</option>
                    @foreach ($products as $prod)
                        <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="customer">Price</label>
                <input wire:model="price" type="text" name="price" class="form-control" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="qty">Quantity</label>
                <input wire:model="qty" wire:input="onQtyChange()" class="form-control text-end" type="number"
                    name="banyaknya" id="banyaknya" placeholder="Quantity">
            </div>
            <div class="form-group col-md-3">
                <label for="subtotal">Subtotal</label>
                <input wire:model="totalPriceHtml" type="number" name="totalPriceHtml" class="form-control" readonly>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>
    </div>
</div>
