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
