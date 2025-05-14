@extends('admin_folder/index')

@section('content')
<?php use App\servicess; ?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Add Blog</h3>
        </div>
        <div class="panel-body">
            <a class="btn btn-primary" href="/newsletters">Blog List</a>

            <form method="post"
                  action="@if (isset($service)) /newsletters/{{ $service->id }} @else /newsletters @endif"
                  enctype="multipart/form-data" id="blog_form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Title</label>
                    <input required type="text" class="form-control" placeholder="Title"
                           value="@if (isset($service)) {{ $service->title }} @endif" name="title">
                </div>

                <div class="form-group">
                    <label>Body</label>
                    <textarea  id="editor" name="editorContent" class="form-control" placeholder="Body"></textarea>
                    <textarea style="display: none" id="tex" name="body"></textarea>
                </div>

                <div class="form-group">
                    <div id="preview"
                         @if (isset($service)) style="background-image: url({{ $service->image }}); height: 200px" @endif>
                    </div>

                    <input id="pre_input" type="hidden" name="image" />
                    <label class="btn btn-primary" for="file-input">Upload Featured Image</label>

                    <div class="checkbox">
                        @if (isset($service))
                            <label>
                                <input name="publish" value="yes" @if ($service->publish == 'yes') checked @endif type="checkbox"> Published
                            </label>
                        @else
                            <label>
                                <input name="publish" value="yes" type="checkbox" checked> Published
                            </label>
                        @endif
                    </div>

                    <input type="file" style="display: none" id="file-input" name="picture">
                </div>

                @if (isset($service))
                    <input type="hidden" name="_method" value="PUT" />
                    <input onclick="syncEditorContent()" class="btn btn-success" type="submit" value="Update" />
                @else
                    <input onclick="syncEditorContent()" class="btn btn-success" type="submit" value="Submit" />
                    <input type="reset" class="btn btn-danger" value="Reset" onclick="$('#preview').hide()">
                @endif
            </form>

            <form id="form_id" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="others" type="file" style="display: none" id="file-article" class="file-article">
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    let editorInstance;

    function syncEditorContent() {
        const html = editorInstance.getData();
        document.querySelector('#tex').value = html;
    }

    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#editor'), {

                

                toolbar: {
          items: [
            'undo', 'redo',
            '|',
            'findAndReplace', 'selectAll',
            '|',
            'bold', 'italic', 'underline',
            '|',
            'fontColor', 'fontBackgroundColor', 'fontSize',
            '|',
            'heading', 'style',
            '|',
            'bulletedList', 'numberedList', 'todoList',
            '|',
            'outdent', 'indent',
            '|',
            'alignment',
            '|',
            'link', 'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed',
            '|',
            'horizontalLine', 'specialCharacters',
            '|',
            'fullscreen',
            '|',
            'pdfExport',       // Placeholder for PDF Export plugin
            'wproofreader'     // Placeholder for WProofreader integration
          ]
        },
               
                
                extraPlugins: [Base64UploadAdapterPlugin],
                mediaEmbed: {
                    previewsInData: true
                },
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:alignLeft',
                        'imageStyle:alignCenter',
                        'imageStyle:alignRight',
                        'imageResize'
                    ],
                    styles: [
                        'alignLeft', 'alignCenter', 'alignRight'
                    ],
                    resizeOptions: [
                        {
                            name: 'resizeImage:original',
                            label: 'Original',
                            value: null
                        },
                        {
                            name: 'resizeImage:50',
                            label: '50%',
                            value: '50'
                        },
                        {
                            name: 'resizeImage:75',
                            label: '75%',
                            value: '75'
                        }
                    ],
                    resizeUnit: '%',
                   
                }
            })
            .then(editor => {
                editorInstance = editor;

                @if (isset($service))
                    editor.setData(@json($service->body));
                @endif
            })
            .catch(error => {
                console.error(error);
            });

        function Base64UploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new Base64UploadAdapter(loader);
            };
        }

        class Base64UploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.onload = () => resolve({ default: reader.result });
                        reader.onerror = error => reject(error);
                        reader.readAsDataURL(file);
                    }));
            }

            abort() {}
        }
    });
</script>

<style>
    .ck-editor__editable_inline {
        height: 400px; /* Change this value as needed */
    }
</style>
@endsection
