<div class="card">
    {{-- <div class="card-header">
        <h2 class="card-title">Site Config</h2>
    </div> --}}

    @if (session('success'))
        <div class="alert alert-success alert-styled-left alert-dismissible mb-3">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="update">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-4 border-right border-dark">
                    <h2>Site Infomations</h2>

                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" wire:model.lazy="company_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" wire:model.lazy="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" wire:model.lazy="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" wire:model.lazy="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Copyright</label>
                        <input type="text" wire:model.lazy="copyright" class="form-control">
                    </div>
                </div>
                <div class="col-4 border-right border-dark">
                    <h2>Promotion and Taxes</h2>

                    <div class="form-group">
                        <label>Promotion</label>
                        <input type="text" wire:model.lazy="promotion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>State Tax</label>
                        <input type="text" wire:model.lazy="state_tax" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>City Tax</label>
                        <input type="text" wire:model.lazy="city_tax" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <h2>Socical Medias</h2>

                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" wire:model.lazy="instagram" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" wire:model.lazy="facebook" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pinterest</label>
                        <input type="text" wire:model.lazy="pinterest" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">
                        Save 
                        <i class="icon-paperplane ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
