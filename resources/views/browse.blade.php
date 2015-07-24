<?php

//{{--$funcNum = $_REQUEST['CKEditorFuncNum'];--}}

?>
<html>
<head>
    <title>Meda - Image Browser</title>
    @include('layout.imports')
</head>
<body class="container">
<div class="row">
    <h1>Image Browser
        <small>Click on image you want to insert</small>
    </h1>
</div>
<div class="row">
    @forelse($images as $image)
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img class="insert" src="{{url("/uploaded_images/$image->id")}}">

                <div class="caption">
                    <p>Discription of the image</p>

                    <p>
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary select" role="button"
                           data-src="{{url("/uploaded_images/$image->id")}}">Select</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default preview" role="button"
                           data-src="{{url("/uploaded_images/$image->id")}}">Preview</a>
                    </p>
                </div>
            </div>
        </div>
    @empty
        <h1>Sorry, No images were found on our servers.</h1>
        @endforelse

                <!-- Modal -->
        <div class="modal fade" id="image_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <img class="img-responsive item" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary select">Select</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    var select = function () {
        window.opener.CKEDITOR.tools.callFunction({{$_REQUEST['CKEditorFuncNum'] or 0}}, $(this).attr('data-src'))
        window.close();
    }

    $('.select').click(select);

    $('.thumbnail .preview').click(function () {

        var $imagePopup = $('#image_popup');
        $imagePopup.find('img.item').attr('src', $(this).attr('data-src'));
        $imagePopup.find('button.select').click(select).attr('data-src', $(this).attr('data-src'));
        $imagePopup.modal('show');
    });
</script>
</body>
</html>