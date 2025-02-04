<section id="appointment">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{ URL::asset('view/style/images/hinh-3.jpg') }}" alt="">
            </div>
            @csrf
            <div class="col-md-6 col-12">
                <form action="{{ route('send-email') }}" method="POST">
                    @csrf
                    <h3 class="font-weight-bold text-center h1">Free in-home appointment</h3>
                    <p class="text-center">Meet our guys to explore our collections, fabrics and color ​options</p>
                    <div class="input">
                        <label for="">Full name (Required)</label>
                        <input type="text" name="fullname" required>
                    </div>
                    <div class="input">
                        <label for="">Email (required)</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input">
                        <label for="">Message</label>
                        <textarea class="message" type="text" name="message" required></textarea>
                    </div>
                    <div class="send text-center">
                        {{-- <button type="submit" class="btn btn-primary rounded-pill mt-md-0 mt-2 text-white bg-dark border border-dark">
                            SEND
                        </button> --}}
                        <button type="submit" class="btn btn-primary rounded-pill mt-md-0 mt-2">
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
