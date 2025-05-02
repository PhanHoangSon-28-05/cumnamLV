const images_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();

    xhr.withCredentials = false;

    xhr.open('POST', '/upload');

    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
    };

    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
        }

        resolve(json.location);
    };

    xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    const formData = new FormData();

    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
});

const setup = (editor) => {
    editor.on('init', function(args) {
        editor = args.target;

        editor.on('NodeChange', function(e) {
            if (e && e.element.nodeName.toLowerCase() == 'img') {
                var container_width = $(editor.container).find('iframe').contents().find('body').width();
                var image_width = e.element.width;
                if (image_width > container_width) {
                    tinyMCE.DOM.setAttribs(e.element, {'width': '100%', 'height': 'auto'});
                }
            }
        });
    });
};

const options = {
    selector: ".editor",
    license_key: 'gpl',
    theme: "silver",
    width: 'auto',
    min_height: 500,
    promotion: false,
    plugins: ['image', 'code', 'lists', 'link', 'anchor', 'autoresize'],
    toolbar1:   ` undo redo | bold italic underline | alignleft aligncenter alignright alignjustify 
                | bullist numlist outdent indent | styles `,
    toolbar2:   `link unlink anchor | image media | forecolor backcolor | code`,
    // image_prepend_url: location.origin,
    relative_urls : false,
    content_style: 'body{overflow-x:hidden}',
    images_upload_handler: images_upload_handler,
    setup: setup,
};