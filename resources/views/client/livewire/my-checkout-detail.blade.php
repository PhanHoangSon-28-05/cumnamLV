<div wire:ignore.self id="checkoutDetailModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body" wire:loading wire:target="modalSetup">
                <div class="row">
                    <div class="col text-center py-3">
                        <span style="font-size:1.5rem">
                            Please wait...
                        </span>
                    </div>
                </div>
            </div>

            <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                @if ($checkout)
                <div class="row mb-2" style="font-size:1.2rem">
                    <div class="col-auto">
                        Payment: {{ $checkout->payment_method }}
                    </div>
                    <div class="col text-right">
                        {{ $checkout->created_at }}
                    </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <div class="col">
                        <table class="table table-dark table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Detail</th>
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
                                        alt="{{ $value->product->name }}" class="float-left mr-2" width="100"> --}}
                                        {{ $value->product->name }}
                                    </td>
                                    <td class="text-center">
                                        <span class="text-nowrap">{{ $value->width }} x {{ $value->height }}</span>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">${{ round($value->price, 2) }}</strong>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-success">x{{ $value->amount }}</span></td>
                                    <td class="text-left">
                                        @php($fabric = $value->checkout_product_items->where('fabric', '<>', null)->first())
                                        @if ($fabric)
                                        <span class="text-nowrap">
                                            Fabric: {{ $fabric->fabric }}
                                            <strong class="text-success float-right">(+${{ $fabric->price }})</strong>
                                        </span> <br>
                                        @else
                                        @endif

                                        {{-- Width/Height: {{ $value->width }} x {{ $value->height }} <br> --}}

                                        @foreach ($value->checkout_product_items->where('fabric', null) ?? [] as $item)
                                        <span class="text-nowrap">
                                            {{ $item->product_item->order->name ?? '???' }}: {{ $item->product_item->name }}
                                            <strong class="text-success float-right">(+${{ $item->price }})</strong>
                                        </span> <br>
                                        @endforeach
                                    </td>
                                    <td class="text-center">${{ round($value->total_price, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"></td>
                                    <td class=text-center><strong>${{ round($total_price, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>

            <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
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