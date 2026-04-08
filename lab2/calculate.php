<?php
$course = $_POST["course"];
$credits = $_POST["credits"];
$grade = $_POST["grade"];

echo "Course: " . $course . "<br>";
echo "Credits: " . $credits . "<br>";
echo "Grade: " . $grade;

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
echo "<br><br>";
echo "<a href='index.html'><button>Calculate Again</button></a>";
?>

