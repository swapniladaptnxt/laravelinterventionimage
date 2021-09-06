<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="margin-top: 40px; text-align: center;">
    <div>
        <img src="{{ $new_image }}" alt="Watermark">

        <button type="button" class="btn btn-success">Download</button>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.5.9/script.min.js"></script>
<script>
    let btnDownload = document.querySelector('button');
    let img = document.querySelector('img');
    btnDownload.addEventListener('click', () => {
        let imagePath = img.getAttribute('src');
        let fileName = getFileName(imagePath);
        saveAs(imagePath, fileName);
    });

    function getFileName(str) {
        return str.substring(str.lastIndexOf('/') + 1)
    }
</script>

</html>
