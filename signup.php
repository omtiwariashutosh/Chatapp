<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email-This email already exist!.";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];


                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extensions = array("jpeg", "jpg", "png");
                if (in_array($img_ext, $extensions) === true) {
                    $type = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $type) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "images/.$new_img_name")) {
                            $ran_id = rand(time(), 100000000);
                            $status = "Online";
                            $encrypt_pass = md5($password);


                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES({$ran_id}, '{$fname}', '{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                            if ($insert_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
                            } else {
                                echo "Failed to upload image! Plese try again";
                            }
                        }
                    } else {
                        echo "Please select a valid image file. - jpeg, jpg, png.";
                    }
                } else {
                    echo "Please select a valid image file. - jpeg, jpg, png.";
                }
            }
        }
    } else {
        echo "$email Invalid email";
    }
} else {
    echo "Please fill in all fields are required";
}
