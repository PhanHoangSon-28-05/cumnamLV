<div wire:ignore.self id="checkoutDetailModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Checkout Detail</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body" wire:loading wire:target="modalSetup">
                <div class="row">
                    <div class="col text-center py-3">
                        <span class="spinner" style="font-size:2rem">
                            <i class="fa-solid fa-spinner"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                @if ($checkout)
                <div class="row mb-2" style="font-size:1.2rem">
                    <div class="col-auto">
                        <i class="fa-solid fa-user mr-1"></i>
                        <strong>{{ $checkout->fullname }}</strong>
                    </div>
                    <div class="col text-right">
                        {{ $checkout->created_at }}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <table class="table table-dark table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $checkout->email }}</td>
                                    <td class="text-center">{{ $checkout->phone }}</td>
                                    <td class="text-center">{{ $checkout->address }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success">{{ $checkout->payment_method }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <div class="col">
                        <table class="table table-dark table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Detail</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($total_price = 0)
                                @foreach ($checkout->checkout_products as $value)
                                @php($total_price += $value->total_price)
                                <tr>
                                    <td class="text-left">
                                        {{-- <img src="{{ route('storages.image', ['url' => $value->product->pic]) }}" 
                                        alt="{{ $value->product->name }}" style="width: 3rem" class="float-left mr-2"> --}}
                                        {{ $value->product->name }}
                                    </td>
                                    <td class="text-left">
                                        @php($fabric = $value->product_items->where('id_color', '<>', null)->first())
                                        Fabric: {{ $fabric->name ?? $fabric->color->name ?? '-' }} <br>
                                        Width/Height: {{ $value->width }} x {{ $value->height }} <br>
                                        @foreach ($value->product_items->where('id_item', '<>', null) ?? [] as $item)
                                        {{ $item->order->name }}: {{ $item->name }} <br>
                                        @endforeach
                                    </td>
                                    <td class="text-center">${{ $value->price }}</td>
                                    <td class="text-center">{{ $value->amount }}</td>
                                    <td class="text-center">${{ $value->total_price }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"></td>
                                    <td class=text-center><strong>${{ $total_price }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>

            <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                @if (($checkout->status ?? 0) == 0)
                <button type="button" class="btn btn-primary" wire:click.prevent="payment">
                    Payment
                </button>
                @else
                <button type="button" class="btn btn-primary" disabled>
                    Paid
                    <i class="fa-regular fa-circle-check ml-2"></i>
                </button>
                @endif
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#checkoutDetailModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-checkout-id') ?? 0;
                @this.call('modalSetup', id)
            })
        })
    </script>
@endpush