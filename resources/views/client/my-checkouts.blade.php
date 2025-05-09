@extends('client.master')
@section('title', 'Home')

@section('content')
    <main id="content-wrapper" class="main-v2 text-body pb-2 border-bottom">
        <section class="container mt-5">
            <h1 class="text-center">
                <strong>My Checkouts</strong>
            </h1>

            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column" class="text-center">Datetime</th>
                        <th scope="column" class="text-center">Total price</th>
                        <th scope="column" class="text-center">Status</th>
                        <th scope="column" class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($checkouts->count() > 0)
                    @foreach ($checkouts as $value)
                    <tr>
                        <td class="text-center">{{ $value->created_at }}</td>
                        <td class="text-center">${{ round($value->total_price, 2) }}</td>
                        <td class="text-center">
                            @if ($value->status == 0)
                            <span class="badge badge-warning">Pending</span>
                            @else
                            <span class="badge badge-success">Paid</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#checkoutDetailModal" data-checkout-id="{{ $value->id }}" title="Detail">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">(List Empty)</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </section>
    </main>

    @livewire('checkouts.checkout-detail', ['view' => 2])
@endsection
