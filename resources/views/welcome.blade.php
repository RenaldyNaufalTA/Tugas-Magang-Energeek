<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 8 Dropzone Image Upload</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="../../assets/penerimaanpegawai.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    </head>
    <body>
        <form id="upload" enctype="multipart/form-data">
            <input type="text" name="name" value="somename">
            <input type="checkbox" name="terms_agreed">
            <div id="previewsContainer" class="dropzone">
              <div class="dz-default dz-message">
                <button class="dz-button" type="button">
                  Drop files here to upload
                </button>
              </div>
            </div>
            <input id="dz-submit" type="submit" value="submit">
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
        <script>Dropzone.autoDiscover = false;
        new Dropzone("#upload",{
      clickable: ".dropzone",
      url: "upload.php",
      previewsContainer: "#previewsContainer",
      uploadMultiple: true,
      autoProcessQueue: false,
      init() {
        var myDropzone = this;
        this.element.querySelector("[type=submit]").addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          myDropzone.processQueue();
        });
      }
    });</script>


    </body>
</html>
