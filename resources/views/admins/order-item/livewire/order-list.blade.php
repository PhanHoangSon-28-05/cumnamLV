<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title floar-left d-inline">Item</h5>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#crudOrderModal"
                wire:ignore.self>
                Add New
            </button>
        </div>

        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input
                            type="search" class="" placeholder="Type to filter..."
                            aria-controls="DataTables_Table_0"></label></div>
                <div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select
                            name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select></label></div>
            </div>
            <div class="datatable-scroll">
                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid"
                    aria-describedby="DataTables_Table_0_info">
                    <thead class="thead-dark">
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-label="Description: activate to sort column ascending">Description
                            </th>
                            <th>Sample photo </th>
                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $value)
                            <tr class="odd">
                                <td class="sorting_1">{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td class="w-25">
                                    <img src="{{ route('storages.image', ['url' => $value->image]) }}" class="w-50"
                                        alt="">
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="modal"
                                        data-target="#crudOrderModal" data-order-id="{{ $value->id }}"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger " data-toggle="modal"
                                        data-target="#crudOrderModal" data-order-id="{{ -$value->id }}"
                                        title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="datatable-footer">

            </div>
        </div>
    </div>
</div>
