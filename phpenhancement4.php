<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nhập Dữ Liệu Công Việc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Form Nhập Dữ Liệu Công Việc</h2>
    
    <?php
    // Hiển thị thông báo nếu có
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<p class='success'>$message</p>";
    }
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p class='error'>$error</p>";
    }
    ?>

    <form action="job-add.php" method="POST">
        <div class="form-group">
            <label for="job_title">Tên công việc:</label>
            <input type="text" id="job_title" name="job_title" required>
        </div>

        <div class="form-group">
            <label for="job_code">Mã công việc:</label>
            <input type="text" id="job_code" name="job_code" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="responsibilities">Trách nhiệm:</label>
            <textarea id="responsibilities" name="responsibilities" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="essential_requirements">Yêu cầu cơ bản:</label>
            <textarea id="essential_requirements" name="essential_requirements" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="preferred_skills">Kỹ năng ưa thích:</label>
            <textarea id="preferred_skills" name="preferred_skills" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="additional_info">Thông tin bổ sung:</label>
            <textarea id="additional_info" name="additional_info" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="average_salary">Lương trung bình:</label>
            <input type="number" id="average_salary" name="average_salary" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="reports_to">Báo cáo cho:</label>
            <input type="text" id="reports_to" name="reports_to">
        </div>

        <button type="submit">Thêm Dữ Liệu</button>
    </form>
</body>
</html>