<html>
<head>
<title>Upload Form</title>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<form action="salvar" method="POST" enctype="multipart/form-data">
    <input type="text" name="cpf" placeholder="Informe seu CPF"/>
    <br/>
    <!-- <input type="file" name="curriculo"> -->        
    <br/>
    <input type="submit" value="Salvar"/>
</form>

<canvas id="canvas" width=240 height=240 style="background-color:#808080;">
</canvas>
<p></p>
<a id="download" download="myImage.jpg" href="" onclick="download_img(this);">Download to myImage.jpg</a>

<script>
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var ox = canvas.width / 2;
    var oy = canvas.height / 2;
    ctx.font = "42px serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillStyle = "#800";
    ctx.fillRect(ox / 2, oy / 2, ox, oy);

    download_img = function(el) {
        console.log("Invocou o método download_img");
        // get image URI from canvas object
        var imageURI = canvas.toDataURL("image/jpg");
        el.value = imageURI;
    };

    postCanvasToURL();

    function postCanvasToURL(){
        // Convert canvas image to Base64
        var img = canvas.toDataURL("image/jpg");
        // Convert Base64 image to binary
        var file = dataURItoBlob(img);
        console.log(file);
        
        var formdata = new FormData();
        formdata.append("curriculo", file);

        $.ajax({
            url: "salvar",
            type: 'POST',
            data: file,
            processData: false,
            contentType: false,
            }).done(function(respond){
                alert(respond);
        });
    }

    function dataURItoBlob(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);
        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ia], {type:mimeString});
    }

  

</script>

</body>
</html>