<?php
include "../controller/userController.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>OOP IN PHP</title>
    <script src="../Js/countryCity.js"></script>
</head>

<body>
    <br>
    <h2 class="text-center text-info">MVC_AJAX_OOP_PROJECT</h2>
    <br>
    <div class="container w-50">
      <!-- Success Message -->
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 'ins') {
    echo '<div id="successMsg" class="alert alert-primary" role="alert">
        Record inserted Successfully!
    </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == 'ups') {
    echo '<div id="successMsg" class="alert alert-success" role="alert">
        Updated record successfully!
    </div>';
}
if (isset($_GET['msg']) && $_GET['msg'] == 'del') {
    echo '<div id="successMsg" class="alert alert-danger" role="alert">
        Record Deleted Successfully!
    </div>';
}
?>

<!-- JavaScript code to hide the success messages after 5 seconds -->
<script>
    setTimeout(function() {
        var successMsg = document.getElementById('successMsg');
        if (successMsg) {
            successMsg.style.display = 'none';
        }
    }, 5000);
</script>

        
        <?php

        // Update Page Data
        if(isset($_GET['record_id'])){
            $record_id = $_GET['record_id'];
            $myrecord = $obj->getById($record_id);
            ?>
            <form name="myForm" action="index_view.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="<?php echo $myrecord['name']?>" type="text" name="name" placeholder="Enter your name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="<?php echo $myrecord['email']?>" type="text" name="email" placeholder="Enter your email" autocomplete="off">
                </div>
                <div class="form-group">
                <label>Select your Country</label>
                <select class="form-control" name="country" id="country">
                    <option value=""><?php echo $myrecord['country']?></option>
                    <?php
                    // Get countries from the database
                    $countries = $obj->getCountries();
                    foreach ($countries as $country) {
                        echo '<option value="'.$country['id'].'">'.$country['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Select your City</label>
                <select class="form-control" name="city" id="city">
                    <option value=""><?php echo $myrecord['city']?></option>
                </select>
            </div>
                <div class="form-group">
                    <input type="hidden" name="hid" value="<?php echo $myrecord['id']?>">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
            </form>
            <?php
        }
        else{
        ?>
        <form name="myForm" action="index_view.php" method="post" onsubmit="return validate()">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control"type="text" name="name" placeholder="Enter your name" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control"type="text" name="email" placeholder="Enter your email" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Select your Country</label>
                <select class="form-control" name="country" id="country">
                    <option value="">Select a country</option>
                    <?php
                    // Get countries from the database
                    $countries = $obj->getCountries();
                    foreach ($countries as $country) {
                        echo '<option value="'.$country['id'].'">'.$country['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Select your City</label>
                <select class="form-control" name="city" id="city">
                    <option value="">Select a city</option>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Submit" class="btn btn-info">
                
                       
            </div>
        </form>
        <?php
        }
        ?>
        
        <br>
        <!-- <h4 class="text-center text-danger">DISPLAY RECORDS</h4>
        <table class="table table-bordered">
            <tr class="bg-primary text-center">
                <th>Sr#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            <?php
            $counter = 1;
            foreach ($data as $value) {
            ?>
                <tr class="text-center">
                    <td><?php echo $counter++ ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['country'] ?></td>
                    <td><?php echo $value['city'] ?></td>
                    <td>
                        <button class="btn btn-primary"><a href="index_view.php?record_id=<?php echo $value['id'];?>" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="index_view.php?deleteid=<?php echo $value['id'];?>" class="text-light">Delete</a></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table> -->
    </div>
    
    <!-- <script>
        $(document).ready(function() {
            // Handle country change event
            $('#country').change(function() {
                var countryId = $(this).val();
                
                // Clear city options
                $('#city').html('<option value="">Select a city</option>');
                
                // Make AJAX request to get cities
                $.ajax({
                    url: '../ajax.php',
                    method: 'POST',
                    data: { country_id: countryId },
                    dataType: 'json',
                    success: function(response) {
                        // Populate city options
                        if (response.length > 0) {
                            $.each(response, function(index, city) {
                                $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                            });
                        }
                    }
                });
            });
        });
    </script> -->

</body>
</html>
