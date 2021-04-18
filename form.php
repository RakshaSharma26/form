<?php
$insert = "false";
if(isset($_POST['name'])){

    //Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// create a database connection
$con = mysqli_connect($server, $username,$password);  //connection Variable

// Check for connection success
if(!$con){
    die ("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the DB"

//collect post variables
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$sql = "INSERT INTO `machauGames`.`contact` ( `name`, `email`, `phone`, `message`, `date`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
// echo $sql;

//Execute the query
if($con->query($sql) == true){
    // echo "Succesfully inserted";

    //Flag for successful insertion
    $insert = true;
}
else{
    echo "ERRPR: $sql <br> $con->error";
}

// Close the database connection
$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    .container {
        display: flex;
        margin: auto;
        width: 90%;
        /*height:30%;*/
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }
    
    .containers h1 {
        width: 100%;
        margin: 15px;
        font-size: 2em;
        text-align: center;
    }
    
    .contact h2 {
        text-align: center;
        margin: 10px;
    }
    
    .contact .form-group {
        padding: 10px;
    }
    
    .contact form {
        box-shadow: 0 0 10px #999;
        padding: 20px;
        width: 70%;
        margin: auto;
    }
    
    .contact input,
    .contact textarea {
        width: 100%;
        margin-top: 10px;
    }
    
    .contact .form-group input,
    .contact .form-group textarea {
        font-size: 18px;
    }
    
    #first {
        text-align: center;
    }
    
    .form-group a {
        text-decoration: none;
        color: white;
        background: #6FB3B8;
        padding: 5px;
        font-size: 18px;
        border-radius: 10px;
    }
    
    .btn {
        background-color: #6FB3B8;
        color: black;
        border-radius: 6px;
        outline: none;
        padding: 5px;
    }
</style>

<body>
    <div class=contact>
        <form method="POST" action="form.php">
            <h2 id="formh">Form</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number: </label>
                <input type="number" name="phone" id="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <label for="message">Message: </label>
                <textarea name="message" id="message" cols="30" placeholder="Message" rows="10" required></textarea>
            </div>
            <button class="btn">SUBMIT</button>
        </form>
</body>
<!-- INSERT INTO `contact` (`sno`, `name`, `email`, `phone`, `message`, `date`) VALUES ('1', 'testname', 'example@gmail.com', '9090909090', 'testmessage', current_timestamp()); -->

</html>