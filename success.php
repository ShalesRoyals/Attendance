<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //check if insert was successful
        $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty);
        $specialtyName= $crud->getSpecialtyById($specialty);

        if($isSuccess){
            SendEmail::sendMail($email, 'Welcome to IT Conference 2019', 'You have succesfully registered for this year\'s IT Conference');
           // echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
           include 'includes/successmessage.php';

   
        }
        else{
           // echo '<h1 class="text-center text-danger">There Was An Error In Processing!</h1>';
           include 'includes/errormessage.php';

        }

    }
?>
        
        <!-- Print using $_GET-->
        <!--<div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php // echo  $_GET ['firstname'] .' '. $_GET ['lastname'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php //echo  $_GET ['specialty'] ?></h6>
                <p class="card-text">Date of Birth: <?php //echo  $_GET ['dob']; ?></p>
                <p class="card-text">Email Address: <?php //echo  $_GET ['email']; ?></p>
                <p class="card-text">Contact Number: <?php //echo  $_GET ['phone']; ?></p>
            </div>
         </div>-->

           
        <!-- Print using $_POST-->
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php  echo  $_POST ['firstname'] .' '. $_POST ['lastname'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo  $specialtyName ['name'] ?></h6>
                <p class="card-text">Date of Birth: <?php echo  $_POST ['dob']; ?></p>
                <p class="card-text">Email Address: <?php echo  $_POST ['email']; ?></p>
                <p class="card-text">Contact Number: <?php echo  $_POST ['phone']; ?></p>
            </div>
         </div>
   
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>