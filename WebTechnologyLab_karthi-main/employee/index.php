<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $joining_date = $_POST['joining_date'];

    $sql = "INSERT INTO employees 
            (employee_id, name, email, phone, department, designation, salary, joining_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssds",
        $employee_id,
        $name,
        $email,
        $phone,
        $department,
        $designation,
        $salary,
        $joining_date
    );

    if ($stmt->execute()) {
        echo "<script>alert('Employee Added Successfully!');</script>";
    } else {
        echo "<script>alert('Error adding employee');</script>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Employee Management System</h1>

    <p>Enter Employee Details</p>

    <form action="" method="POST">

        <label>Employee ID</label>

        <input type="text"
               name="employee_id"
               placeholder="EMP001"
               required>


        <label>Employee Name</label>

        <input type="text"
               name="name"
               placeholder="Enter employee name"
               required>


        <label>Email</label>

        <input type="email"
               name="email"
               placeholder="Enter email"
               required>


        <label>Phone Number</label>

        <input type="text"
               name="phone"
               placeholder="Enter phone number"
               required>


        <label>Department</label>

        <select name="department" required>

            <option value="">Select Department</option>

            <option value="IT">IT</option>

            <option value="HR">HR</option>

            <option value="Finance">Finance</option>

            <option value="Marketing">Marketing</option>

            <option value="Sales">Sales</option>

        </select>


        <label>Designation</label>

        <input type="text"
               name="designation"
               placeholder="Software Developer"
               required>


        <label>Salary</label>

        <input type="number"
               name="salary"
               placeholder="25000"
               required>


        <label>Joining Date</label>

        <input type="date"
               name="joining_date"
               required>


        <button type="submit">
            Add Employee
        </button>

    </form>


    <h2>Employee Details</h2>


    <div class="table-container">

        <table>

            <tr>

                <th>Employee ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Department</th>

                <th>Designation</th>

                <th>Salary</th>

                <th>Joining Date</th>
                
                <th>Action</th>
            </tr>


            <?php

            $result = $conn->query(
                "SELECT * FROM employees ORDER BY id DESC"
            );

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['department']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['designation']) . "</td>";

                    echo "<td>₹" . htmlspecialchars($row['salary']) . "</td>";

                    echo "<td>" . htmlspecialchars($row['joining_date']) . "</td>";

                    echo "<td>
        <a href='delete_employee.php?id=" . $row['id'] . "'
           onclick=\"return confirm('Are you sure you want to remove this employee?');\">
           <button type='button' class='delete-btn'>Remove</button>
        </a>
      </td>";

                    echo "</tr>";
                }

            } else {

                echo "<tr>";

                echo "<td colspan='8'>No employees added yet.</td>";


                echo "</tr>";

            }

            ?>

        </table>

    </div>

</div>

</body>

</html>