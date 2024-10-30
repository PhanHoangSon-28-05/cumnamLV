<div>
    <div class="card-header">
        <h2 class="card-title">Info Footer
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
            <div class="container-fluid my-md-5 mt-2">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Title 1:</label>
                            <input type="text" wire:model.lazy="title1" class="form-control">
                        </div>
                        <h3>Of the title {{ $title1 }}</h3>
                        <div class="form-group">
                            <label>Content 1</label>
                            <input type="text" wire:model.lazy="content11" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Content 2</label>
                            <input type="text" wire:model.lazy="content12" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Content 3</label>
                            <input type="text" wire:model.lazy="content13" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Content 4</label>
                            <input type="text" wire:model.lazy="content14" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-12 connect">
                        <div class="form-group">
                            <label>Title 2:</label>
                            <input type="text" wire:model.lazy="title2" class="form-control">
                        </div>
                        <h3>Of the title {{ $title2 }}</h3>
                        <div class="form-group">
                            <label><i class="fa-solid fa-camera-retro"></i></label>
                            <input type="text" wire:model.lazy="content21" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa-solid fa-phone"></i></label>
                            <input type="text" wire:model.lazy="content22" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa-brands fa-facebook-messenger"></i></label>
                            <input type="text" wire:model.lazy="content23" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Title 3:</label>
                            <input type="text" wire:model.lazy="title3" class="form-control">
                        </div>
                        <h3>Of the title {{ $title3 }}</h3>
                        <div class="form-group">
                            <label>Content 1</label>
                            <input type="text" wire:model.lazy="content31" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <button type="submit" class="btn btn-primary bd-highlight">Submit <i
                    class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
