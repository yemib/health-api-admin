@extends('admin_folder/index')
@section('content')
    <?php
    use App\servicess;
    
    if (isset($edit)) {
    }
    
    ?>


    <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add Blog</h3>
            </div>
            <div class="panel-body">

                <a class="btn btn-primary" href="/newsletters"> blog List </a>



                <form method="post"
                    action="@if (isset($service)) /newsletters/{{ $service->id }}  @else /newsletters @endif"
                    enctype="multipart/form-data" id="blog_form">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label>Title</label>
                        <input required type="text" class="form-control" placeholder="Title"
                            value="@if (isset($service)) {{ $service->title }} @endif" name="title">
                    </div>


                    <div class="form-group">
                        <label>Body</label>

                        {{-- <button type="button" id="add-table">Insert Table</button> --}}
                        <div id="editor-container" style="height: 300px;"></div>

                        <textarea style="display: none" id="tex" name="body" class="form-control" placeholder="Service Body"></textarea>


                    </div>





                    <div class="form-group">

                        <div id="preview"
                            @if (isset($service)) style="background-image: url({{ $service->image }}); height: 200px" @endif>
                        </div>


                        <input id="pre_input" type="hidden" name="image" />


                        <label class="btn btn-primary" for="file-input">Upload Featured Image</label>



                        <div class="checkbox">

                            <?php  if(isset($service)) { ?>

                            <label>

                                <input name="publish" value="yes" @if ($service->publish == 'yes') checked @endif
                                    type="checkbox"> Published
                            </label>


                            <?php   } else{   ?>

                            <label><input name="publish" value="yes" type="checkbox" checked> Published</label>

                            <?php   } ?>
                        </div>


                        <input type="file" style="display: none" id="file-input" name="picture">
                    </div>


                    <?php  if(isset($service)) { ?>

                    <input type="hidden" name="_method" value="PUT" />

                    <input onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"
                        onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')" class="btn btn-success"
                        type="Submit" value="Update" />




                    <?php  }else{    ?>

                    <input onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"
                        onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')" class="btn btn-success"
                        type="Submit" value="Submit" />




                    <input type="reset" class="btn btn-danger" value="Reset" onClick="$('#preview').hide()">




                    <?php    } ?>

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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editorContainer = document.getElementById('editor-container');

        if (!editorContainer) {
            console.error("Editor container not found.");
            return;
        }

        const quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean'],
                    ['link', 'image', 'video']
                    // Removed 'audio' and 'document' to avoid warnings
                ],
              /*   imageResize: {
                    modules: ['Resize', 'DisplaySize', 'Toolbar']
                } */
            }
        });

        // Image upload handler
        const toolbar = quill.getModule('toolbar');
        toolbar.addHandler('image', function () {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = function () {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const range = quill.getSelection(true);
                        quill.insertEmbed(range.index, 'image', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            };
        });

        // Submit handler: sync Quill content with textarea
        const form = document.querySelector('#blog_form');
        form.addEventListener('submit', function () {
            const body = document.querySelector('textarea[name=body]');
            body.value = quill.root.innerHTML;
        });

        // If editing, set initial content
        @if (isset($service))
            quill.root.innerHTML = @json($service->body);
        @endif
    });
</script>
@endsection

