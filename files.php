<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Storage Management | MIS</title>
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-storage.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Views Files</h1>

  <!-- Placeholder for displaying files -->
  <div id="fileList"></div>

  <script>
    // Initialize Firebase
    var firebaseConfig = {
      apiKey: "AIzaSyDY56uW4R8LphAQ7YZJLN9rRQ7be09joCg",
      authDomain: "misdatabase-eaab0.firebaseapp.com",
      projectId: "misdatabase-eaab0",
      storageBucket: "misdatabase-eaab0.appspot.com",
      messagingSenderId: "243064517779",
      appId: "1:243064517779:web:8854d674fd2745932ac966"
      measurementId: "G-EM6P7X9XQ1"
    };
    firebase.initializeApp(firebaseConfig);

    // Reference to the Firebase Storage bucket
    var storage = firebase.storage();

    // Reference to the root of your storage bucket
    var storageRef = storage.ref();

    // Reference to the folder where your files are stored
    var filesRef = storageRef.child('files');

    // Get the list of files in the folder
    filesRef.listAll().then(function(result) {
      result.items.forEach(function(itemRef) {
        // Get the download URL for each file
        itemRef.getDownloadURL().then(function(url) {
          // Create HTML elements to display files
          var fileType = url.split('.').pop().toLowerCase();
          var fileElement;
          if (fileType === 'jpg' || fileType === 'jpeg' || fileType === 'png' || fileType === 'gif') {
            // For image files, create an image element
            fileElement = '<img src="' + url + '" alt="' + itemRef.name + '" width="200">';
          } else {
            // For other file types, create a download link
            fileElement = '<a href="' + url + '" download>' + itemRef.name + '</a>';
          }
          // Append the file element to the file list
          document.getElementById('fileList').innerHTML += fileElement + '<br>';
        });
      });
    }).catch(function(error) {
      console.log('Error getting files:', error);
    });
  </script>
</body>
</html>