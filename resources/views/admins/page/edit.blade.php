@extends('admins.layout.master')
@section('title', 'Page')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/grapesjs@0.22.5/dist/css/grapes.min.css">
    {{-- <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css"> --}}
    <style>
        .content-page {
            margin: 0;
            font-family: sans-serif;
            display: flex;
        }

        #blocks {
            width: 250px;
            height: 100vh;
            overflow-y: auto;
            background: #f7f7f7;
            padding: 10px;
        }

        #gjs {
            flex-grow: 1;
            height: 100vh;
            border-left: 1px solid #ddd;
        }

        #actions {
            position: fixed;
            bottom: 10px;
            left: 260px;
        }

        button {
            margin: 5px;
            padding: 8px 15px;
            cursor: pointer;
            border: none;
            background: #28a745;
            color: white;
        }
    </style>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('pages.index') }}" class="breadcrumb-item">Page</a>
                    <a href="#" class="breadcrumb-item">Edit Page</a>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="title text-capitalize" id="exampleModalLabel">
                    Edit Page {{ $page->cate->name }}
                </h5>
            </div>

            <div class="body">
                <div class="container-fluid">
                    <div class="row px-3 mb-3">
                        <label class="crud-label p-0 mt-2 mb-0">Description:</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control crud-input" name="description">{{ $page->description }}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row px-3 mb-3">
                        <label class="crud-label p-0 mt-2 mb-0">Content:</label>
                    </div>
                    <div class="content-page">
                        <div id="blocks"></div>
                        <div id="gjs"></div>
                    </div>
                </div>
            </div>
            <div class="footer px-3 mt-2 mb-1">
                <button class="btn btn-primary" id="save-page">
                    Update
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="{{ URL::asset('block-basic.js') }}"></script>
    <script src="https://unpkg.com/grapesjs-plugin-forms"></script>
    <script src="https://unpkg.com/grapesjs-preset-newsletter"></script>
    <script src="https://unpkg.com/grapesjs-component-countdown"></script>
    <script src="https://unpkg.com/grapesjs-plugin-ckeditor"></script>
    <script src="https://unpkg.com/grapesjs-tui-image-editor"></script>
    <script>
        // const editor = grapesjs.init({
        //     container: '#gjs',
        //     fromElement: true,
        //     height: '100vh',
        //     width: 'calc(100% - 260px)',
        //     fromElement: true,
        //     storageManager: false,
        //     blockManager: {
        //         appendTo: '#blocks'
        //     },
        //     plugins: ['gjs-blocks-basic', 'grapesjs-preset-newsletter', 'grapesjs-component-countdown',
        //         'grapesjs-plugin-forms', 'grapesjs-plugin-ckeditor', 'grapesjs-tui-image-editor'
        //     ],
        //     pluginsOpts: {
        //         'gjs-blocks-basic': {
        //             flexGrid: true, // Bật lưới flexbox
        //             blocks: ['text', 'quote', 'link', 'image', 'video', 'map', 'button']
        //         },
        //         'grapesjs-plugin-forms': {
        //             /* ...options */
        //         },
        //         'grapesjs-preset-newsletter': {},
        //         'grapesjs-component-countdown': {},
        //         'grapesjs-plugin-ckeditor': {},
        //         'grapesjs-tui-image-editor': {}
        //     }
        // });

        const editor = grapesjs.init({
            container: '#gjs',
            fromElement: true,
            height: '100vh',
            width: 'calc(100% - 260px)',
            storageManager: false,
            blockManager: {
                appendTo: '#blocks'
            },
            plugins: ['gjs-blocks-basic', 'grapesjs-preset-newsletter', 'grapesjs-component-countdown',
                'grapesjs-plugin-forms', 'grapesjs-plugin-ckeditor', 'grapesjs-tui-image-editor'
            ],
            pluginsOpts: {
                'gjs-blocks-basic': {
                    flexGrid: true,
                    blocks: ['text', 'quote', 'link', 'image', 'video', 'map', 'button']
                },
                // Các tùy chọn plugin khác
            }
        });

        // Nạp nội dung đã lưu vào trình chỉnh sửa
        let pageId = "{{ $page->id }}";
        let pageContent = `{!! addslashes($page->content) !!}`;

        if (pageContent) {
            editor.setComponents(pageContent);
        }
        document.getElementById('save-page').addEventListener('click', function() {
            // Kiểm tra xem editor đã được khởi tạo chưa
            if (!editor) {
                console.error("Editor is not initialized.");
                return;
            }

            setTimeout(() => {
                const content = editor.runCommand('gjs-get-inlined-html');
                // const content = editor.getHtml(); // Lấy nội dung HTML
                console.log("-----" + content + "-----");

                const description = document.querySelector('textarea[name="description"]')
                    .value;
                const pageId = "{{ $page->id }}";


                if (!content) {
                    alert("Invalid content. Please check again.");
                    return;
                }

                fetch(`/admin/pages/${pageId}/save-page`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            description: description,
                            content: content
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert("Page Update Successfully!");
                            window.location.href = "{{ route('pages.index') }}";
                        } else {
                            alert("An error occurred while updating!");
                        }
                    })
                    .catch(error => console.error("ERRO:", error));
            }, 100); // Thời gian chờ 100ms
        });
    </script>
@endsection
