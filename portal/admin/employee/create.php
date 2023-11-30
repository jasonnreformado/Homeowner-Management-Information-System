<?php
# Include connection
require_once "config.php";

# Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $age_err = $gender_err = $designation_err = $date_err = "";
$fname = $lname = $email = $age = $gender = $designation = $date = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["fname"]))) {
    $fname_err = "This field is required.";
  } else {
    $fname = ucfirst(trim($_POST["fname"]));
    if (!ctype_alpha($fname)) {
      $fname_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["lname"]))) {
    $lname_err = "This field is required.";
  } else {
    $lname = ucfirst(trim($_POST["lname"]));
    if (!ctype_alpha($lname)) {
      $lname_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["email"]))) {
    $email_err = "This field is required.";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    }
  }

  if (empty(trim($_POST["age"]))) {
    $age_err = "This field is required.";
  } else {
    $age = trim($_POST["age"]);
    if (!ctype_digit($age)) {
      $age_err = "Please enter a valid age number";
    }
  }

  if (empty($_POST["gender"])) {
    $gender_err = "This field is required.";
  } else {
    $gender = $_POST["gender"];
  }

  if (empty($_POST["designation"])) {
    $designation_err = "This field is required.";
  } else {
    $designation = $_POST["designation"];
  }

  if (empty($_POST["date"])) {
    $date_err = "This field is required";
  } else {
    $date = $_POST["date"];
  }

  # Check input errors before inserting data into database
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($age_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {
    # Preapre an insert statement
    $sql = "INSERT INTO employees (first_name, last_name, email, age, gender, designation, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssisss", $param_fname, $param_lname, $param_email, $param_age, $param_gender, $param_designation, $param_date);

      # Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_email = $email;
      $param_age = $age;
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='../../admin/officer.php'" . "</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    # Close statement
    mysqli_stmt_close($stmt);
  }

  # Close connection
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>PHP CRUD Operations</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <!-- form starts here -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate>
          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="fname" class="form-label">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>">
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="lname" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname" value="<?= $lname; ?>">
              <small class="text-danger"><?= $lname_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>">
              <small class="text-danger"><?= $email_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="age" class="form-label">Age</label>
              <input type="text" class="form-control" name="age" id="age" value="<?= $age; ?>">
              <small class="text-danger"><?= $age_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-select" id="gender">
                <option selected disabled>Select Gender</option>
                <option value="Male" <?= (isset($gender) && $gender == "Male") ? "selected" : ""; ?>>Male</option>
                <option value="Female" <?= (isset($gender) && $gender == "Female") ? "selected" : ""; ?>>Female</option>
                <option value="Others" <?= (isset($gender) && $gender == "Others") ? "selected" : ""; ?>>Others</option>
              </select>
              <small class="text-danger"><?= $gender_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="designation" class="form-label">Positions</label>
              <select name="designation" class="form-select" id="designation">
                <option selected disabled>Select Position</option>
                <option value="President" <?= (isset($designation) && $designation == "President") ? "selected" : ""; ?>>
                  President
                </option>
                <option value="Vice President" <?= (isset($designation) && $designation == "Vice President") ? "selected" : ""; ?>>
                  Vice President
                </option>
                <option value="Secretary" <?= (isset($designation) && $designation == "Secretary") ? "selected" : ""; ?>>
                  Secretary
                </option>
                <option value="Treasurer" <?= (isset($designation) && $designation == "Treasurer") ? "selected" : ""; ?>>
                Treasurer
                </option>
              </select>
              <small class="text-danger"><?= $designation_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="date" class="form-label">Joining Date</label>
              <input type="date" class="form-control" name="date" id="date" value="<?= $date; ?>">
              <small class="text-danger"><?= $date_err; ?></small>
            </div>
            <div class="col-lg-12 d-grid">
              <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>
</body>

</html>