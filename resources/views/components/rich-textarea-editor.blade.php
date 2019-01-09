@push('css')
    <!-- include summernote css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

    <style>
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #F5F5F5 !important;
            border-color: #dee2e6 #dee2e6 #fff;
            border-bottom: 1px solid #F5F5F5;
            border-radius: 0px;
        }
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius:0px;
            border-top-right-radius:0px;
        }
        .note-editor.note-frame {
            border: 1px  solid #dee2e6 !important;
            /*border-top: none !important;*/
        }
    </style>
@endpush

@push('scripts')
    <!-- include summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script>
        $(document).ready(function(){
            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/admin/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            }
            //
            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({type: 'file', prefix: '/admin/laravel-filemanager'}, function(lfmItems, path) {
                            lfmItems.forEach(function (lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            }

            $('.summernote').summernote({
                placeholder: "Type anything here...",
                tabsize: 2,
                height: 350,
                buttons: {
                    lfm: LFMButton
                },
                toolbar: [
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'lfm', 'hr']],
                    ['table', ['table']]
                ],
                callbacks: {
                    // callback for pasting text only (no formatting)
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        bufferText = bufferText.replace(/\r?\n/g, '<br>');
                        document.execCommand('insertHtml', false, bufferText);
                    }
                },
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '24', '36', '48' , '64', '82', '150'],
                hint: {
                    mentions: {!! !empty($option) ? $option : '[]' !!},
                    match: /\B@(\w*)$/,
                    search: function (keyword, callback) {
                        callback($.grep(this.mentions, function (item) {
                            return item.indexOf(keyword) == 0;
                        }));
                    },
                    content: function (item) {
                        return '@' + item;
                    }
                }
            });

            $('.dropdown-toggle').dropdown()
        });
    </script>
@endpush