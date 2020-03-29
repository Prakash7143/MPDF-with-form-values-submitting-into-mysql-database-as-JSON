<?php

function getGender(){
    global $dbcon;
    return mysqli_query($dbcon, "SELECT * FROM `gender`");
}

function getMarital(){
    global $dbcon;
    return mysqli_query($dbcon, "SELECT * FROM `marital_status`");
}

function insertForm(){
    global $dbcon;
    $basic_details = new stdClass();
    $basic_details->emergency_address = mysqli_real_escape_string($dbcon, $_POST['emergency_address']);
    $basic_details->emergency_contact = $_POST['emergency_contact'];
    $basic_details->emergency_name = $_POST['emergency_name'];

    $basic_details->first_name = $_POST['first_name'];
    $basic_details->middle_name = $_POST['middle_name'];
    $basic_details->last_name = $_POST['last_name'];
    $basic_details->dob = $_POST['dob'];
    $basic_details->gender = $_POST['gender'];
    $basic_details->email_id = $_POST['email_id'];
    $basic_details->mobile_number = $_POST['mobile'];
    $basic_details->blood_group = $_POST['blood_group'];
    
    $basic_details->paddress = $_POST['paddress'];
    $basic_details->pincode = $_POST['pincode'];
    $basic_details->marital_status = $_POST['marital_status'];
    $basic_details->marriage_date = $_POST['marriage_date'];
    
    $basic_details->pan_no = $_POST['pan_no'];
    $basic_details->aadhar_no = $_POST['adhar'];
    
    $basic_details->language1 = $_POST['language1'];
    $basic_details->language2 = $_POST['language2'];
    $basic_details->language3 = $_POST['language3'];
    $basic_details->language4 = $_POST['language4'];
    $basic_details->read1 = $_POST['read1'];
    $basic_details->read2 = $_POST['read2'];
    $basic_details->read3 = $_POST['read3'];
    $basic_details->read4 = $_POST['read4'];
    $basic_details->write1 = $_POST['write1'];
    $basic_details->write2 = $_POST['write2'];
    $basic_details->write3 = $_POST['write3'];
    $basic_details->write4 = $_POST['write4'];
    $basic_details->speak1 = $_POST['speak1'];
    $basic_details->speak2 = $_POST['speak2'];
    $basic_details->speak3 = $_POST['speak3'];
    $basic_details->speak4 = $_POST['speak4'];
    $basic_details->mothertongue1 = $_POST['mothertongue1'];
    $basic_details->mothertongue2 = $_POST['mothertongue2'];
    $basic_details->mothertongue3 = $_POST['mothertongue3'];
    $basic_details->mothertongue4 = $_POST['mothertongue4'];
   

    if($_FILES['profile_pic']['tmp_name'])
    {
        $photo = "";
        $name = array();
        $name[] = $_FILES['profile_pic']['tmp_name'];
        if(in_array($_FILES['profile_pic']['tmp_name'], $name))
        {
            $photo = fopen($_FILES['profile_pic']['tmp_name'], "r");
            $photo_doc_type = ($photo != '' ? $_FILES['profile_pic']['type'] : ""); //Note by Satyaprakash: If you want to insert document type then use this
        }
    }
    
    $basic = json_encode($basic_details);
    $insert = $dbcon->prepare("INSERT INTO basic_details (all_details, profile_pic) VALUES (?, ?)");
    $insert->bind_param("sb", $basic, $photo);
    $insert->send_long_data(1, fread($photo, filesize($_FILES['profile_pic']['tmp_name'])));
    return $insert->execute();
    
}

function showUsers(){
    global $dbcon;
    return mysqli_query($dbcon, "SELECT * FROM basic_details");
}

?>