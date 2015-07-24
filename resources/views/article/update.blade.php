


<form method='post' action="" enctype="multipart/form-data">
    {!!csrf_field()!!}
    <input type="file" name="image" />
    <input type="submit"/>
</form>

<?php
    print_r($_FILES);

    if(isset($_FILES['image'])){
        $image = $_FILES['image'];
        $filename = $image['tmp_name'];
        $base64=base64_encode_file($filename);
        echo '<img src="' . $base64  .'"/>';
    }else{
        echo "no file uploaded";
    }
    function base64_encode_file($filename){
        return 'data:'.mime_content_type($filename) . ';base64,' . base64_encode(file_get_contents($filename));
    }
?>
