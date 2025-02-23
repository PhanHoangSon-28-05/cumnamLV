<!-- Content area -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title floar-left d-inline">Page</h5>
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#crudPageModal"
            wire:ignore.self>
            Add New
        </button>
    </div>

    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
        <div class="datatable-scroll">
            <table class="table table-striped" id="DataTables_Table_0" role="grid"
                aria-describedby="DataTables_Table_0_info">
                <thead class="thead-dark">
                    <tr role="row">
                        <th>S/N</th>
                        <th class="sorting sorting_asc">Name</th>
                        <th class="sorting">Picture</th>
                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pages) > 0)
                        @foreach ($pages as $value)
                            <tr class="odd">
                                <td>{{ $loop->iteration }}</td>
                                @if ($value->cate)
                                    <td class="text-capitalize">{{ $value->cate->name }}</td>
                                @else
                                    <td>There are no categories!!!</td>
                                @endif
                                <td scope="row" class="">
                                    <button type="button" class="btn btn-sm rounded-0 btn-success text-uppercase"
                                        data-toggle="modal" data-target="#imagePage" data-page-id={{ $value->id }}
                                        title="List Image">
                                        <i class="fa-regular fa-images"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('pages.edit', $value->id) }}" class="btn btn-sm btn-primary"
                                        title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ route('pages.destroy', $value->id) }}" class="btn btn-sm btn-danger"
                                        title="Delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No Page Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="datatable-footer">

        </div>
    </div>
</div>
