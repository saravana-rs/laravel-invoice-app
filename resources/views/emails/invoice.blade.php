@component('mail::message')


# INVOICE #{{ $invoice->id }}
**Date:** {{ $invoice->created_at->format('M d, Y') }} 
---

### **Bill To:**  
<strong>{{ $invoice->client_name }}</strong><br>
{{ $invoice->email }}

---

### **Invoice Items:**

| Item | Qty | Rate | Amount |
|------|-----|------|--------|
@foreach ($invoice->items as $item)
| {{ $item->item_description }} | {{ $item->quantity }} | ${{ number_format($item->price_per_item, 2) }} | ${{ number_format($item->line_total, 2) }} |
@endforeach

---

**Subtotal:** ${{ number_format($invoice->subtotal, 2) }}  
**Tax ({{ $invoice->tax_percentage }}%):** ${{ number_format($invoice->tax_amount, 2) }}  
**Total:** <strong>${{ number_format($invoice->total, 2) }}</strong>

Thanks for your business!  
{{ config('app.name') }}

@endcomponent
