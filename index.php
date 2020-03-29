<?php 
ini_set("display_errors", 0);
include("config.php");
include("querries.php");


if(isset($_POST['submitForm'])){
   
   if(insertForm()){
    echo '<div id="showNone" style="width:100%; height:50px; padding:10px; color:#0F1;  background:#ccffe6;">Successfully Added!</div>';
   }else{
    echo '<div id="showNone" style="width:100%; height:50px; padding:10px; color:#F00; background:#ffcccc;">Failed To Add..</div>'.mysqli_error($dbcon);
   }
}
$showUsers = showUsers();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MPDF Form Application</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- DataTables -->
        <link href="dataTable/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="dataTable/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="dataTable/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="dataTable/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="dataTable/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="dataTable/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <script src="dataTable/jquery.dataTables.min.js"></script>
        <script src="dataTable/dataTables.bootstrap4.min.js"></script>

        <style>
        .tableStyle{
            box-shadow: 0.5px 0.1rem 0.5rem rgba(0, 0, 0, 0.5);
            padding:2%;
            
        }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="form-group" action="" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-xl-3">
                        <label>First Name</label>
                        <input name="first_name" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Middle Name</label>
                        <input name="middle_name" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Last Name</label>
                        <input name="last_name" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Date Of Birth</label>
                        <input type="date" name="dob" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Blood Group</label>
                        <input name="blood_group" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control form-control-sm">
                        <option>Select gender</option>
                        <?php
                        $getGender = getGender();
                        while($gen = mysqli_fetch_assoc($getGender)){
                            echo '<option value="'.$gen['id'].'">'.$gen['gender_name'].'</option>';
                        }

                        ?>
                        </select>
                    </div>
                    <div class="col-xl-3">
                        <label>Email Id</label>
                        <input type="email" name="email_id" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Mobile No.</label>
                        <input name="mobile" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Pan No.</label>
                        <input name="pan_no" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Aadhar No.</label>
                        <input name="adhar" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Marital Status.</label>
                        <select name="marital_status" class="form-control form-control-sm">
                        <option>Select Marital Status</option>
                        <?php
                        $getMarital = getMarital();
                        while($mar = mysqli_fetch_assoc($getMarital)){
                            echo '<option value="'.$mar['id'].'">'.$mar['marital_status'].'</option>';
                        }

                        ?>
                        </select>
                    </div>
                    <div class="col-xl-3">
                        <label>Marriage Date (If Married).</label>
                        <input type="date" name="marriage_date" class="form-control form-control-sm">
                    </div>

                    <div class="col-xl-9">
                        <label>Permanent Address.</label>
                        <input name="paddress" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Pin Code.</label>
                        <input name="pincode" class="form-control form-control-sm">
                    </div>
                    

                    <div class="col-xl-3">
                        <label>Emergency person name.</label>
                        <input name="emergency_name" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Contact.</label>
                        <input name="emergency_contact" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-6">
                        <label>Address.</label>
                        <input name="emergency_address" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3">
                        <label>Profile Pic.</label>
                        <input name="profile_pic" type="file" class="form-control form-control-sm">
                    </div>
                    <div class="col-xl-3 mt-4">
                        
                        <button name="submitForm" type="submit" class="btn btn-m btn-success">Submit</button>
                    </div>
                    
                    
                    
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 mt-4">
                        <div class="row">
                            <label class="col-xl-4 col-lg-4"><b> Languages Known </b></label>
                            <label class="col-xl-2 col-lg-2"><b> Read </b></label>
                            <label class="col-xl-2 col-lg-2"><b> Write </b></label>
                            <label class="col-xl-2 col-lg-2"><b> Speak </b></label>
                            <label class="col-xl-2 col-lg-2"><b> Mother Tongue </b></label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <input placeholder="Enter Language-1 you know" type="text" class="form-control form-control-sm" 
                                style="height:auto !important"  name="language1" id="language1" />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read1">
                                    <input type="checkbox"   style="height:auto !important" 
                                    value="1" name="read1" id="read1" />
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important"
                                     value="1" name="write1" id="write1" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important" 
                                    value="1" name="speak1" id="speak1" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important" 
                                    value="1"   name="mothertongue1" id="mothertongue1" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12" style="margin-top:1%">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <input placeholder="Enter Language-2 you know" type="text" class="form-control form-control-sm" 
                                style="height:auto !important"  name="language2" id="language2" />
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read2">
                                    <input type="checkbox" style="height:auto !important" 
                                    value="1" name="read2" id="read2" />
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox" style="height:auto !important" 
                                    value="1" name="write2" id="write2" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox" style="height:auto !important" 
                                    value="1" name="speak2" id="speak2" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important"
                                     value="1" name="mothertongue2" id="mothertongue2" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12" style="margin-top:1%">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <input placeholder="Enter Language-3 you know" type="text" class="form-control form-control-sm" 
                                style="height:auto !important"  name="language3" id="language3" />
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read3">
                                    <input type="checkbox"  style="height:auto !important" 
                                    value="1" name="read3" id="read3" />
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important" 
                                    value="1" name="write3" id="write3" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox" 
                                     style="height:auto !important" 
                                    value="1" 
                                    name="speak3" id="speak3" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important" 
                                    value="1" name="mothertongue3" id="mothertongue3" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12" style="margin-top:1%">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <input placeholder="Enter Language-4 you know" type="text" class="form-control form-control-sm" 
                                style="height:auto !important"  name="language4" id="language4" />
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important"
                                     value="1" name="read4" id="read4" />
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"   style="height:auto !important" value="1" name="write4" id="write4" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"  style="height:auto !important"  value="1" 
                                    name="speak4" id="speak4" />
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                <label class="form-check-label" for="read4">
                                    <input type="checkbox"   style="height:auto !important" value="1" name="mothertongue4" id="mothertongue4" />
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        <div class="tableStyle mb-3">
            <table id="dataTable" class="table ">
                <thead>
                    <th>Sr</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Profile Pic</th>
                    <th>View Application</th>
                </thead>
                <tbody>
                    <?php
                    $s = 1;
                    while($dts = mysqli_fetch_assoc($showUsers)){
                        $userdata = json_decode($dts['all_details'], true);
                        echo '<tr>
                            <td>'.$s++.'</td>
                            <td>'.$userdata['first_name'].' '.$userdata['middle_name'].' '.$userdata['last_name'].'</td>
                            <td>'.$userdata['email_id'].'</td>
                            <td><img src="data:image/;base64,'.base64_encode($dts['profile_pic']).'" style="width:180px;height:50px; border:1px solid #000;"></td>
                            <td><button title="Click to open PDF" class="btn btn-sm btn-primary" onclick="getUserPDF('.$dts['id'].')">+</button></td>
                        </tr>';

                    }                    

                    ?>
                </tbody>
            </table>
        </div>


        </div>
    </body>
</html>

<script>
$('document').ready(function(){
    $('#dataTable').DataTable();
});

setTimeout(function() {
		document.getElementById("showNone").style.display = 'none';
	}, 3000);

function getUserPDF(id){
    window.open("userform.php?user="+id, "_blank");
}
</script>