<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title floar-left d-inline">Checkouts</h5>
        </div>

        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                    <label>
                        <span>Filter:</span> 
                        <input type="search" class="" placeholder="Type to filter...">
                    </label>
                </div>
                <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>
                        <span>Show:</span> 
                        <select name="DataTables_Table_0_length" class="custom-select" wire:model.live="paginate">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="datatable-scroll">
                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid"
                    aria-describedby="DataTables_Table_0_info">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="column" class="text-left">Fullname</th>
                            <th scope="column" class="text-center">Datetime</th>
                            <th scope="column" class="text-center">Total price</th>
                            <th scope="column" class="text-center">Status</th>
                            <th scope="column" class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($checkouts->count() > 0)
                        @foreach ($checkouts as $value)
                        <tr class="odd">
                            <td class="sorting_1">{{ $value->fullname }}</td>
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
                                <button type="button" class="btn btn-sm btn-primary " data-toggle="modal"
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
            </div>
            <div class="datatable-footer mb-3">
                {{ $checkouts->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
