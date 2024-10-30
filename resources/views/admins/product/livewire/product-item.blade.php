<div wire:ignore.self>
    <div id="modal_remote_{{ $id_product }}" class="modal" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $name_pro }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">
                                    Color
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row bd-highlight ">
                                    <div class="text-left">
                                        <a class="btn btn-secondary" data-toggle="collapse" href="#color"
                                            role="button" aria-expanded="false" aria-controls="color"><i
                                                class="fa-regular fa-image"></i></a>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="collapse multi-collapse" id="color">
                                                <div class="card card-body">
                                                    <form wire:submit.prevent="create">
                                                        <div class="modal-body" wire:loading.remove>
                                                            <div class="row">
                                                                <div class="mb-3 col-8 pr-3">
                                                                    <div class="row">
                                                                        <label
                                                                            class="crud-label p-0 mt-2 mb-0">Color:</label>
                                                                        <div class="input-group">
                                                                            <select class="form-control"
                                                                                wire:model="id_color">
                                                                                <option value="0">---</option>
                                                                                @foreach ($colors as $color)
                                                                                    <option value="{{ $color->id }}">
                                                                                        {{ $color->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="crud-label p-0 mt-2 mb-0">Price
                                                                            New:</label>
                                                                        <div class="input-group w-100">
                                                                            <input type="textarea"
                                                                                class="form-control crud-input"
                                                                                wire:model="priceNew">
                                                                        </div>
                                                                        @error('priceNew')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="crud-label p-0 mt-2 mb-0">Price
                                                                            Old:</label>
                                                                        <div class="input-group w-100">
                                                                            <input type="textarea"
                                                                                class="form-control crud-input"
                                                                                wire:model="priceOld">
                                                                        </div>
                                                                        @error('priceOld')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">
                                                            Save
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($orders as $value)
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="mb-0">
                                        {{ $value->name }}
                                    </h2>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="text-left">
                                            <a class="btn btn-secondary" data-toggle="collapse"
                                                href="#{{ $value->slug }}" role="button" aria-expanded="false"
                                                aria-controls="{{ $value->slug }}"><i
                                                    class="fa-regular fa-image"></i></a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="collapse multi-collapse" id="{{ $value->slug }}">
                                                    <div class="card card-body">
                                                        <form wire:submit.prevent="create">
                                                            <div class="modal-body" wire:loading.remove>
                                                                <div class="row">
                                                                    <div class="mb-3 col-8 pr-3">
                                                                        <div class="row">
                                                                            <label
                                                                                class="crud-label p-0 mt-2 mb-0">Name:</label>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    class="form-control crud-input"
                                                                                    wire:model="name">
                                                                            </div>
                                                                            @error('name')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="row">
                                                                            <label
                                                                                class="crud-label p-0 mt-2 mb-0">Price
                                                                                New:</label>
                                                                            <div class="input-group w-100">
                                                                                <input type="textarea"
                                                                                    class="form-control crud-input"
                                                                                    wire:model="priceNew">
                                                                            </div>
                                                                            @error('priceNew')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="row">
                                                                            <label
                                                                                class="crud-label p-0 mt-2 mb-0">Price
                                                                                Old:</label>
                                                                            <div class="input-group w-100">
                                                                                <input type="textarea"
                                                                                    class="form-control crud-input"
                                                                                    wire:model="priceOld">
                                                                            </div>
                                                                            @error('priceOld')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 col-4">
                                                                        <div class="row">
                                                                            <label class="crud-label p-0 mb-0">Sample
                                                                                photo:</label>
                                                                            <div class="input-group">
                                                                                <input type="file"
                                                                                    wire:model="image" hidden
                                                                                    id="cover_img">
                                                                                <label for="cover_img"
                                                                                    class="w-100 border shadow mt-2">
                                                                                    <img src="{{ asset($cover_img) }}"
                                                                                        alt="" class="w-100"
                                                                                        id="image-preview">
                                                                                </label>
                                                                            </div>
                                                                            @error('image')
                                                                                <span
                                                                                    class="error">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                Save
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
