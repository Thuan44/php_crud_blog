<?php 

function uploadImg() {

    if (isset($_POST['submit'])) {
        $j = 0; // Variable for indexing uploaded image
    
        $target_path = "../img/upload/"; // Declaring Path for uploaded images
    
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) { // Loop to get individual element from array
                $validextensions = array ("jpeg", "jpg", "png"); // Extensions which are allowed
    
                $ext = explode('.', basename($_FILES['file']['name'][$i])); // Explode file name from dot(.) (like split in js)
                $file_extension = end($ext); // Store extensions in the variable
    
                $target_path = $target_path . md5(uniqid()) .  "." . $ext[count($ext) - 1]; // Set the target path with a new name of image. md5 encrypts.  
        
                $j++; // increment the number of uploaded images according to the files in array
    
                if (($_FILES['file']['size'][$i] < 100000) //Approx. 100kb files can be upload.  
                    && in_array($file_extension, $validextensions)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { // If file moved to uploads folder
                        echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                    } else { // If file was not moved
                        echo $j. ').<span id="error">Please try again !</span><br/><br/>';
                    }
                }  else { // If file size and tpye was incorrect
                    echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }           
            } 
    }

}


?>

<!-- <form action="uploadFile.php" enctype="multipart/form-data" method="POST">
    <p>Upload</p>
    <input type="file" name="file[]" /><br />
    <input type="submit" name="submit" value="upload" />
</form> -->