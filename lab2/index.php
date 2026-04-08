<?php
$gpa = "";
$result = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST["course"];
    $credits = $_POST["credits"];
    $grades = $_POST["grade"];

    $totalPoints = 0;
    $totalCredits = 0;
    $isEmpty = true;

    for ($i = 0; $i < count($credits); $i++) {
        if (!empty($credits[$i]) && $grades[$i] !== "") {
            $isEmpty = false;
            $totalPoints += $credits[$i] * $grades[$i];
            $totalCredits += $credits[$i];
        }
    }

    if ($isEmpty || $totalCredits == 0) {
        $error = "There is no information!!";
    } else {
        $gpa = $totalPoints / $totalCredits;

        if ($gpa >= 3.7) {
            $result = "Distinction";
        } elseif ($gpa >= 3.0) {
            $result = "Merit";
        } elseif ($gpa >= 2.0) {
            $result = "Pass";
        } else {
            $result = "Fail";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>GPA Calculator</h1>

<form method="post">
<div id="courses">

    <input type="text" name="course[]" placeholder="Course Name">
    <input type="number" name="credits[]" placeholder="Credits" min="1" max="5">

    <select name="grade[]">
        <option value="">Select Grade</option>
        <option value="4">A</option>
        <option value="3">B</option>
        <option value="2">C</option>
        <option value="1">D</option>
        <option value="0">F</option>
    </select>

</div>

<br><br>
<input type="submit" value="Calculate">
</form>

<br>

<?php
if ($error != "") {
    echo "<p>$error</p>";
}

if ($gpa != "") {
    echo "<h3>Your GPA is: " . number_format($gpa,2) . "</h3>";
    echo "<h4>$result</h4>";
}
?>

</body>
</html>
