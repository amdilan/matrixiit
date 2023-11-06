<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--<script src="./jquery/jquery-3.7.1.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn_upload").click(function() {
                const ULStat = document.getElementById("upload_status")
                const file = document.getElementById("input_file").files[0];
                if (file){
                    if (file.size > 2*1024*1024){
                        ULStat.innerHTML = "File size exceeds 2MB limit.";
                    } else {
                        const formData = new FormData();
                        formData.append("file", file);

                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "fileupload-backend.php", true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                ULStat.innerHTML = xhr.responseText;
                            }
                        };
                        xhr.send(formData);
                    }
                } else {
                    ULStat.innerHTML = "Please select a file to upload."
                }
            });
        });
    </script>
</head>
<body>
    <form id="file_upload_form" enctype="multipart/form-data">
        <input type="file" id="input_file" name="file"> <br/>
        <button type="button" id="btn_upload">Upload File</button>
    </form>
    <div id="upload_status"></div>
</body>
</html>