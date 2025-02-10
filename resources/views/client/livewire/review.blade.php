<!-- Modal -->
@push('style')
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <style>
        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
@endpush
<div class="modal fade" id="imageProductReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel" wire:loading.remove wire:target="getData">
                    Review:
                </h1>
                <button type="button" class="close" data-dismiss="modal">×</button> --}}

            </div>

            <div class="modal-body">
                <div class="row flex-row-reverse">
                    <div
                        class="
                    @if ($action == 'create') col-md-12
                     @elseif ($action == 'update')
                        col-md-4 @endif">
                        <form wire:submit.prevent="updateImage">
                            <div class="">
                                <label class="crud-label">Add photos (Max: 20 photos)</label>
                                <div class="input-group mb-3">
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{ $image->temporaryUrl() }}" class="w-25 mb-2">
                                        @endforeach
                                    @endif
                                    <input type="file" class="form-control" multiple hidden id="cover_img"
                                        wire:model="images" rules="mimes:jpeg,png">
                                    <label for="cover_img" class="shadow mt-2 w-25">
                                        <img src="{{ asset($cover_img) }}" alt="" class="w-100"
                                            id="image-preview">
                                    </label>
                                </div>
                                @error('images.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                        </form>
                    </div>
                    @if ($action == 'create')
                    @elseif ($action == 'update')
                        <div class="col-md-12" wire:ignore.self wire:loading.remove>
                            @if ($this->review_id != null)
                                <div id="imageReviewData" class="row">
                                    {{-- @dd($imagesData) --}}
                                    @if (isset($imagesData))
                                        @foreach ($imagesData as $image)
                                            <div class="d-inline mb-2">
                                                <div class="col-3">
                                                    <div class="shadow rounded">
                                                        {{-- <img src="{{ URL::asset('storage/'.$image->image) }}" alt="" width="100px"> --}}
                                                        <img src="{{ route('storages.image', ['url' => $image->image]) }}"
                                                            alt="" width="100px">
                                                        <div class="d-flex flex-row bd-highlight">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger bd-highlight"
                                                                wire:click="deleteImage({{ $image->id }})">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    @else
                    @endif

                </div>

            </div>

            <div class="modal-footer">
                <div class="col-12 text-center ">
                    <form wire:submit.prevent="{{ $action }}">
                        <div class="stars">
                            <div class="mb-3">
                                <input class="star star-5" id="star-5" type="radio" value="5"
                                    wire:model="star" />
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" value="4"
                                    wire:model="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" value="3"
                                    wire:model="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" value="2"
                                    wire:model="star" />
                                <label class="star star-2" for="star-2"></label>

                                <input class="star star-1" id="star-1" type="radio" value="1"
                                    wire:model="star" />
                                <label class="star star-1" for="star-1"></label>
                            </div>
                            @error('star')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 pr-1">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                    aria-label="Recipient's username" wire:model.lazy="name">
                            </div>
                            <div class="col-6 pl-1">
                                <input type="text" class="form-control" placeholder="Recipient's email"
                                    aria-label="Recipient's email" wire:model.lazy="email">
                            </div>
                        </div>

                        <div class="">
                            <textarea name="" id="" cols="30" rows="3" class="mt-1 w-100 form-control"
                                placeholder="Content" wire:model.lazy="content"></textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#imageProductReview').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-review-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudReview', function() {
                $('#imageProductReview').modal('hide')
            })
            Livewire.on('clearFileInput', function() {
                $('#imageUpload').val('');
            })
        });
    </script>
    <script>
        window.addEventListener('notify', event => {
            alert(event.detail[1]); // Hiển thị thông báo
        });
    </script>
@endpush
