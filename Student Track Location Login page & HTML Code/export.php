<?php
$connect = mysqli_connect("localhost", "root", "", "studenttrack");
$output = '';
if(isset($_POST["export_excel"]))
{
    $sql = "SELECT * FROM studentinfo  ORDER BY id DESC";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $output .='
            <table class="table" bordered="1">
                <tr>
                <th>Batch</th>  
                <th>Sl No</th>
                <th>Register Number</th>
                <th>Name</th>
                <th>Date of Birth</th>
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
                </tr>   
        ';
        while($row = mysqli_fetch_array($result))
        {
            $output .='
                <tr>
                   <td>'.$row["Batch"].'</td>
                   <td>'.$row["Sl_No"].'</td>
                   <td>'.$row["Register_Number"].'</td>
                   <td>'.$row["Name"].'</td>
                   <td>'.$row["Date_of_Birth"].'</td>
                   <td>'.$row["Gender"].'</td>
                   <td>'.$row["Email"].'</td>
                   <td>'.$row["Student_Mobile_No"].'</td>
                   <td>'.$row["Blood_Group"].'</td>
                   <td>'.$row["Address"].'</td>
                   <td>'.$row["Father_Name"].'</td>
                   <td>'.$row["Father_Occuption"].'</td>
                   <td>'.$row["Mother_Name"].'</td>
                   <td>'.$row["Parent_Mobile_No"].'</td>
                   <td>'.$row["Annual_Family_Income"].'</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; Filename = StudentData.xls");
        echo $output;
    }
}



?>