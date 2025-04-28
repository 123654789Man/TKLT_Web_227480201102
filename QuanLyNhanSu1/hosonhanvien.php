<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "quanlynhansu");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thêm nhân viên
if (isset($_POST['them'])) {
    $maNV = $_POST['maNV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email'];
    $donViTrucThuoc = $_POST['donViTrucThuoc'];
    $chucVu = $_POST['chucVu'];
    $ngayVaoLam = $_POST['ngayVaoLam'];

    $sql = "INSERT INTO nhanvien (maNV, hoTen, ngaySinh, gioiTinh, diaChi, soDienThoai, email, donViTrucThuoc, chucVu, ngayVaoLam) 
            VALUES ('$maNV', '$hoTen', '$ngaySinh', '$gioiTinh', '$diaChi', '$soDienThoai', '$email', '$donViTrucThuoc', '$chucVu', '$ngayVaoLam')";
    $conn->query($sql);
}

// Xử lý sửa nhân viên
if (isset($_POST['sua'])) {
    $maNV = $_POST['maNV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email'];
    $donViTrucThuoc = $_POST['donViTrucThuoc'];
    $chucVu = $_POST['chucVu'];
    $ngayVaoLam = $_POST['ngayVaoLam'];

    $sql = "UPDATE nhanvien SET hoTen='$hoTen', ngaySinh='$ngaySinh', gioiTinh='$gioiTinh', diaChi='$diaChi', 
            soDienThoai='$soDienThoai', email='$email', donViTrucThuoc='$donViTrucThuoc', chucVu='$chucVu', ngayVaoLam='$ngayVaoLam' 
            WHERE maNV='$maNV'";
    $conn->query($sql);
}

// Xử lý xóa nhân viên
if (isset($_GET['xoa'])) {
    $maNV = $_GET['xoa'];
    $sql = "DELETE FROM nhanvien WHERE maNV='$maNV'";
    $conn->query($sql);
}

// Xử lý tìm kiếm
$search = isset($_POST['timKiem']) ? $_POST['timKiem'] : '';
$sql = "SELECT * FROM nhanvien WHERE hoTen LIKE '%$search%' OR maNV LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Nhân Viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 2.5em;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container input, .form-container select {
            padding: 10px;
            margin: 8px 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            width: 200px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus, .form-container select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        .form-container .btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .form-container .btn:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        td a:hover {
            color: #c0392b;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .form-container input, .form-container select {
                width: 100%;
                margin: 8px 0;
            }

            table, th, td {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <h1>HỒ SƠ NHÂN VIÊN</h1>

    <!-- Form tìm kiếm -->
    <div class="form-container">
        <form method="POST" action="">
            <input type="text" name="timKiem" placeholder="Tìm theo mã hoặc họ tên" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" class="btn" value="Tìm kiếm">
        </form>
    </div>

    <!-- Form thêm/sửa nhân viên -->
    <div class="form-container">
        <form method="POST" action="">
            <input type="text" name="maNV" placeholder="Mã NV" required>
            <input type="text" name="hoTen" placeholder="Họ Tên" required>
            <input type="date" name="ngaySinh" placeholder="Ngày Sinh">
            <select name="gioiTinh">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            <input type="text" name="diaChi" placeholder="Địa Chỉ">
            <input type="text" name="soDienThoai" placeholder="Số Điện Thoại">
            <input type="email" name="email" placeholder="Email">
            <select name="donViTrucThuoc">
                <option value="Khoa KT & CN">Khoa KT & CN</option>
                <option value="Khoa Sư phạm">Khoa Sư phạm</option>
                <option value="Khoa NN & TS">Khoa NN & TS</option>
                <option value="Khoa Kinh tế và luật">Khoa Kinh tế và luật</option>
            </select>
            <input type="text" name="chucVu" placeholder="Chức Vụ">
            <input type="date" name="ngayVaoLam" placeholder="Ngày Vào Làm">
            <input type="submit" name="them" class="btn" value="Thêm">
            <input type="submit" name="sua" class="btn" value="Sửa">
        </form>
    </div>

    <!-- Danh sách nhân viên -->
    <table>
        <tr>
            <th>Mã NV</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Đơn Vị</th>
            <th>Chức Vụ</th>
            <th>Ngày Vào Làm</th>
            <th>Hành Động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['maNV']); ?></td>
                <td><?php echo htmlspecialchars($row['hoTen']); ?></td>
                <td><?php echo htmlspecialchars($row['ngaySinh']); ?></td>
                <td><?php echo htmlspecialchars($row['gioiTinh']); ?></td>
                <td><?php echo htmlspecialchars($row['diaChi']); ?></td>
                <td><?php echo htmlspecialchars($row['soDienThoai']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['donViTrucThuoc']); ?></td>
                <td><?php echo htmlspecialchars($row['chucVu']); ?></td>
                <td><?php echo htmlspecialchars($row['ngayVaoLam']); ?></td>
                <td>
                    <a href="?xoa=<?php echo $row['maNV']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>