<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nhập Dữ Liệu Công Việc</title>
    <link rel="stylesheet" href="styles/job-add.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <i class="fas fa-briefcase"></i>
            <h2>Form Nhập Dữ Liệu Công Việc</h2>
        </div>
        
        <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            echo "<p class='success'>$message</p>";
        }
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form action="job-add.php" method="POST" class="job-form">
            <div class="form-group">
                <label for="job_title">Tên công việc:</label>
                <input type="text" id="job_title" name="job_title" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="job_code">Mã công việc:</label>
                <input type="text" id="job_code" name="job_code" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea id="description" name="description" rows="4" class="form-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label for="responsibilities">Trách nhiệm:</label>
                <textarea id="responsibilities" name="responsibilities" rows="4" class="form-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label for="essential_requirements">Yêu cầu cơ bản:</label>
                <textarea id="essential_requirements" name="essential_requirements" rows="4" class="form-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label for="preferred_skills">Kỹ năng ưa thích:</label>
                <textarea id="preferred_skills" name="preferred_skills" rows="4" class="form-textarea"></textarea>
            </div>

            <div class="form-group">
                <label for="average_salary">Lương trung bình:</label>
                <input type="number" id="average_salary" name="average_salary" step="0.01" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="reports_to">Báo cáo cho:</label>
                <input type="text" id="reports_to" name="reports_to" class="form-input">
            </div>

            <button type="submit" class="submit-btn">Thêm Dữ Liệu</button>
        </form>
    </div>
</body>
</html>