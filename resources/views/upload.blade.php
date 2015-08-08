@extends('layout.main')

@section('title', "Upload")

@section('content')

    <div id="uploader-container">

    </div>

    <script>
        $(document).ready(function () {
            //create and attach an Uploader to the body
            $('#uploader-container').uploader(
                    {
                        imageUploadUrl: '//amanu/lar/public/images/temp/upload',
                        saveUrl: '//amanu/lar/public/images/temp/save',
                        data: {'_token': '{{csrf_token()}}'},
                        inputs: [{
                            label: 'Description',
                            name: 'description',
                            html: '<div contentEditable="true">Click Here To add a description</div>',
                            callback: function ($element) {
                                $element.ckeditor()
                            },
                            value: function ($element) {
                                return $element.html();
                            }
                        }, {
                            label: 'Alt',
                            name: 'alt',
                            type: 'text'
                        }]
                    });

        })
    </script>

@endsection