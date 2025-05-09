<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <h3 class="font-weight-bold text-center w-100 mb-3">Log into your account</h3>
                <form action="{{ route('account.login') }}" method="POST" class="modal-form">
                    @method("post")
                    @csrf
                    <div class="row mb-2">
                        <div class="input col">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input col">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col send text-center">
                            <button type="submit" class="btn btn-primary rounded-pill mt-md-0 mt-2">
                                LOGIN
                            </button>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col text-center">
                            <a href="#!" class="open-register">
                                Don't have an account yet?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <h3 class="font-weight-bold text-center w-100 mb-3">Create your new account</h3>
                <form action="{{ route('account.register') }}" method="POST" class="modal-form" onsubmit="return validate(this)">
                    @method("post")
                    @csrf
                    <div class="row mb-2">
                        <div class="input col">
                            <label>Fullname</label>
                            <input type="text" name="fullname">
                        </div>
                        <div class="input col">
                            <label>Email</label>
                            <input type="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input col">
                            <label>Phone</label>
                            <input type="number" name="phone">
                        </div>
                        <div class="input col">
                            <label>Address</label>
                            <input type="text" name="address">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input col">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input col">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col send text-center">
                            <button type="submit" class="btn btn-primary rounded-pill mt-md-0 mt-2">
                                REGISTER
                            </button>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col text-center">
                            <a href="#!" class="open-login">
                                Already have an account?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

@push('script')

<script>
    $(document).ready(function() {
        $('.open-register').on('click', function(e) {
            e.preventDefault();
            $(e.target).blur();
            $('#loginModal').modal('hide');
            $('#registerModal').modal('show');
        });

        $('.open-login').on('click', function(e) {
            e.preventDefault();
            $('#registerModal').modal('hide');
            $('#loginModal').modal('show');
        });
    });

    function validate(form) {
        var validated = true;
        var inputs = $(form).find('.input input');

        inputs.removeClass('has-error');

        inputs.each((index, input) => {
            if (input.value == '') {
                validated = false;

                $(input).addClass('has-error');

                new Noty({
                    type: 'error',
                    text: 'This field is required!',
                }).show();

                return;
            }

            if ($(input).attr('name') == "password_confirmation" && $(form).find('input[name="password"]').val() != input.value) {
                validated = false;

                $(input).addClass('has-error');

                new Noty({
                    type: 'error',
                    text: 'Password much be matched!',
                }).show();
            }
        });

        return validated;
    }
</script>
@endpush