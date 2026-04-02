<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <form method="post" onsubmit="return validateForm()">
<br><br>
<div id="courses">

    <input type="text" name="course[]">
    <input type="number" name="credits[]">
    <select name="grade[]">
        <option value="4">A</option>
        <option value="3">B</option>
        <option value="2">C</option>
        <option value="1">D</option>
        <option value="0">F</option>
    </select>

</div>
<button type="button" onclick="addCourse()">Add Course</button>
<input type="submit" value="Calculate GPA">
</form>
  </body>
</html>
<?php

$credits = $_POST["credits"];
$grades = $_POST["grade"];

$totalPoints = 0;
$totalCredits = 0;

for ($i = 0; $i < count($credits); $i++) {
    $totalPoints += $credits[$i] * $grades[$i];
    $totalCredits += $credits[$i];
}

$gpa = $totalPoints / $totalCredits;

echo "Your GPA is: " . $gpa . "<br>";

if ($gpa >= 3.7) {
    echo "Distinction";
} elseif ($gpa >= 3.0) {
    echo "Merit";
} elseif ($gpa >= 2.0) {
    echo "Pass";
} else {
    echo "Fail";
}

?>
