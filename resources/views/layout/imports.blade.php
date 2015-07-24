<script src="{{url('/')}}/scripts/jquery-2.1.1.min.js"></script>
<script src="{{url('/')}}/scripts/jquery-ui.min.js"></script>
<script src="{{url('/')}}/scripts/bootstrap.min.js"></script>
<script src="{{url('/')}}/scripts/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/scripts/lean-slider.js"></script>
<link href="{{url('/')}}/styles/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url('/')}}/styles/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url('/')}}/styles/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url('/')}}/styles/lean-slider.css" rel="stylesheet" type="text/css"/>
<link href="{{url('/')}}/styles/sample-styles.css" rel="stylesheet" type="text/css"/>
<script>
    /**
     * Laravel wants the csrf_token to come with the post requests,
     *
     * Hence, append it to the upload request,
     *
     * ref: ckeditor samples, dialog samples and console.log
     */
    CKEDITOR.on('dialogDefinition', function (ev) {

        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;

        if (dialogName == 'image') {
            var uploadTab = dialogDefinition.getContents('Upload');
            var upload = uploadTab.get('upload');
            //appennding the csrf token to the upload request....
            //Took me a while to figure it out, but thanks to console.log(dialogDefinition),
            // i got it done!
            upload.action += '&_token={!! csrf_token() !!}';

            upload.add({
                type:'text'
                id:'_description'
            })
        }
    });
</script>