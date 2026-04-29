<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$message = "";

if (isset($_POST['add_student'])) {
    $roll = $_POST['roll'];
    $_SESSION['students'][$roll] = [
        'name' => $_POST['name'],
        'semester' => $_POST['semester'],
        'attendance' => 0,
        'marks' => 0
    ];
    $message = "Student Added Successfully!";
}

if (isset($_POST['attendance'])) {
    $roll = $_POST['roll'];
    $total = $_POST['total'];
    $attended = $_POST['attended'];
    $_SESSION['students'][$roll]['attendance'] = round(($attended / $total) * 100, 2);
    $message = "Attendance Saved!";
}

if (isset($_POST['marks'])) {
    $roll = $_POST['roll'];
    $_SESSION['students'][$roll]['marks'] = $_POST['marks'];
    $message = "Marks Saved!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Smart Attendance Tracker</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    font-family: Arial, sans-serif;
}

.report-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    background: #f9f9f9;
}

.warn {
    color: red;
    font-weight: bold;
}
    </style>
</script>

     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VBG7ED5SH7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VBG7ED5SH7');
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4">SMART ATTENDANCE & PERFORMANCE TRACKER</h2>

    <?php if ($message != "") { ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

    <!-- Add Student -->
    <div class="card p-3 mb-3">
        <h5>Add Student</h5>
        <form method="post">
            <input type="number" name="roll" class="form-control mb-2" placeholder="Roll No" required>
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="number" name="semester" class="form-control mb-2" placeholder="Semester" required>
            <button name="add_student" class="btn btn-success">Add Student</button>
        </form>
    </div>

    <!-- Attendance -->
    <div class="card p-3 mb-3">
        <h5>Mark Attendance</h5>
        <form method="post">
            <input type="number" name="roll" class="form-control mb-2" placeholder="Roll No" required>
            <input type="number" name="total" class="form-control mb-2" placeholder="Total Lectures" required>
            <input type="number" name="attended" class="form-control mb-2" placeholder="Lectures Attended" required>
            <button name="attendance" class="btn btn-primary">Save Attendance</button>
        </form>
    </div>

    <!-- Marks -->
    <div class="card p-3 mb-3">
        <h5>Enter Marks</h5>
        <form method="post">
            <input type="number" name="roll" class="form-control mb-2" placeholder="Roll No" required>
            <input type="number" name="marks" class="form-control mb-2" placeholder="Marks out of 100" required>
            <button name="marks" class="btn btn-warning">Save Marks</button>
        </form>
    </div>

    <!-- Report -->
    <div class="card p-3">
        <h5>Student Report</h5>
        <?php
        foreach ($_SESSION['students'] as $roll => $s) {
            $marks = $s['marks'];
            if ($marks >= 75) $remark = "Good";
            elseif ($marks >= 50) $remark = "Average";
            else $remark = "Needs Improvement";
        ?>
        <div class="report-box">
            <b>Roll No:</b> <?= $roll ?><br>
            <b>Name:</b> <?= $s['name'] ?><br>
            <b>Semester:</b> <?= $s['semester'] ?><br>
            <b>Attendance:</b> <?= $s['attendance'] ?>%
            <?php if ($s['attendance'] < 75) echo "<span class='warn'> ⚠ Attendance Shortage</span>"; ?>
            <br>
            <b>Marks:</b> <?= $marks ?><br>
            <b>Performance:</b> <?= $remark ?>
        </div>
        <?php } ?>
    </div>

</div>
</body>
</html>
