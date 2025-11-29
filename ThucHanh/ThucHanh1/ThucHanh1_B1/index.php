<?php
    session_start();

    $flowers = [
        ["name" => "Hoa dạ yến thảo", "desc" => "Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè.<br> Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.", "img" => "./images/dayenthao.jpg"],
        ["name" => "Hoa giấy", "desc" => "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng.<br> Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.", "img" => "./images/hoagiay.jpg"],
        ["name" => "Hoa thanh tú", "desc" => "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. <br>Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.", "img" => "./images/hoathanhtu.jpg"],
        ["name" => "Hoa đồng tiền", "desc" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. <br>Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.", "img" => "./images/hoadongtien.jpg"],
        ["name" => "Hoa đèn lồng", "desc" => "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội.<br> Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.", "img" => "./images/hoadenlong.jpg"],
        ["name" => "Hoa đỗ quyên", "desc" => "Đây là hoa đỗ quyên", "img" => "./images/doquyen.jpg"],
        ["name" => "Hoa hải đường", "desc" => "Đây là hoa hải đường", "img" => "./images/haiduong.jpg"],
        ["name" => "Hoa mai", "desc" => "Đây là hoa mai", "img" => "./images/mai.jpg"],
        ["name" => "Hoa tường vy", "desc" => "Đây là hoa tường vy", "img" => "./images/tuongvy.jpg"]
    ];

    $is_admin = isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
?>
<!DOCTYPE html>
<html lang = "vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thực hành 1</title>
    </head>
    <body>
        <?php if ($is_admin): ?>
            <h2>Chế độ quản trị</h2>
            <a href="logout.php">Đăng xuất</a>
            <br><br>
            <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Ảnh</th>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>

            <?php foreach ($flowers as $f): ?>
            <tr>
                <td><img src="<?= $f['img'] ?>" width="135"></td>
                <td><?= $f['name'] ?></td>
                <td><?= $f['desc'] ?></td>
                <td>
                    <button>Sửa</button>
                    <button>Xóa</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php else: ?>
            <h2>Bạn đang xem với tư cách khách</h2>
        <a href="login.html">Đăng nhập Admin</a>
        <br><br>

        <h1>Các loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
        <?php foreach ($flowers as $f): ?>
            <div>
                <h3><?= $f['name'] ?></h3>
                <img src="<?= $f['img'] ?>" width="300">
                <p><?= $f['desc'] ?></p>
                <hr>
            </div>
        <?php endforeach; ?>

        <?php endif; ?>
    </body>
</html>