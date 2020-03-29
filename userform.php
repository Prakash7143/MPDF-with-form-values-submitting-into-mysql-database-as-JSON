<?php
    include("config.php");
 // ini_set("display_errors", 0);
	require_once 'mpdf/vendor/autoload.php';
    

   // $mpdf = new mPDF('utf-8','A4','10','10','10','10','10','10'); //$mpdf = new \Mpdf\Mpdf();
   
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 10,'margin_right' => 10,
    'margin_top' => 10,'margin_bottom' => 10,'margin_header' => 10,'margin_footer' => 10]);

    $mpdf-> SetTitle('Personal Details Form');
    $mpdf->text_input_as_HTML = true; 
    $fetch = mysqli_query($dbcon, "SELECT * FROM basic_details WHERE id=".(int)$_GET['user']);

    $jsonInfo = mysqli_fetch_assoc($fetch);
    $data = json_decode($jsonInfo['all_details'], true);
    $first_name = $data['first_name'];
    $middle_name = $data['middle_name'];
    $last_name = $data['last_name'];
    $dob = $data['dob'];
    
    $email_id = $data['email_id'];
    $mobile = $data['mobile'];
    $blood_group = $data['blood_group'];
    $paddress = $data['paddress'];
    $pincode = $data['pincode'];

    $marital_status = $data['marital_status'] == 1 ? "Single" : "Married";
    $marriage_date = $data['marriage_date'] != null ? $data['marriage_date'] : " ";
    $pan_no = $data['pan_no'];
    $adhar =  $data['aadhar_no'];

    $language1 =  $data['language1'];
    $language2 =  $data['language2'];
    $language3 =  $data['language3'];
    $language4 =  $data['language4'];
    $read1 =  $data['read1'] == 1 ? "Yes" : " ";
    $read2 =  $data['read2'] == 1 ? "Yes" : " ";
    $read3 =  $data['read3'] == 1 ? "Yes" : " ";
    $read4 =  $data['read4'] == 1 ? "Yes" : " ";
    $write1 =  $data['write1'] == 1 ? "Yes" : " ";
    $write2 =  $data['write2'] == 1 ? "Yes" : " ";
    $write3 =  $data['write3'] == 1 ? "Yes" : " ";
    $write4 =  $data['write4'] == 1 ? "Yes" : " ";
    $speak1 =  $data['speak1'] == 1 ? "Yes" : " ";
    $speak2 =  $data['speak2'] == 1 ? "Yes" : " ";
    $speak3 =  $data['speak3'] == 1 ? "Yes" : " ";
    $speak4 =  $data['speak4'] == 1 ? "Yes" : " ";
    $mothertongue1 =  $data['mothertongue1'] == 1 ? "Yes" : " ";
    $mothertongue2 =  $data['mothertongue2'] == 1 ? "Yes" : " ";
    $mothertongue3 =  $data['mothertongue3'] == 1 ? "Yes" : " ";
    $mothertongue4 =  $data['mothertongue4'] == 1 ? "Yes" : " ";


    $emergency_address =  $data['emergency_address'];
    $emergency_contact =  $data['emergency_contact'];
    $emergency_name =  $data['emergency_name'];

	
	$gender =  mysqli_fetch_assoc(mysqli_query($dbcon, "SELECT * FROM gender WHERE id=".(int)$data['gender']))['gender_name'];

    $mpdf-> SetHTMLHeader('
    <table>
        <tr style="height:100px; width:1000px;">
            <td style="text-align:center;width:1000px; padding:10px 0; font-size:22px; height:50px; color:#FFF; background: #52527a;">
            <b>
            Personal Details Form
            <b></td>
        </tr>
    </table>
    ');

    $mpdf -> SetHTMLFooter('<table style="padding-bottom:.5%; width:100%;">
        <tr>
            <td style="width:55%; color:#666; font-size:12px;">&nbsp;&nbsp;Version No.1.1 Revision No: 1 </td>
            <td style="width:45%; color:#666; text-align:center; font-size:12px;">Document Ref. No. FNF_Process_Joining Kit_001
            </td>
        </tr>
        </table>');

    $mpdf->WriteHTML('
    <style>
        body {font-family: \'Roboto\', sans-serif;}
        .top_head { background: #FEE8C5;  width:100%;}
        .heading { text-align: center; font-size:30px;padding-top:25px;
                font-family: \'Roboto\', sans-serif; letter-spacing: 0;color: #3C3C3C;opacity: 1;
        }
        .tbs {border:1px solid #d6d6c2; margin-left:25px; margin-top:20px;}
        .tdstyle {  background:#999966; color:#fff; }
        .edu_details { border-top:2px solid #111; border-left:1px solid #111; border-right:1px solid #111;  margin-top:3%; }
        .details {height:100%; width:94%; margin:1% 0 0 3%; border-radius:5px;  }
        .invoice {width:400px; height:30px; font-size:18px; text-align:center; letter-spacing: .5;color: #3C3C3C; font-family: \'Roboto\', sans-serif; }
        </style>

    <div style="border:3px solid #52527a;">
    <div class="details" style="padding:9% 0 0 0;">
    
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:0 0;" ><img src="data:image/;base64,'.base64_encode($jsonInfo['profile_pic']).'" style="width:200px;height:200px; border:1px solid #bbcccc;">
            </td>
        </tr>
    </table>
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1% 0; width:34%;">First Name: <u style="text-transform: capitalize;"><b>'.$first_name.'</b></u> </td> 
            <td style="width:33%;"> Middle Name: <u style="text-transform: capitalize;"><b>'.$middle_name.'</b></u> </td> 
            <td style="width:33%;"> Last Name:<u style="text-transform: capitalize;"><b>'.$last_name.'</b></u></td>
            
        </tr>
    </table>
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:34%;">Date of Birth: <u><b>'.$dob.'</b></u></td>
            <td style=" width:33%;"> Blood Group:  <u style="text-transform: capitalize;"><b>'.$blood_group.'</b></u></td> 
            <td style=" width:33%;"> Gender: <u style="text-transform: capitalize;"><b>'.$gender.'</b></u> </span></td>
        </tr>
    </table>

    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:50%;">Personal Email ID: <u><b>'.$email_id.'</b></u> </td>
            <td style=" width:50%;">  Mobile No.: <u><b>'.$mobile.'</b></u> </td>
        </tr>
    </table>
        
        
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:70%;">Permanent Address: <span style="text-transform: capitalize;"><u><b>'.$paddress.'</b></u></span></td>
        </tr>
        <tr>
            <td style="width:30%">Pin Code:<u><b>'.$pincode.'</b></u></td>
        </tr>
    </table>
        
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:50%;">Marital Status:&nbsp;&nbsp;<u><b>'.$marital_status.'</b></u></td>
            <td style="width:50%;"> Marriage Date (If Married): &nbsp;&nbsp;<u><b>'.$marriage_date.'</b></u></td>
        </tr>
    </table>
   
        
    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:50%; ">PAN Card No.:&nbsp;&nbsp;<u><b>'.$pan_no.'</b></u></td>
            <td style="width:50%"> Aadhar No.:&nbsp;&nbsp;<u><b>'.$adhar.'</b></u></td>
        </tr>
    </table>

   

    <table style="margin-top:1%; width:100%;">
        <tr>
            <td style="padding:1.2% 0; ">Languages known</td><span></span>
        </tr>
    </table>
        
    <table  cellspacing="0" class="tbs">
        <tr>
            <td style="width:70px; border-right:1px solid grey;" class="tdstyle">Sl. No</td> 
            <td style="width:180px; border-right:1px solid grey;" class="tdstyle">Languages Known</td> 
            <td style="width:70px; border-right:1px solid grey;" class="tdstyle">Read </td> 
            <td style="width:88px; border-right:1px solid grey;" class="tdstyle">Write</td>  
            <td style="width:80px; border-right:1px solid grey;" class="tdstyle">Speak</td> 
            <td style="width:120px; border-right:1px solid grey;" class="tdstyle">Mother Tongue</td>
        <tr>
        <tr>
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" >1</td> 
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;text-transform: capitalize;" ><b>'.$language1.'</b></td>
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$read1.'</b></td> 				
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$write1.'</b></td> 
            <td style="width:80px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$speak1.'</b></td> 
            <td style="width:120px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$mothertongue1.'</b></td>
        </tr>
        <tr>
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" >2</td> 
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;text-transform: capitalize;" ><b>'.$language2.'</b></td>
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$read2.'</b></td> 				
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$write2.'</b></td> 
            <td style="width:80px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$speak2.'</b></td> 
            <td style="width:120px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$mothertongue2.'<b></td>
        </tr>
        <tr>
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" >3</td> 
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;text-transform: capitalize;" ><b>'.$language3.'</b></td>
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$read3.'</b></td> 				
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$write3.'</b></td> 
            <td style="width:80px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$speak3.'</b></td> 
            <td style="width:120px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$mothertongue3.'<b></td>
        </tr>
        <tr>
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" >4</td> 
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;text-transform: capitalize;" ><b>'.$language4.'</b></td>
            <td style="width:180px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$read4.'</b></td> 				
            <td style="width:70px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$write4.'</b></td> 
            <td style="width:80px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$speak4.'</b></td> 
            <td style="width:120px; border-right:1px solid grey; border-bottom:1px solid grey;" ><b>'.$mothertongue4.'<b></td>
        </tr>
    </table><br>
    <table style="margin-top:18px;">
        <tr style="height:100px; width:1000px;">
            <td style="text-align:center;width:1000px; padding:5px 0; font-size:22px; height:40px; color:#000; background: #ccccff;">
            <b>
            Emergency Contact Person
            <b></td>
        </tr>
    </table>
    <table style="margin-top:10px; width:100%;">
        <tr>
            <td style="padding:1.2% 0; width:50%;">Name:&nbsp;<u style="text-transform: capitalize;"><b>'.$emergency_name.'</b></u>
            <td style="width:50%;"> Phone No:&nbsp;<u><b>'.$emergency_contact.'</b></u></td>
        </tr>
        
        
    </table>
    <table style="margin-top:10px;">
        <tr>
            <td>Address:&nbsp;<u style="text-transform: capitalize;"><b>'.$emergency_address.'</b></u>
            </td>
        </tr>
    </table>
</div>
    </div>');
 
$title = 'personal_details_form.pdf';
$mpdf -> Output($title, 'I');

?>