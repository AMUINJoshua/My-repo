const firebaseConfig = {
    apiKey: "AIzaSyDY56uW4R8LphAQ7YZJLN9rRQ7be09joCg",
    authDomain: "misdatabase-eaab0.firebaseapp.com",
    projectId: "misdatabase-eaab0",
    storageBucket: "misdatabase-eaab0.appspot.com",
    messagingSenderId: "243064517779",
    appId: "1:243064517779:web:8854d674fd2745932ac966",
    measurementId: "G-EM6P7X9XQ1"
  };

  firebase.initializeApp(firebaseConfig);

  var fileText = document.querySelector(".fileText");
  var uploadPercentage = document.querySelector(".uploadPercentage");
  var progress = document.querySelector(".progress");
  var percentVal;
  var fileItem;
  var fileName;
  var filePreview = document.querySelector(".filePreview");
  
  function getFile(e){
      fileItem = e.target.files[0];
      fileName = fileItem.name;
      fileText.innerHTML = fileName;
  
      // Display preview for images if needed
      // if (fileItem.type.startsWith('image/')) {
      //     var reader = new FileReader();
      //     reader.onload = function(e) {
      //         filePreview.src = e.target.result;
      //         filePreview.style.display = "block";
      //     };
      //     reader.readAsDataURL(fileItem);
      // }
  }
  var Digit;
  function uploadFile(){
      let storageRef = firebase.storage().ref("files/"+ fileName);
      let uploadTask = storageRef.put(fileItem);
  
      uploadTask.on("state_changed", (snapshot)=>{
          percentVal = Math.floor((snapshot.bytesTransferred / snapshot.totalBytes) * 100);
          uploadPercentage.innerHTML = percentVal + "%";
          progress.style.width = percentVal + "%";
      },(error)=>{
          console.log("Error is ", error);
      },()=>{
          uploadTask.snapshot.ref.getDownloadURL().then((url)=>{
              console.log("URL", url);
              // Do something with the download URL, such as saving it to a database
          });
      });
  }