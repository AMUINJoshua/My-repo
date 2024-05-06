<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload</title>
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

  <input 
    type="file" 
    class="inputFile" 
    id="fileInp" 
    onchange="getFile(event)" 
    accept=".docx, .pptx, .xlsx, .pdf, image/*"
  />
  <label for="fileInp">+</label>
  <span class="fileText"></span>
  <button onclick="uploadFile()">UPLOAD FILE</button>
  <div class="bar">
    <div class= "progress"></div>
  </div>
  <div class="uploadPercentage">0%</div>

  <div class="fileUploaded">
    <!-- <img alt="" class="filePreview"/> -->
  </div>

  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  <script src="./upload.js"></script>
</body>
</html>
