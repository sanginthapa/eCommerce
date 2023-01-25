<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <title>File Upload</title>
</head>
<body>
<!-- upload file form -->
<!-- upload file form -->
<form action="#" method="post" enctype="multipart/form-data">
    <div class="col-12 p-5" style="background:white; border:1px solid black">
    <input type="file" name="fileupload" id="fileupload">
    <input type="submit" id="upload-button" onclick="uploadFile();">
</div>
</form>
<!-- upload file form -->
<!-- upload file form -->

<script>
    async function uploadFile(){
        let formData = new FormData();
        formData.append("file",fileupload.files[0]);
        await fetch('upload.php', {method:"POST", body:formData});
        alert("File has been upload successfully");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>