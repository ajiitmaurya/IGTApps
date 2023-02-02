<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Image Upload with Preview</h2>
        <form method="POST" enctype="multipart/form-data" action="image" id="image-upload">
            <div class="row" style="text-align: -webkit-center;justify-content: space-evenly;">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="preview image" style="max-height: 250px;">
                </div>
                <p style="color: red; display:none" id="img_err">Only Jpeg format Allowed</p>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Upload Image</button>
                </div>
            </div>
        </form>
        @if(!empty($path))
        <div class="col-md-12" style="margin-top: 200px;text-align: -webkit-center;">
            <h2>Recent Upload Image</h2>
            <img src="{{asset('get-image/'.$path)}}" alt="preview image" style="max-height: 250px;">
        </div>
        @endif
    </div>
    <script type="text/javascript">
        $(document).ready(function(e) {
            let image_valid = false;
            $('#submit').hide();
            $('#image').change(function() {
                let reader = new FileReader();
                if (this.files[0].type == 'image/jpeg') {
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    image_valid = true;
                    $('#img_err').css('display', 'none');
                    $('#submit').show();
                } else {
                    $('#img_err').css('display', 'flex');
                    image_valid = false;
                    $('#submit').hide();
                }
            });
        });
    </script>
    </div>
</body>

</html>