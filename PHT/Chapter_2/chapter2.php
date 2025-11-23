<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHT Chương 2 - PHP Căn Bản</title>
    </head>
    <body>
        <h1>Kết quả PHP Căn bản</h1>
        <?php
            $ho_ten = "Vũ Hải Đăng";
            $diem_tb = 7.5;
            $co_di_hoc_chuyen_can = true;
            echo "Họ tên: $ho_ten" . "<br>Điểm: $diem_tb" . "<br>Xếp loại: ";
            if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can)
            {
                echo "Giỏi";
            }
            elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can)
            {
                echo "Khá";
            }
            elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can)
            {
                echo "Trung bình";
            }
            else
            {
                echo "Yếu (Cần cố gắng thêm!)";
            }

            function chaoMung(){
                echo "<br>Chúc mừng bạn đã hoàn thành PHT Chương 2!";
            }

            chaoMung();
        ?>
    </body>
</html>