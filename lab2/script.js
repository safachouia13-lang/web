function validateForm() {

    var course = document.getElementsByName("course[]");
    var credits = document.getElementsByName("credits[]");
    var grades = document.getElementsByName("grade[]");

    for (var i = 0; i < course.length; i++) {

        if (course[i].value === "" || credits[i].value === "" || grades[i].value === "") {
            alert("Please fill all fields!");
            return false;
        }

        if (credits[i].value < 1 || credits[i].value > 5) {
            alert("Credits must be between 1 and 5");
            return false;
        }
    }

    return true;
}
function addCourse() {

    var container = document.getElementById("courses");

    var newRow = document.createElement("div");

    newRow.innerHTML = `
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

        <br><br>
    `;

    container.appendChild(newRow);
}
