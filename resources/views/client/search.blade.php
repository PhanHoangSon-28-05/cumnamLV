<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header p-0" style="">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                    <input type="text" id="myInput" class="form-control" aria-label="Username"
                    aria-describedby="basic-addon1" onkeyup="myFunction()" placeholder="Search for names..">
                </div>

                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body" id="modalBody" style="display: none;"> <!-- Hidden by default -->
                <ul id="myUL">
                    @foreach ($cateChilds as $cateChild)
                    <li class="text-left text-uppercase mb-1 border-bottom border-dark pb-1">
                        <a href="{{ URL::route('home.category', $cateChild->slug) }}" class="text-body">
                            {{ $cateChild->name }}
                        </a>
                    </li>
                    @endforeach
                    @foreach ($products as $product)
                        <li class="custom-list-item text-left text-uppercase mb-1 border-bottom border-dark pb-1">
                            <a href="{{ URL::route('home.products', $product->slug) }}" 
                                class="text-body text-truncate" style="max-width: 250px;">
                                {{ $product->name }}
                            </a>
                            @if ($product->pic != 'null')
                                <img src="{{ route('storages.image', ['url' => $product->pic]) }}" class="ml-auto"
                                    style="width: 100px; height: auto;">
                            @else
                                <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" class="ml-auto"
                                    style="width: 150px; height: auto;">
                            @endif
                        </li>
                    @endforeach
                    @foreach ($posts as $post)
                        @if ($post->category)
                            <li class="custom-list-item text-left text-uppercase mb-1 border-bottom border-dark pb-1">
                                <a href="{{ URL::route('home.post', ['slug' => $post->category->slug, 'post' => $post->slug]) }}"
                                    class="text-body text-truncate" style="max-width: 250px;">{{ $post->name }}</a>
                                @if ($post->pic != 'null')
                                    <img src="{{ route('storages.image', ['url' => $post->pic]) }}" class="ml-auto"
                                        style="width: 100px; height: auto;">
                                @else
                                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" class="ml-auto"
                                        style="width: 150px; height: auto;">
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('li');
        var modalBody = document.getElementById('modalBody'); // Get the modal body

        // Show or hide modal body based on input value
        if (input.value.trim() === "") {
            modalBody.style.display = "none";
        } else {
            modalBody.style.display = "block";
        }

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    // Ensure modal body is hidden when the modal opens initially
    document.getElementById('exampleModal').addEventListener('show.bs.modal', function() {
        document.getElementById('modalBody').style.display = "none";
    });
</script>
@endpush
