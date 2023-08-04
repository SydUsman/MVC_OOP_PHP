<?php
include './model.php';

$obj = new Model();

if (isset($_POST['country'])) {


    $country = $_POST['country'];

    if ($country === "") { 
        $filteredData = $obj->displayRecord(); 
    } else {
        $filteredData = $obj->displayRecordByCountry($country);
    }

    $counter = 1;
    if (!empty($filteredData)) {
        foreach ($filteredData as $value) {
            ?>
            <tr class="text-center">
                <!-- <td><?php echo $value['id'] ?></td> -->
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
    } else {
        ?>
        <tr>
            <td colspan="6" class="text-center">No records found for the selected country.</td>
        </tr>
        <?php
    }
}
?>
