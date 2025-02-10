<div class="my-1">
    <h2 class="font-weight-bold pb-4">Your Cart</h2>
    <div class="row align-items-start">
        <!-- Combined Product Image and Details -->
        <div class="col-md-8 col-12 product border-bottom border-dark pb-2">
            {{-- @php($cart_items = Session::get('shopping-cart')) --}}
            @php($total_price = 0)
            @if (isset($cart_items) && count($cart_items) > 0)
                @foreach ($cart_items as $key => $cart_item)
                    @php($total_price += $cart_item['price'] * $cart_item['amount'])
                    <!-- Product Image -->
                    <div class="row border-bottom mb-3">
                        <div class="col-md-4 col-12 p-0 text-center">
                            <img src="{{ URL::asset('storage/' . $cart_item['image']) }}"
                                class="img-fluid w-50 product-image" alt="Product Image">
                            @if ($logo)
                                <img src="{{ route('storages.image', ['url' => $logo->pic]) }}" alt="Logo"
                                    id="logo" class="logo">
                            @else
                                <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo"
                                    id="logo" class="logo">
                            @endif
                        </div>
                        <!-- Product Details -->
                        <div class="col-md-8 col-12 mt-2 mt-md-0">
                            <h5 class="font-weight-bold">{{ $cart_item['name'] }}
                                <span class="float-right">
                                    <select class="rounded-pill"
                                        wire:model.live="cart_items.{{ $key }}.amount">
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </span>
                                <span class="float-right mr-2">${{ $cart_item['price'] }}</span>
                            </h5>
                            <div class="row m-0">
                                <div class="col-6 px-0">
                                    <p><strong>Fabric:</strong> {{ $cart_item['fabric'] ?? '-' }}</p>
                                    <p><strong>Width:</strong> {{ $cart_item['width'] ?? '-"' }}</p>
                                    <p><strong>Height:</strong> {{ $cart_item['height'] ?? '-"' }}</p>
                                    {{-- <p><strong>Depth:</strong> -" </p> --}}
                                </div>
                                <div class="col-6 px-0">
                                    {{-- <p><strong>Lining:</strong> No Lining</p>
                        <p><strong>Mount Type:</strong> Outside</p>
                        <p><strong>Control:</strong> Continuous Loop</p>
                        <p><strong>Control-Position:</strong> Left</p> --}}
                                    @foreach ($cart_item['orders'] ?? [] as $order_name => $item_name)
                                        <p><strong>{{ $order_name }}:</strong> {{ $item_name }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <a href="#!" class="text-danger"
                                wire:click.prevent="removeItem({{ $key }})">Remove</a>
                            {{-- <a href="{{ route('shopping-cart.remove', ['index' => $key]) }}"
                                class="text-danger">Remove</a> --}}
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="text-center text-uppercase w-100 py-5">Your cart is empty!</h1>
            @endif
        </div>

        <!-- Summary Section -->
        <div class="col-md-4 col-12">
            <div class="border-bottom pb-2">
                <p class="mb-1"><strong>Subtotal</strong> <span class="float-right">${{ $total_price }}</span></p>
                <p class="mb-1"><strong>Shipping</strong> <span class="float-right">Shipping &amp; taxes
                        calculated at checkout</span></p>
            </div>
            <div class="py-2 border-bottom">
                <p class="font-weight-bold">Total <span class="float-right">${{ $total_price }}</span></p>
            </div>
            <div class="mt-3">
                <p>Starting at $63/mo or 0% APR with <a href="#" class="text-decoration-none">Affirm</a>.
                    <a href="#" class="text-decoration-none">Check your purchasing power</a>
                </p>
            </div>
            <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#checkoutModal"
                @disabled($cart_items == null || count($cart_items) <= 0)>
                CHECKOUT
            </button>
        </div>
    </div>
</div>
