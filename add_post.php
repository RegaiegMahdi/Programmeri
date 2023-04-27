
<?php

include '../Controller/postC.php';

$error = "";


$post = null;

// create an instance of the controller
$postC = new postC();
if (
    isset($_POST["contenu"]) &&
    isset($_POST["sujet"]) &&
    isset($_FILES["image"])
    
) {
    if (
        !empty($_POST['contenu']) &&
        !empty($_POST['sujet']) &&
        !empty($_FILES["image"])
        
    ) {
      // process the uploaded file
	  $target_dir = "uploads/";
	  $target_file = $target_dir . basename($_FILES["image"]["name"]);
	  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	  $allowed_extensions = array("jpg", "jpeg", "png", "gif");

	  // Check if the file is a valid image
	  if(in_array($imageFileType, $allowed_extensions)){
		  // move the file to the uploads folder
		  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);


        // create the post with the uploaded file path
            $post = new Post(
                null,
                $_POST['contenu'],
                $_POST['sujet'],
                $target_file
            );
            
            // add the post
			
            $postC->addPost($post);
            header('Location:listPost.php');
        } else {
            $error = "Invalid image file type. Allowed types: " . implode(", ", $allowed_extensions);
        }
    } else {
        $error = "Missing information";
    }
}

?>


















		</form>
	</div>









	