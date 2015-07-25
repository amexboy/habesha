@extends('layout.main')

@section('title', 'New Article')

@section('content')
    @parent
    <form action="save" id="article-form">
        {!! csrf_field() !!}

        <label for="title">
            Article Title
        </label>

        <h1><textarea name="title" id="title">Click Here to set the title</textarea></h1>
        <hr/>
        <label for="body">
            Article Content
        </label>
        <textarea cols="80" id="body" name="body" rows="10"
                  style="min-height: 150px">Click here to change the body</textarea>
        {{--<div contenteditable="true" id="body" >Click here to change the body</div>--}}
        <hr/>
        <label for="auto_summery">
            Auto Generate Summery
        </label>
        <input type="checkbox" value="auto_summery" id="auto_summery" name="auto_summery" title="Auto Summery"/>
        <hr/>
        <label for="summery">
            Article Summery
        </label>
        <textarea cols="80" id="summery" name="summery" rows="10">
            Click here to change the summery
        </textarea>

        <button class="btn" id="some">Some</button>
        <input type="submit"/>
    </form>
    <script>
        // Replace the <textarea id="editor1"> with an CKEditor instance.
        CKEDITOR.inline('body', {
            on: {
                change: function (e) {
                    if($("#auto_summery").is(":checked")){
                        console.log(CKEDITOR.instances.summery);
                        CKEDITOR.instances.summery.setData(CKEDITOR.instances.body.getData())
                    }
                }
            }
        });
        CKEDITOR.on('instanceCreated', function (event) {
            var editor = event.editor,
                    element = editor.element;

            if (element.getAttribute('id') == 'title') {

                editor.on('configLoaded', function () {

                    editor.config.removePlugins = 'colorbutton,find,flash,font,' +
                    'forms,iframe,image,newpage,removeformat,' +
                    'smiley,specialchar,stylescombo,templates';

                    // Rearrange the layout of the toolbar.
                    editor.config.toolbarGroups = [
                        {name: 'editing', groups: ['basicstyles', 'links']},
                        {name: 'undo'},
                        {name: 'clipboard', groups: ['selection', 'clipboard']},
                        {name: 'about'}
                    ];
                });
            }
        });

        CKEDITOR.inline('title', {
            on: {
                change: function (e) {
                    console.log($("#body").val())
                }
            }
        });
        CKEDITOR.inline('summery', {
            on: {
                change: function (e) {
                    console.log($("#body").val())
                }
            }
        });
        $("#auto_summery").change(function () {
            CKEDITOR.instances.summery.setReadOnly($(this).is(":checked"))
        });
        $('#some').click(function () {
            CKEDITOR.replace('body', {
                on: {
                    change: function (e) {
                        console.log($("#body").html())
                    }
                }
            });
        });
        $("#article-form").submit(function (e) {
//            e.preventDefault();
//
//            return false;
        });
    </script>

@endsection
