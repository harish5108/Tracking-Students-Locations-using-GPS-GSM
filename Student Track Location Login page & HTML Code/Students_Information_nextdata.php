<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase</title>
    <link rel="stylesheet" href="./Students_Information_nextdata.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"> -->

</head>
<body>
    <div>
        <div>
            <div>
            <center>
            <h1>Students Information</h1>
            </center>
            </div>
            <div>
              <a class="signout" href="./login.php">Sign Out</a>
            </div>
            <center>
            <tr>
                <td>
                   <a href="Students_Information.php"><img src="./add.svg"><p>Student AddData</p></a>
                </td>
            </tr>
            </center>
        </div>
    </div>
    <div>
    <table class="content-table" id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
        <tr>  
            <th>Batch</th>  
            <th>Sl No</th>
            <th>Register Number</th>
            <th>Name with Initial withend</th>
            <th class="dob">Date of Birth</th>
            <th>Gender</th>
            <th>Email ID</th>
            <th>Student Mobile Number</th>
            <th>Blood Group</th>
            <th>Address for Communication</th>
            <th>Father Name</th>
            <th>Father Occuption</th>
            <th>Mother Name</th>
            <th>Parent Mobile No</th>
            <th>Annual Family Income</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Track</th>
            
                        
        </tr>
        </thead>
        <tbody>
        <?php
            require('./conection.php');
            $p=crud::Selectdata();
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if (count( $p)>0) {
                for ($i=0; $i < count( $p); $i++) { 
                    echo '<tr class="active-row">';
                    foreach ( $p[$i] as $key => $value) {
                    if ($key!='id') {
                    echo '<td>'.$value.'</td>';
                    }
                    }
                    ?>

                    <td><a href="Students_Information_nextdata.php?id=<?php echo $p[$i]['id'] ?>"><img class="img1" src="./trash.svg"></a></td>
                    <td><a href="Students_Info_1.php?id_up=<?php echo $p[$i]['id'] ?>"><img class="img1" src="./edit.svg"></a></td>
                    <td><a href="https://adamitical-spades.000webhostapp.com/">Track</a></td>

                    <?php
                    echo '</tr>';
                }
             }
    ?>
        </tbody>
        
    </table>
    </div>
    <hr>
    <form action="export.php" method="post"> 
    <input type="submit" name="export_excel" value="Export to Excel"/>
    </form> 
    
<script src="Students_Information.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script> -->
<!-- <script>
// $(document).ready(function(){
//     $('#myTable').DataTable({
//         "pagingType": "full_numbers",
//         "lengthMenu": [
//         [10,25,50,-1],
//         [10,25,50,"All"]
//         ],
//         responsive: true,
//         language: {
//             search: "_INPUT_",
//             searchPlaceholder: "Search records",
//         }
//     });
// });

    let table = new DataTable('#myTable');

</script> -->
</body>
</html>