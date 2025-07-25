@extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')


{{-- 
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
--}}

<form id="invoice-form" method="POST" action="{{ route('invoices.store') }}" onsubmit="return confirmSubmit();">
    @csrf

    <div class="form-group">
        <label>Client Name</label><br>
        <input type="text" name="client_name" value="{{ old('client_name') }}">
    </div>

    <div class="form-group">
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Tax Percentage</label><br>
        <input type="number" step="0.01" inputmode="decimal" name="tax_percentage" value="{{ old('tax_percentage') }}">
    </div>

    <hr>
    <h4>Invoice Items</h4>
    <div id="items-container">
        <div class="item-row">
            <input type="text" name="items[0][item_description]" placeholder="Item description" value="{{ old('items.0.item_description') }}">
            <input type="number" name="items[0][quantity]" placeholder="Qty" value="{{ old('items.0.quantity') }}">
            <input type="number" step="0.01" inputmode="decimal" name="items[0][price_per_item]" placeholder="Price" value="{{ old('items.0.price_per_item') }}">
        </div>
    </div>

    <button type="button" onclick="addItem()">Add More Items</button><br><br>
    <button type="submit">Submit Invoice</button>
</form>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<style>
    .item-row {
        margin-bottom: 10px;
    }
    .remove-btn {
        margin-left: 10px;
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<!-- jQuery + Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
let itemIndex = 1;

function addItem() {
    const container = document.getElementById('items-container');
    const row = document.createElement('div');
    row.className = 'item-row';
    row.innerHTML = `
        <input type="text" name="items[${itemIndex}][item_description]" placeholder="Description">
        <input type="number" name="items[${itemIndex}][quantity]" placeholder="Qty">
        <input type="number" step="0.01" inputmode="decimal" name="items[${itemIndex}][price_per_item]" placeholder="Price">
        <button type="button" class="remove-btn" onclick="removeItem(this)">Remove</button>
    `;
    container.appendChild(row);
    itemIndex++;
}

function removeItem(button) {
    button.closest('.item-row').remove();
}

function confirmSubmit() {
    return confirm("Are you sure you want to generate this invoice?");
}
</script>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endpush
