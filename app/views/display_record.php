<?php
include "../controller/userController.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h4 class="text-center text-danger">DISPLAY RECORDS</h4>

        <!-- country filter dropdown -->
        <div class="form-group">
            <label for="filterCountry">Filter by Country:</label>
            <select class="form-control" name="filterCountry" id="filterCountry">
                <option value="">All</option>
                <?php
                // Get countries from the database
                $countries = $obj->getCountries();
                foreach ($countries as $country) {
                    echo '<option value="' . $country['name'] . '">' . $country['name'] . '</option>';
                }
                ?>
            </select>
        </div>

        <table class="table table-bordered">
            <tr class="bg-primary text-center">
                <th>Sr#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <tbody id="recordTableBody">
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
                            <button class="btn btn-primary">
                                <a href="index_view.php?record_id=<?php echo $value['id'];?>" class="text-light">Update</a>
                            </button>
                            <button class="btn btn-danger" onclick="confirmDelete('index_view.php?deleteid=<?php echo $value['id'];?>')">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#filterCountry').change(function() {
                var selectedCountry = $(this).val();

                $.ajax({
                    url: '../models/filterRecords.php',
                    method: 'POST',
                    data: { country: selectedCountry },
                    dataType: 'html',
                    success: function(response) {
                        $('#recordTableBody').html(response);
                    }
                });
            });
        });

    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = url;
        }
    }
    </script>
</body>
</html>
