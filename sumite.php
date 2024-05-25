<?php

session_start();
include('connect.php');



echo"<pre>";
print_r($conn);
echo"</pre>";


// echo $_SERVER['REQUEST_METHOD'];

print_r($_POST);




 if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];
      echo "<pre>";
      print_r($_POST);
      print_r($_FILES);
      echo "</pre>"; 
    print_r($_POST);
    $name_pattern ='/^[a-zA-Z]+[a-zA-Z]+/';
    $phone_pattern ='/^[0-9]{10}$/';
    $email_pattern = '/[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2}/';
    $isNameValid = preg_match($name_pattern,$name);
    $isPhoneValid = preg_match($phone_pattern, $phone);
    $isEmailValid =preg_match($email_pattern, $email);

    
if(!$isNameValid){
    echo 'please enter a valid name';
}
if(!$isPhoneValid){
    echo 'please enter a valid phone';
}
if(!$isEmailValid){
    echo 'please enter a valid email';
}
if($isNameValid && $isPhoneValid && $isEmailValid){
        if(isset($_FILES)){
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];
            $file_size = $file['size'];
            $target = 'uplodas/';
            $path = $target.$file_name;
            $file_extension = pathinfo($path, PATHINFO_EXTENSION);
            if(file_exists($path)){
                echo "file already exists";
            }else{
                if($file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'jpg'){
                    if(move_uploaded_file($file_tenp, $path)){
                        $sql = "INSERT INTO students(name , email , phone , image_path) VALUES ('$name', '$email', '$phone', '$path' )";
                        if($conn->query($sql)){
                            echo "form submitted!";
                        }else{
                            echo "something went wrong";
                        }
                    }else{
                        echo "something went wrong";
                    }
                    }else{
                        echo "please upload image file $file_extension";
                    }
                }
            }
        }
}

?>