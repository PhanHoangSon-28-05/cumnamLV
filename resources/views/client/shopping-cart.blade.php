@extends('client.master')
@section('title', 'Home')

@section('content')
    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" catergory.htmlid="cart" id="cart">
            @livewire('cart-items', ['logo' => $logo])


        </section>
    </main>

    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                <div class="modal-body">
                    <h3 class="font-weight-bold text-center w-100 mb-3">Enter your informations down below</h3>
                    {{-- <p class="text-center">Enter your informations down below</p> --}}
                    <form action="{{ route('checkout') }}" method="POST">
                        @method("post")
                        @csrf
                        <div class="row">
                            <div class="input col-md-6 col-12 mb-3">
                                <label for="">Fullname</label>
                                <input type="text" name="fullname" required>
                            </div>
                            <div class="input col-md-6 col-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input col-md-6 col-12 mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="phone" required>
                            </div>
                            <div class="input col-md-6 col-12 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address" required>
                            </div>
                        </div>
                        <div class="row form-group input mb-3">
                            <label for="" class="col-4 col-form-label">Payment method:</label>
                            <div class="col-8">
                                <div class="form-check form-check-inline h-100">
                                    <input class="form-check-input" type="radio" name="payment_method" id="method1" value="cash" checked>
                                    <label class="form-check-label" for="method1">Cash</label>
                                </div>
                                <div class="form-check form-check-inline h-100">
                                    <input class="form-check-input" type="radio" name="payment_method" id="method2" value="transfer">
                                    <label class="form-check-label" for="method2">Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col send text-center">
                                <button type="submit" class="btn btn-primary rounded-pill mt-md-0 mt-2">
                                    CHECKOUT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
