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
                        <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0">
                    </label>
                </div>
                <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>
                        <span>Show:</span> 
                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" 
                        class="custom-select" wire:model.live="paginate">
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
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                Fullname
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="Datetime: activate to sort column ascending">
                                Datetime
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="Total price: activate to sort column ascending">
                                Total price
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="Total price: activate to sort column ascending">
                                Status
                            </th>
                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($checkouts->count() > 0)
                        @foreach ($checkouts as $value)
                        <tr class="odd">
                            <td class="sorting_1">{{ $value->fullname }}</td>
                            <td class="text-center">{{ $value->created_at }}</td>
                            <td class="text-center">${{ $value->total_price }}</td>
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
