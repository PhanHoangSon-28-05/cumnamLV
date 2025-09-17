<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title floar-left d-inline">Client</h5>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#crudClientModal">
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
                <table class="table table-striped" id="DataTables_Table_0" role="grid"
                    aria-describedby="DataTables_Table_0_info">
                    <thead class="thead-dark">
                        <tr role="row">
                            <th>S/N</th>
                            <th class="sorting sorting_asc">Numerical order</th>
                            <th class="sorting">Image</th>
                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($post_list) --}}
                        @if (count($clients) > 0)
                            @foreach ($clients as $client)
                                <tr class="odd">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $client->stt }}</td>
                                    <td class="w-50">
                                        <img src="{{ route('storages.image', ['url' => $client->pic]) }}" class="w-25" alt="">
                                        @if ($client->pic2)
                                        <img src="{{ route('storages.image', ['url' => $client->pic2]) }}" class="w-25" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#crudClientModal" data-client-id={{ $client->id }}><i
                                                class="fa-solid fa-pen"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#crudClientModal" data-client-id={{ -$client->id }}><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No Image Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="datatable-footer">

            </div>
        </div>
    </div>
</div>
