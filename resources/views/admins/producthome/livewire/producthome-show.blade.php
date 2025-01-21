<div class="card">
    <div class="card-header">
        <h2 class="card-title">Product Homne
        </h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-styled-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="update">
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" wire:model.lazy="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="text" wire:model.lazy="content" class="form-control">
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-primary bd-highlight">Submit <i
                        class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </form>
</div>
