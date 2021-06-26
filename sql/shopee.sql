-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2021 at 10:17 PM
-- Server version: 8.0.25-0ubuntu0.21.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int NOT NULL,
  `adminName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminAccount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminPass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminLevel` int NOT NULL,
  `adminImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminAccount`, `adminPass`, `adminLevel`, `adminImage`) VALUES
(1, 'Nguyễn Văn Hà', 'nvha1120@gmail.com', 'nvanha', '11fe20d2c086d1e9bfde07891255fc03', 1, 'avt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int NOT NULL,
  `productID` int UNSIGNED NOT NULL,
  `sessionID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productPrice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `productImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryID` int UNSIGNED NOT NULL,
  `categoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`categoryID`, `categoryName`, `categoryImage`) VALUES
(52, 'Thời Trang Nam', '1.png'),
(53, 'Điện Thoại &amp; Phụ Kiện', '2.png'),
(54, 'Thiết Bị Điện Tử', '3.png'),
(55, 'Máy Tính &amp; Laptop', '4.png'),
(56, 'Máy ảnh - Máy quay phim', '5.png'),
(57, 'Đồng Hồ', '6.png'),
(58, 'Giày Dép Nam', '7.png'),
(59, 'Thiết Bị Điện Gia Dụng', '8.png'),
(60, 'Thể Thao &amp; Du Lịch', '9.png'),
(61, 'Ô tô - Xe máy - Xe đạp', '10.png'),
(62, 'Đồ Chơi', '11.png'),
(63, 'Chăm sóc thú cưng', '12.png'),
(64, 'Sản phẩm khác', '13.png'),
(65, 'Thời Trang Nữ', '14.png'),
(66, 'Mẹ &amp; Bé', '15.png'),
(67, 'Nhà Cửa &amp; Đời Sống', '16.png'),
(68, 'Sức Khỏe &amp; Sắc Đẹp', '17.png'),
(69, 'Giày Dép Nữ', '18.png'),
(70, 'Túi Ví', '19.png'),
(71, 'Phụ Kiện Thời Trang', '20.png'),
(72, 'Bách Hóa Online', '21.png'),
(73, 'Voucher &amp; Dịch vụ', '22.png'),
(74, 'Nhà Sách Online', '23.png'),
(75, 'Giặt giũ &amp; Chăm sóc nhà cửa', '24.png'),
(76, 'Thời Trang Trẻ Em', '25.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int UNSIGNED NOT NULL,
  `customerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerAccount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerPhone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerAddress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customerImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int NOT NULL,
  `productID` int UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerID` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOrder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_origin`
--

CREATE TABLE `tbl_origin` (
  `originID` int UNSIGNED NOT NULL,
  `originName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_origin`
--

INSERT INTO `tbl_origin` (`originID`, `originName`) VALUES
(1, 'Mỹ'),
(4, 'Việt Nam'),
(6, 'Trung Quốc'),
(7, 'Hàn Quốc'),
(8, 'Nhật Bản'),
(9, 'Thái Lan'),
(10, 'Nga'),
(11, 'Pháp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int UNSIGNED NOT NULL,
  `productName` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryID` int UNSIGNED NOT NULL,
  `originID` int UNSIGNED NOT NULL,
  `productDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productType` int NOT NULL,
  `productPrice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productQuantity` int NOT NULL,
  `productSold` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `categoryID`, `originID`, `productDesc`, `productType`, `productPrice`, `productQuantity`, `productSold`) VALUES
(12, 'Cardigan Black (áo khoác basic)', 65, 6, 'Thêm một lựa chọn màu nữa cho những bạn yêu thích phong cách đơn giản mà vẫn xinh nha. Khoác đi đâu cũng hợp hết luôn cơ hehe. \r\nÁo có 2 lựa chọn size \r\nM: dài 69-70cm ngang 60cm\r\nL: dài 74cm ngang 64cm ', 0, '385000', 50, 12),
(16, 'Mũ lưỡi trai ❤️ Nón kết thêu chữ Memorie phong cách Ulzzang form unisex nam nữ N01', 52, 6, '- MÀU SẮC: Đen, hồng, kem, xanh mint\r\n- Chu vi nón: 56-58cm, có thể điều chỉnh kích cỡ với khóa kéo sau chắc chắn\r\n- Chất liệu: Nỉ gân cotton dày mịn, thoáng mát\r\n- Phương pháp dệt: dệt trơn, có thêu chữ và hoa văn\r\n- Sản xuất: Xưởng SX và Gia Công Nón Mũ Theo Yêu Cầu HP Fashion', 0, '38000', 100, 18),
(17, 'SWEATER LOGO MST', 52, 4, 'SIZE S từ M45 đến M53, Từ 30KG đến 46KG\r\nSIZE M từ M53 đến M68, Từ 46KG đến 58KG \r\nSIZE L từ M7 đến M78, Từ 59KG đến 80KG \r\n\r\nÁo form ÂU nên các bạn cẩn thận trước khi mua , tránh bị to quá nhé\r\n\r\nChat với chúng mình để đc tư vấn rõ hơn', 0, '350000', 200, 0),
(18, 'Áo thun tay dài THE 1992 Giữ nhiệt thể thao nam 2C', 52, 4, 'Hướng dẫn chọn size bộ đồ nam:\r\n- M (45-55Kg, <1m67)\r\n- L (55-65Kg, <1m73)\r\n- XL (65-75Kg, <1m77)\r\n- 2XL (75-85Kg, <1m80)\r\n- 3XL (85-95Kg, <1m85)\r\n- Quý khách nếu thích mặc form thoải mái nên lấy tăng 1 2 size', 0, '39000', 500, 0),
(24, 'Ốp lưng iphone Color Mojito cạnh vuông BVC 5s/6/6plus/6s/6splus/7/7plus/8/8plus/x/xr/xs/11/12/pro/max/plus/promax', 53, 6, 'Thông tin sản phẩm: \r\n- Chất liệu: Nhựa dẻo\r\n- Màu sắc: Nhiều Màu.\r\n- Ốp lưng được đóng gói bằng túi nilon thiết kế đẹp.\r\n- Hình ảnh chất lượng cao,sắc nét, không phai màu.\r\n- Hình ảnh thiết kế đẹp, phong cách, trẻ trung.\r\n- Công dụng: Là phụ kiện thời trang, thay đổi màu sắc cho điện thoại, giữ điện thoại chắc chắn trên tay, an toàn chống trầy xước,  bảo vệ chiếc điện thoại khỏi va đập.', 0, '1000', 1000, 0),
(25, 'Kính cường lực iphone 15D REMAX full màn 5/5s/6/6s/7/7plus/8/8plus/plus/x/xr/xs/11/12/pro/max/Shin Case', 53, 6, 'Shin Case đảm bảo: \r\n- Hình ảnh sản phẩm giống 100%.\r\n- Chất lượng sản phẩm tốt 100%.\r\n- Sản phẩm được kiểm tra kĩ càng, nghiêm ngặt trước khi giao hàng.\r\n- Sản phẩm luôn có sẵn trong kho hàng. \r\n- Giao hàng ngay khi nhận được đơn hàng.\r\n- Hoàn tiền ngay nếu sản phẩm không giống với mô tả.\r\n- Đổi trả ngay nếu bất kì lí do gì khiến quý khách không hài lòng.\r\n- Giao hàng toàn quốc, nhận hàng thanh toán. \r\n- Hỗ trợ đổi trả theo quy định.\r\n- Gửi hàng siêu tốc : Với đội ngũ hơn 100 nhân viên Shin case cam kết dịch vụ đóng gói siêu nhanh.', 1, '19000', 10, 25),
(26, 'Kính cường lực iphone 21D full màn 5/5s/6/6s/7/7plus/8/8plus/plus/x/xr/xs/11/12/pro/max/Shin Case', 53, 4, 'Shin Case đảm bảo:\r\n- Mang lại cho quý khách những sản phẩm tốt nhất, đẹp nhất.\r\n- Nếu hàng bị lỗi do sản xuất. Shin Case cam kết sẽ hoàn tiền hoặc gửi lại sản mới thay thế cho quý khách.\r\n- Thương hiệu tạo niềm tin!\r\n\r\nMô tả sản phẩm Kính Cường lực Iphone\r\n- Thiết kế: Bo khít máy\r\n- Chất liệu: Kính\r\n- Dòng máy tương thích: iphone 5/5s/6/6plus/6s/6s plus/6/7/7plus/8/8plus/x/xs/xs max/11/11 pro/11 promax\r\n- Xuất xứ: Việt Nam', 1, '5000', 50, 0),
(27, 'Ốp lưng iphone Water Color cạnh vuông BVC 6/6plus/6s/6splus/7/7plus/8/8plus/x/xr/xs/11/12/pro/max/plus/promax', 53, 4, 'THÔNG TIN SẢN PHẨM:  Ốp lưng iphone 5/5s/6/6s/6plus/6splus/7/8/7plus/8plus/x/xs/xs max/11/11pro max/12/12pro max.  \r\nMã Sản Phẩm: Ốp lưng iphone Water Color cạnh vuông BVC 6/6plus/6s/6splus/7/7plus/8/8plus/x/xr/xs/11/12/pro/max/plus/promax-Awifi A1-9\r\n Màu sắc sản phẩm : \r\n- Ốp lưng được đóng gói bằng túi nilon thiết kế đẹp.\r\n- Mực in chất lượng cao,sắc nét, không phai màu, không gây hại cho da,\r\n- Hình ảnh thiết kế đẹp, phong cách, trẻ trung.\r\n- Công dụng: thay đổi màu sắc cho điện thoại, giữ điện thoại chắc chắn trên tay, an toàn chống trầy xước,  bảo vệ chiếc ốp khỏi va đập.\r\nHướng dẫn sử dụng sản phẩm Ốp lưng iphone 5/5s/6/6s/6plus/6splus/7/8/7plus/8plus/x/xs/xs max/11/11pro max.\r\n- Không nên để ốp lưng, bao da dưới sàn nhà. \r\n- Để nơi thoáng mát sẽ giúp bảo quản.\r\n- Để xa tầm tay trẻ em.\r\n- Xuất xứ: Việt Nam', 0, '22000', 200, 32),
(28, 'Quần ống rộng suông khoá trước', 65, 8, '💥Quần ống suông : là mẫu quần có ống quần thẳng, tương đối rộng rãi. Kiểu quần này rất được lòng các quý cô bởi vừa mang lại cảm giác thoải mái, vừa che khuyết điểm bắp chân to,chân cong rất hiệu quả. \r\n💥Thiết kế : cạp cao ken bụng,tôn dáng kéo dài đôi chân cho cô nàng tạo vẻ bề ngoài cực sang chảnh.\r\n🎈ĐẸP MÊ LY,YÊU LUÔN TỪ CÁI NHÌN ĐẦU TIÊN!!\r\n💥QUẦN ỐNG SUÔNG CAO CẤP!!\r\n🎗️Kiểu dáng : ống rộng 24cm, dài 92cm\r\n🎗️Chất vải: dày dặn,mềm,đứng vải ,sóng\r\n🎗️Khóa trước \r\n🎗️Có 3 màu: Be,trắng,đen\r\n🎗️Sz :( S- M-L-XL-2Xl)\r\n      S: eo 68,mông 86-89,dài 90\r\n      M: eo 70,mông 89-91,dài 90\r\n      L: eo 72,mông 92-94,dài 90\r\n     XL:eo 74-75,mông 96, dài 90 \r\n     2Xl: eo 76-77,mông 98,dài 90', 0, '75000', 100, 0),
(29, 'Quần ống rộng chất tuyết mưa', 65, 4, '🌸 🌸 size S lưng rộng 62 chiều dài 89cm ,mông 85\r\n    🦋ước lượng cân nặng: <44kg, cao > 1m55\r\n\r\n🌸size M lưng rộng 68chiều dài 89cm ,mông 88\r\n    🦋ước lượng cân nặng:44-48kg, cao> 1m55\r\n\r\n🌸size L lưng rộng 75 dài 90cm ,mông 92\r\n    🦋ước lượng cân nặng: 48-53kg  , cao >1m55\r\n\r\n🌸size Xl lưng rộng 84 chiều dài 90cm mông 98\r\n    🦋ước lượng cân nặng: 53-58kg, cao >1m55\r\n\r\n🌸 size 2xl 58-62kg lưng rộng 90 mông 102', 0, '79000', 2000, 0),
(30, 'Chân Váy Xếp Ly Ngắn Chữ A Madela Kiểu Tennis phong cách Công Sở, Váy Xếp Li Tennis dáng Chữ A lưng cao', 65, 8, 'Thông tin váy xếp ly: \r\n- Tên sản phẩm: chân váy xếp li MADELA\r\n- Màu sắc: Đen, Nâu\r\n- Đặc điểm thiết kế: Chân váy xếp li lưng cao, có quần trong chống lộ, có khóa kéo lệ hông\r\n\r\nThông số sản phẩm Váy xếp ly\r\nChiều dài váy/ Cân nặng/ Vòng eo\r\n- S: dưới 46kg, eo < 68, mông <85\r\n- M: dưới 50kg, eo < 72, mông 86-90\r\n- L: dưới 55kg, eo 72-75, mông 90-100\r\n- XL: dưới 60kg, eo 75-80, mông 100-105', 0, '69000', 500, 0),
(31, 'Tai nghe True Wireless Amoi F9 PRO Bluetooth 5.0 | Bản Quốc Tế | Cảm Ứng | Chống Nước', 54, 6, 'Phiên bản cải tiến của Amoi F9 5.0 huyền thoại\r\nTai nghe vẫn cho thời lượng nghe nhạc liên tục 5-6 tiếng, dock sạc sạc đc ~ 20 lần cho tai nghe với dung lượng 2000mAh\r\nPhụ Kiện Tony giới thiệu với quý khách bản nâng cấp Amoi F9 PRO Bluetooth 5.0\r\nAmoi F9 có rất nhiều hàng nhái, chất âm kém, bass không nảy, nên ace hãy là người tiêu dùng thông thái\r\nShop có dán giấy cho khách kiểm tra hàng trước khi thanh toán lên mọi người có thể nghe thử ưng mới nhận hàng ạ\r\nVới cải tiến kiểu dáng, độ hoàn thiện cũng như chất liệu đc chau chuốt và đẹp hơn phiên bản cũ, sử dụng công nghệ Bluetooth 5.0 tiên tiến đem lại hiệu quả âm thanh cực chất\r\nPhiên bản cảm ứng chất âm ngon hơn, bass sâu hơn, cảm ứng nhạy hơn \r\nTương thích với tất cả các loại điện thoại và máy tính bảng\r\nChạm 1 lần là tạm dừng\r\nChạm 2 lần là next bài\r\nChạm 3 lần bên phải là tăng âm, 3 lần bên trái là giảm âm\r\nHỗ trợ đàm thoại mượt hơn, ko bị delay như phiên bản cũ\r\nĐặc biệt dock sạc làm sạc dự phòng khi cấp back luôn, có thể sạc cho điện thoại\r\nSản phẩm là hàng chính hãng\r\n1 bộ sản phẩm gồm Dock sạc, 2 tai nghe, 2 bộ núm thay thế, 1 dây sạc micro USB\r\nBH 6 tháng lỗi đổi mới', 0, '165000', 200, 0),
(32, 'Tai nghe bluetooth cao cấp định vị Đổi tên dùng cho IOS và Android', 54, 6, '⭐Thông số kỹ thuật: \r\n - Bluetooth phiên bản: V5.0\r\n - Khoảng cách kết nối ổn định thực tế : 15-20 mét\r\n - Thời gian nghe nhạc : khoảng 4-5 tiếng\r\n - Thời gian đàm thoại: khoảng 4 tiếng\r\n - Thời gian chờ: 6 Tiếng\r\n - Thời gian Sạc: ~ 70 phút\r\n - Thời gian sạc cho hộp: ~ 1 tiếng\r\n▪️ Bass cực Phê - đẳng cấp \r\n- Dễ dàng thao tác bằng cảm ứng để nhận cuộc gọi, nghe hoặc tạm dừng đoạn nhạc, tiện lợi khi không cần thao tác nhiều trên điện thoại\r\n- Sạc pin cho tai nghe dễ dàng qua cổng sạc Lightnin hoặc có thể sạc không dây nhờ được trang bị chuẩn sạc Qi hiện đại.\r\nHƯỚNG DẪN SỬ DỤNG : \r\n- Đối với dt ios:\r\nBước 1: Mở nắp thiết bị và để gần ip của bạn\r\nBước 2: Điện thoại sẽ mở ra pop up yêu cầu kết nối, bạn làm theo hướng dẫn để kết nối\r\nBước 3: Vào cài đặt bluetooth để tùy chỉnh tên và thao tác chạm \r\n- Đối với điện thoại androi\r\nBước 1: Mở nắp thiết bị và vào phần cài đặt mở bluetooth điện thoại lên\r\nBước 2: Dò thiết bị và kết nối với thiết bị\r\n->Lưu ý: Đối với điện thoại androi thao tác chạm là: \r\n- 2 chạm sẽ dừng nhạc\r\n- 3 chạm sẽ chuyển bài\r\n❤ Tuỳ chọn đổi tên trong cài đặt bluetooth, tuỳ chọn chế độ chạm tai 2 lần\r\n❤ Định vị tai nghe, báo về gmail không khác 1 chút gì\r\n❤  Âm thanh trong trẻo, bass treb đầy đủ và vô cùng hay\r\n❤ Pin tai nghe hoạt động liên tục 3-4h tuỳ âm lượng, dock sạc full 3 lần tổng thời gian nghe tới ~15h. Thực tế khách hàng sử dụng không ai có thể nghe liên tục quãng thời gian như vậy, nên tính trung bình 3-4 ngày mới phải cắm sạc', 0, '259000', 400, 0),
(33, 'REMOTE ĐIỀU KHIỂN TIVI SAMSUNG 4K SMART CONG (LƯNG ĐEN-KHÔNG VOICE-GIÁ THƠM)', 54, 4, 'LƯU Ý: 1 TIVI CHỈ KẾT NỐI ĐƯỢC VỚI 1 REMOTE ĐIỀU KHIỂN BẰNG GIỌNG NÓI\r\n \r\nBƯỚC 1: Hủy ghép nối remote cũ khỏi TV.\r\n\r\nTháo pin khỏi REMOTE CŨ\r\nBƯỚC 2: Ghép nối remote mới với TV.\r\n\r\nChĩa REMOTE MỚI vào mắt thần của tivi ở khoảng cách 30cm\r\nBấm và giữ cùng lúc 2 nút Return và Play/Pause như hình dưới từ 3-5 giây\r\n​​​​\r\n\r\nMàn hình xuất hiện biệu tượng kết nối Bluetooth thì thả 2 nút trên ra\r\nTivi sẽ tự động thực hiện cấu hình ghép nối với remote trong 3-5 giây\r\nMàn hình xuất hiện dòng chữ “Pairing complete” hoặc “Ghép nối thành công”\r\nBạn đã có thể sử dụng One remote\r\nLập lại các bước trên nếu ghép nối lần đầu không thành công và \r\nCHÚC BẠN CÓ TRẢI NGHIỆM TUYỆT VỜI VỚI SAMSUNG ONE REMOTE', 1, '27600', 50, 0),
(34, 'Mặt Nạ Focallure Cấp Ẩm Dưỡng Ẩm Làm Trắng Da Chăm Sóc Da Mặt 25g', 68, 7, 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\r\n  \r\n  5 Mặt nạ giấy năng lượng mới từ Focallure. Giải quyết mọi rắc rối về da cho các loại da khác nhau, tiêm năng lượng vào da, trẻ hóa da.\r\n  \r\n  Lô hội: Dưỡng ẩm sâu. Thành phần chứa một hàm lượng lớn lô hội và rau má giúp làm dịu da và phục hồi làn da bị cháy nắng do tác động mạnh của ánh nắng mặt trời / tia UV. Sản phẩm cung cấp độ ẩm cho da và phù hợp với mọi loại da.\r\n  Cây trà: Kiềm dầu & chăm sóc cho da mụn. Tinh chất tràm trà của Úc được chọn lọc, bổ sung năng lượng cho da dầu và da bị mụn, hỗ trợ giảm mụn cám và mụn đầu đen, kiểm soát lượng dầu nhờn tiết ra, giúp da đạt được trạng thái cân bằng lượng nước và dầu.\r\n  Mật ong: Dưỡng ẩm và làm mềm da. Phục hồi độ ẩm cho làn da khô, và mang lại năng lượng cho làn da mệt mỏi với hương thơm dịu nhẹ của mật ong. Là sự lựa chọn hàng đầu cho những người có làn da khô và hiệu ứng lớp trang điểm bị vón cục.\r\n  Nicotinamide: Nâng tông màu da. Nicotinamide cải thiện tình trạng làn da xỉn màu và làm đều tông màu da. Đồng thời với thành phần diếp cá chống bức xạ, rất lý tưởng cho làn da sạm / da xỉn màu do tiếp xúc lâu với máy tính, điện thoại.\r\n  Vitamin C: Làm trắng da. Thành phần giàu vitamin C, có công dụng làm giảm sự tích tụ melanin trên da, giảm vết thâm mụn và chống dị ứng, chống oxy hóa, chống dị ứng, giúp cho da trở nên mỏng manh, mịn màng và đàn hồi, có hương cam nhẹ nhàng.\r\n  \r\n  Mặt nạ hỗ trợ giảm mụn chiết xuất từ tràm trà sử dụng giấy than có thể nhanh chóng hút đi lượng dầu thừa trên da mặt.\r\n  4 Loại mặt nạ còn lại tất cả đều sử dụng giấy lụa, điều này sẽ giúp da mặt cảm thấy thoải mái khi sử dụng mặt nạ và thẩm thấu được các dưỡng chất vào da một cách hiệu quả hơn\r\n  \r\n  \r\n  Nha đam: Dưỡng ẩm sâu ， phục hồi sau khi bị cháy nắng.\r\n  Cây trà: Kiềm dầu và chăm sóc da mặt hỗ trợ giảm mụn.\r\n  Mật ong: Dưỡng ẩm.\r\n  Nicotinamide: Nâng cơ mặt và chống tia bức xạ.\r\n  Vitamin C: Giải pháp làm trắng & hỗ trợ giảm nám ， Chống oxy hóa và chống dị ứng.\r\n  \r\n  Hướng dẫn sử dụng:\r\n  1. Rửa sạch da mặt bằng nước ấm\r\n  2. CẨN THẬN MỞ MẶT NẠ VÀ ĐẮP LÊN MẶT\r\n  3. Đợi trong vòng 15-20 phút\r\n  4. Gỡ mặt nạ xuống và mát xa mặt cho đến khi tinh chất được thẩm thấu hoàn toàn\r\n  \r\n  \r\n  Thành phần:\r\n  Lô hội: Lô hội, Rau má, Betaine, Cây phỉ\r\n  Mật ong: Mật ong, collagen thủy phân, natri hyaluronate\r\n  Nicotinamide: Nicotinamide, natri hyaluronate, diếp cá, tầm ma\r\n  Vitamin C: Vitamin C, lựu, astaxanthin, cam thảo\r\n  Cây trà: Cây trà, rễ cây hoàng cầm, yến mạch, xương rồng\r\n  \r\n  Thương hiệu: FOCALLURE\r\n  Nguồn gốc: Trung Quốc\r\n  Thời hạn sử dụng: 3 Năm\r\n  Bảo quản: Nơi khô mát', 0, '9000', 2000, 0),
(35, 'Nước hoa hồng Dear Klairs Supple Preparation toner 180ml', 68, 7, '* Thành phần và công dụng:\r\n\r\n- Sodium Hyaluronate: Cấp nước vượt trội, giúp da được ẩm mượt và mềm mại.\r\n- Phyto-Oligo: dưỡng ẩm, giúp da không bị khô.\r\n- Axit Amin lúa mì: cung cấp độ ẩm sâu.\r\n- Properies: giảm tình trạng mẩn đỏ trên da và mụn trứng cá.\r\n- Kết cấu sản phẩm là dạng lỏng nhưng nó lại có một độ sánh nhất định, nên sau khi thoa lên da bạn sẽ cảm thấy da được cung cấp một lượng nước và độ ẩm rất lớn.\r\n\r\n* Đối tượng sử dụng:\r\nphù hợp sử dụng cho mọi loại da.\r\n\r\n* Hướng dẫn sử dụng:\r\n- Dùng sau sữa rửa mặt để cân bằng lại độ pH cho da.\r\n- Thấm 3-4 giọt ra bông tẩy trang thoa đều lên mặt, hoặc đổ trực tiếp lên tay vỗ nhẹ để nước hoa hồng thấm đều vào da.', 0, '239000', 800, 0),
(36, 'Kệ để màn hình máy tính màu trắng PlyConcept Monitor Stand', 55, 6, '* Hai vấn đề mà mọi người sử dụng Imac và desktop hay gặp phải đó là: \r\n1/ Đa số các màn hình máy tính hiện tại được thiết kế khá thấp nên khi làm việc bạn phải cuối người xuống thì mới trong tầm nhìn của mình; dẫn đến làm việc lâu sẽ gây ảnh hưởng đến cột sống, vai và lưng ... \r\n2/ Keyboard và Mouse khi không dùng đến sẽ chình ình 1 đống trên bàn gây làm tốn không gian làm việc hiệu quả của bạn. \r\n\r\n* Với Kệ màn hình Plyconcept Monitor Stand màu trắng thì mọi sự khó chịu của bạn sẽ được dẹp bỏ trong vòng 30 giây. Kệ Imac Joy Stand sẽ nâng độ cao của màn hình lên để khi làm việc bạn luôn ngồi thẳng theo đúng tỷ lệ an toàn cho cột sống; ngoài ra nó còn cung cấp nơi để cất các Keyboard và Mouse khi bạn cần không gian để viết, vẽ, thiết kế và làm việc khác không liên quan đến máy tính. \r\n\r\nThông số Kỹ Thuật:\r\n* Kích thước: Ngang 49 cm x Sâu 20 cm x Cao 9 cm (+- 5 mm)\r\n* Công nghệ uốn cong gỗ Plywood nguyên khối, độc đáo, vật liệu phủ ngoài là Laminate WILSON ART màu trắng chống trầy, dễ lau chùi, không bị cũ, chịu lực nặng hơn 70 kg.\r\n* Chất liệu tự nhiên an toàn và thân thiện với người sử dụng. ', 0, '199000', 30, 0),
(37, 'Giá treo màn hình xoay 360 độ - Chân đứng - Tay dài 23 cm, XL03', 55, 6, 'Giá treo màn hình máy tính - Chân đứng - Xoay 360 độ\r\nGiá treo màn hình hiện nay là phụ hiện công nghệ cần thiết cho những người sử dụng máy tính đặt bàn\r\nKhả năng thay đổi chiều cao của màn hình tùy vào vị trí khách hàng ngồi xem - làm việc - hoặc giải trí\r\nGiá treo màn hình có thể xoay 360 độ ( dọc hoặc ngang tùy ý )\r\nDễ dàn lắp đặt - kẹp vào thành bàn làm việc\r\n\r\nThông số kỹ thuật sản phẩm giá treo màn hình:\r\n* Tương thích màn hình 17 - 27 inch hoặc màn lớn hơn cân nặng < 7 Kg\r\n* Tương thích chuẩn tâm lỗ VESA 50 x 50 cho tới 100 x 100 mm\r\n* Cần tay dài 23 cm\r\n* Chiều cao cột đứng 40 cm\r\n* Độ dày bàn kẹp 15 - 90 mm\r\n#tivi #giatreo #giatreotivi #giatreotuong #giatreonghieng #tivitreotuong #ketivi #khungtreo #khungtreotivi #giatreogatgu #ketivinghieng\r\nPhukienhn18 chuyên cung cấp các sản phẩm công nghệ thông minh như giá treo ti vi, giá treo tường, giá treo nghiêng, giá treo gật gù, giá treo thả trần,giá treo máy chiếu.... trên nhiều khu vực như Thanh xuân, Hà Đông,Bắc NInh, Bắc GIang....\r\nLiên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất!!!', 0, '253000', 10, 0),
(38, 'Màn hình máy tính cong Full Viền 24inch 75Hz HUGON Q24 , Mới 100% , siêu đẹp , siêu nét , kiểu ráng tinh tế', 55, 6, 'MÔ TẢ:\r\nMàn HUGON Model Q24-  EAGLE Q24 Cong Full Viền\r\nKích thước màn hình 24inch Cong\r\nĐộ phân giải Full HD (1920x1080)\r\nTỉ lệ 16:9\r\nĐộ sáng 250cd/m2\r\nĐộ tương phản 2000000:1\r\nTần số quét\r\nKết nối: Có 2 cổng  VGA và  HDMI \r\nThời gian đáp ứng 2ms\r\nGóc nhìn 178°/178°\r\nĐiện năng tiêu thụ 35W\r\nPhụ kiện Cáp nguồn, Cáp HDMI', 0, '3199000', 999, 0),
(39, 'Màn Hình Dell U2419H 23.8\" WHD LED 1920x1080 HDMI DP USB 3.0 (U2419H) - Chính Hãng', 55, 8, 'Tên sản phẩm: Màn hình LCD Dell 24\" U2419H\r\n- Kích thước: 24\"\r\n- Độ phân giải: 1920 x 1080 ( 16:9 )\r\n- Công nghệ tấm nền: IPS\r\n- Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 60Hz\r\n- Thời gian phản hồi: 8 ms\r\n\r\nMàn hình Dell Ultrasharp 24″ U2419H (FHD/IPS) cho hiệu suất màn hình ấn tượng: Trải nghiệm độ rõ nét vượt trội trên màn hình tuyệt vời với độ phân giải Full HD (1920×1080), kích thước hiển thị của tấm nền lên tới 23.8″ trên tổng kích thước màn hình 24″.\r\n\r\nTính nhất quán màu đạt tiêu chuẩn: Màn hình Màn hình Dell Ultrasharp 24″ U2419H được hiệu chỉnh tại nhà máy với độ bao phủ 99% sRGB, thông số Delta-E < 2 cho tái tạo màu sắc chính xác. Ngoài ra, với độ bao phủ 99% Rec709 và 85% DCI-P3, bạn sẽ thấy màu sắc chân thực ở mọi định dạng video.\r\n\r\nLuôn là chế độ xem tốt nhất: Trải nghiệm hình ảnh ở màu sắc nhất quán, rực rỡ trên một góc nhìn rộng được kích hoạt bằng công nghệ In-Plane Switching (IPS).\r\n\r\nThiết kế sáng tạo\r\nVới thiết kế màn hình thời trang (chỉ mỏng nhất 6,5mm) và chân đế nhỏ gọn nhỏ hơn khoảng 30% so với phiên bản tiền nhiệm, bạn có thể tiết kiệm không gian bàn làm việc một cách thiết thực nhất.\r\n\r\nĐiều chỉnh để phù hợp: Thiết kế mã màn hình dell U2419H chỉ thay đổi tại trục quay. Ngoài ra màn hình DELL U2419H cũng được thiết kế mỏng hơn so với P2719H. Chính vì thế màn hình dell UltraSharp U2419H thoạt nhìn sang trọng và thanh mảnh hơn chiếc P2719H rất nhiều. Xoay, nghiêng, và điều chỉnh chiều cao của màn hình để có một thiết lập thoải mái cho bạn suốt cả ngày. Thiết kế cải tiến với bản lề trên riser, giúp điều chỉnh dễ dàng hơn trong khi vẫn giữ riser ở cùng một vị trí.\r\n\r\nGọn gàng: Tập trung vào công việc của bạn trong khi che giấu sự lộn xộn của các loại dây cáp với thiết kế quản lý cáp được cải tiến.\r\n\r\nDễ nhìn: Màn hình được chứng nhận TUV2, công nghệ Flicker-Free chống nháy hình với ComfortView, một tính năng giúp giảm phát xạ ánh sáng xanh có hại. Nó được thiết kế để tối ưu hóa sự thoải mái cho mắt ngay cả trong một khoảng thời gian dài.\r\n\r\nTối đa hóa năng suất của bạn\r\nMở rộng hiệu quả của bạn: Thiết kế InfinityEdge gần như không viền cho phép bạn tận hưởng chế độ xem gần như liền mạch nội dung của mình trên nhiều màn hình ghép vào. Và với màn hình kép, bạn có thể tăng năng suất lên tới 18%.\r\n\r\nPhụ kiện đi kèm: dây nguồn và dây DisplayPort\r\n\r\nThông tin bảo hành:\r\nBảo hành 36 tháng\r\nLink kiểm tra thông tin bảo hành tại www.Support.Dell.com\r\nSố điện thoại hỗ trợ kỹ thuật Dell miễn phí 24/7: 1800 54 54 55\r\n\r\nĐịa chỉ TTBH Dell tại:  \r\n- HCM: 23 Nguyễn Thị Huỳnh, P.8, Phú Nhuận - 028 3842 4342\r\n- Hà Nội: 110 Phố Thái Thịnh, P. Trung Liệt, Q. Đống Đa - 024 3537 5858\r\n- Đà Nẵng: 36 Hàm Nghi, P. Thạc Gián, Q.Thanh Khê - 0236 3653848\r\n- Cần Thơ: 211/2 Nguyễn Văn Linh. Q Ninh Kiều - 029 2378 3599\r\nThời gian làm việc:\r\n- Tp. HCM: Thứ Hai đến thứ Sáu (8:00 - 19:00), thứ Bảy (8:00 - 17:30)\r\n- Hà Nội, Đà Nẵng, Cần Thơ: Thứ Hai đến thứ Bảy (8:00 - 17:30)\r\n-----\r\nĐịa chỉ TTBH của NPP PSD\r\n- HCM: 185 Nguyễn Oanh ,Phường 10,Gò Vấp - 028 3894 2095\r\n- Hà Nội: Tầng B1, Số 167 Phố Trung Kính, Phường Yên Hòa, Quận Cầu Giấy - 024 3793 1236\r\n- Đà Nẵng: 124 Hà Huy Tập, Q Thanh Khê, Đà Nẵng - 0236 3715890\r\n- Cần Thơ: 140-142, đường A3, KDC Hưng Phú 1, P. Hưng Phú, Quận Cái Răng - 0292 3918626\r\nThời gian làm việc:\r\n- Thứ 2- Thứ 6 (8.30am - 12.00pm, 1.00pm - 5.30pm)\r\n- Thứ 7 (8.00am – 12.00 pm)\r\nLưu ý: cần mang hóa đơn mua hàng khi đến TTBH NPP PSD', 0, '5350000', 100, 0),
(40, 'Áo croptop tay dài cột nơ màu trắng', 65, 7, 'SẢN PHẨM ĐƯỢC MAY VÀ CHỤP ẢNH BỞI PINKYSTORE\r\n\r\n❌Áo chưa kèm áo trong nha ạ, áo dây mặc bên trong shop có bán luôn ạ, đang được sale giá chỉ 22k thôi đó khách ơi 😽\r\n\r\nTụi mình vừa ra mắt mẫu áo rất là xinh và hợp với thời tiết mùa này lắm đây khách ơiii 🥰 Áo form siêu tôn dáng và dễ mặc lại giữ ấm tốt lắm ý (À các bạn ở Sài Gòn cũng đừng lo bị nóng nha mặc dù là tay dài nhưng áo có độ thấm hút mồ hôi mặc thoải mái lắm nè ^^)\r\n\r\n👉🏻Bạn mẫu cao 1m68 và 52kg ạ \r\n\r\n✍🏻Áo kiểu tay dài form croptop (chiều dài áo tầm 38-39cm, tuỳ chiều cao sẽ mặc ngang rốn hoặc trên rốn chút xíu ạ) Form này phần thân áo hơi rộng một chút xíu chứ ko ôm như mẫu cúc dọc khách nha\r\n✍🏻Được may bằng vải cotton borib co dãn 4 chiều và thấm hút mồ hôi tốt, độ dày vải vừa phải ko quá dày nhưng đảm bảo ko mỏng đâu ạ ^^ Chất liệu vải siêu tốt này làm nên chất lượng áo trước giờ của Pinky tụi mình ý ❤️\r\n✍🏻Dây nơ trước áo thả tự do khách tự cột theo ý thích nha ạ\r\n✍🏻Áo có các màu: Đen, Trắng, Tím pastel, Hồng pastel và Xanh biển \r\n✍🏻Áo freesize có độ co dãn dưới 55kg mặc vừa xinh ạ, khách nhắn tin cho mình để được tư vấn kĩ hơn nhen \r\n\r\n👉🏻KHÁCH LƯU Ý GIẶT TAY ĐỂ GIỮ ÁO TỐT NHẤT Ạ\r\n\r\n❌PINKYSTORE CHỈ NHẬN ĐỔI TRẢ CHO LỖI SẢN XUẤT Ạ MONG KHÁCH YÊU THÔNG CẢM NHA', 0, '55000', 90, 0),
(41, 'Quần Jogger NQ30_store Chất Nỉ Da Cá Bò Sữa Bo Gấu Nam Nữ Trắng Unisex', 65, 7, 'Quần Jogger Ống Rộng Nỉ Bò Sữa Bo Gấu NQ30store Nam Nữ Unisex, Quần Dài Ống Rộng\r\n\r\n- Một mẫu jogger họa tiết bò sữa cực kì kute phô mai que luôn nha, form siêu rộng siêu thoải mái, quần bo dưới vừa phải.\r\n- Chất nỉ nhà tớ là hàng xuất nên cực đẹp ạ, form phù hợp cho cả nam và nữ nha, chất nỉ mặc mát thích hợp cho mùa hết đầy nóng bức.\r\n- Năm nay jogger ống rộng lên ngôi vì vậy hãy sắm cho mình những mẫu jogger #NQ30_store để có những set đồ đẹp cho mình nhé mọi người.\r\n- Bảng size cụ thể: \r\nSize M: dưới 1m6, nặng dưới 55kg\r\nSize L: dưới 1m65, nặng dưới 65kg \r\nSize XL: dưới 1m75, nặng dưới 75kg\r\n\r\n Khách hàng khi nhận được hàng nếu có sự không ưng ý về sản phẩm hãy khoan đánh giá vội mà hãy nhắn tin ngay cho shop để được hỗ trợ đổi trả nhé ạ.\r\nKhách hàng đánh giá 5 sao kèm hình ảnh cho đơn hàng sẽ được shop ưu tiên giảm 5k cho đơn hàng kế tiếp ạ.', 0, '105000', 200, 0),
(42, 'Váy ngủ hai dây đầm ngủ thun mềm mịn có đệm ngực đuôi xếp li ( tặng kèm bịt mắt )', 65, 4, 'Váy ngủ hai dây đầm ngủ thun mềm mịn có đệm ngực đuôi xếp li ( tặng kèm bịt mắt )\r\n* Sản phẩm BEST SELLER tại TIPI SHOP\r\n- Váy dạng xuông hình chữ A, dưới chân váy có dập li đuôi cá tạo cảm giác bồng bềnh, dễ thương\r\n- Váy rất dễ mặc phù hợp cho cả bà bầu, phụ nữ mang thai, thiết kế dấu bụng hoàn hảo cho các bạn mi nhon\r\n- Dây áo có thể điều chỉnh, áo còn có thêm đệm mút ngực đi kèm, tha hồ thả rông mà không lo bị lộ nha\r\n- Váy được đóng góp túi zip và được tặng kèm 1 bịt mắt ngủ cùng màu\r\n- Size M: chiều dài váy 78cm ( cao từ 1m5-1m6) & cân nặng từ 40-50kg\r\n- Size L : chiều dài váy 82cm ( cao từ 1m6-1m7) & cân nặng từ 50-60kg\r\n\r\n🧨🧨Quý khách lưu ý\r\n -  Ảnh sản phẩm do Tipi Shop tự chụp, đảm bảo sản phẩm giống hình, chất lượng tốt.\r\n - Khi đặt hàng vui lòng nhắn tin nếu có ghi chú về màu sắc, số lượng.. hoặc cần tư vấn về sản phẩm\r\n - Khi nhận hàng vui lòng giữ lại vỏ gói hàng và nhắn tin cho shop nếu có bất kì khiếu nại hoặc thắc mắc liên quan đến sản phẩm.\r\n\r\nTIPI SHOP đảm bảo\r\n - Hình ảnh sản phẩm giống 100%.\r\n- Chất lượng sản phẩm tốt 100%.\r\n- Sản phẩm được kiểm tra kĩ càng, nghiêm ngặt trước khi giao hàng.\r\n- Sản phẩm luôn có sẵn trong kho hàng. \r\n- Giao hàng ngay khi nhận được đơn hàng.\r\n- Hoàn tiền ngay nếu sản phẩm không giống với mô tả.\r\n- Giao hàng toàn quốc, nhận hàng thanh toán. \r\n- Hỗ trợ đổi trả theo quy định.\r\n- Gửi hàng siêu tốc\r\n#damngu #vayngu #aongu #vayhaiday #vaydichoi #vaysexy #damngudep #dongunu  #đầm_ngủ #đầm_ngủ_nữ #đầm ngủ #đồ_ngủ_nữ #đồ ngủ #quần_áo_ngủ_nữ #quần_áo_ngủ #váy_ngủ_nữ  #đồ_ngủ_hai_dây #váy_hai_dây', 0, '65000', 500, 0),
(43, 'Áo Cadigan len mỏng phong cách Hàn Quốc-AL-02', 65, 8, '🔰 Tên sản phẩm: Áo Cadigan len mỏng phong cách Hàn Quốc\r\n  - Chất liệu: Len lông thỏ\r\n  - Kiểu dáng: Cadigan\r\n  - Chi tiết: Tay thụng\r\n  - Họa tiết: Trơn\r\n  - Màu sắc: Nâu - Trắng - Kem\r\n  - Thương hiệu: Siky\r\n\r\n 🔰 Mô tả sản phẩm:\r\n   - Áo Khoác Nữ - Áo Khoác Len Nữ - Áo Khoác Len Cardigan - Áo Len Thời Trang là 1 món đồ không thể thiếu trong tủ đồ của chị em khi thời tiết trở nên se se lạnh. Ngày hôm nay, Shop xin giới thiệu sản phẩm Áo Khoác Len Cardigan kiểu dáng mới nhất năm 2020 tới chị em, để chị em có thêm 1 lựa chọn trong tủ đồ thu đông năm nay nhé\r\n\r\n 🔰 Size quần: One size\r\n\r\n 🔰 Ưu điểm:\r\n  - Dáng  thụng Uzzlang kute.\r\n  - Thiết kế  hoa văn thổ cẩm thời thượng.\r\n\r\n 🔰 Mix:\r\n  - Chỉ cần 1 chút mix match, 1 chút gu thời trang của người mặc chúng, như kết hợp với chiếc hay váy len liền thân đều phù hợp để các quý cô có một bộ trang phục chất lừ đi làm hay đi chơi rồi.\r\n\r\n 🔰 Hướng dẫn bảo quản\r\n - Giặt máy với chu kỳ trung bình và vòng quay ngắn (Tránh vắt quá mạnh)\r\n - Giặt với nhiệt độ tối đa 30 độ C\r\n - Sấy ở nhiệt độ thường\r\n - Là ủi ở nhiệt độ thấp', 0, '61620', 500, 0),
(44, 'Đồ bộ nữ cotton thun cộc tay, bộ mặc nhà chất mát cho mùa hè quần cộc áo cộc', 65, 7, 'Đồ bộ nữ cotton thun cộc tay, bộ mặc nhà chất mát cho mùa hè ( quần cộc áo cộc )\r\nChất thun cotton mỏng mát, phù hợp mặc mùa hè\r\nĐóng túi chất lượng\r\nMàu sắc : nhiều màu, khách chọn mẫu theo hình nha\r\nCó 2 size :\r\n+ sSze L từ 40-50kg\r\n+ Size Xl từ 50-60kg\r\nRất thích hợp mặc đi ngủ mùa hè, đem lại cảm giác mát mẻ dễ chịu\r\n🧨🧨Quý khách lưu ý\r\n -  Ảnh sản phẩm do Tipi Shop tự chụp, đảm bảo sản phẩm giống hình, chất lượng tốt.\r\n - Khi đặt hàng vui lòng nhắn tin nếu có ghi chú về màu sắc, số lượng.. hoặc cần tư vấn về sản phẩm\r\n - Khi nhận hàng vui lòng giữ lại vỏ gói hàng và nhắn tin cho shop nếu có bất kì khiếu nại hoặc thắc mắc liên quan đến sản phẩm.\r\n\r\nTIPI SHOP đảm bảo\r\n - Hình ảnh sản phẩm giống 100%.\r\n- Chất lượng sản phẩm tốt 100%.\r\n- Sản phẩm được kiểm tra kĩ càng, nghiêm ngặt trước khi giao hàng.\r\n- Sản phẩm luôn có sẵn trong kho hàng. \r\n- Giao hàng ngay khi nhận được đơn hàng.\r\n- Hoàn tiền ngay nếu sản phẩm không giống với mô tả.\r\n- Giao hàng toàn quốc, nhận hàng thanh toán. \r\n- Hỗ trợ đổi trả theo quy định.\r\n- Gửi hàng siêu tốc\r\n#bongu #bohe #thuncoc #quancocaococ #bongucoctay #boquanao  #bongumacnha #dobonu #bomacnha\r\n#đồ_bộ_nữ #đồ_mặc_nhà #bộ_mặc_nhà  #đồ_bộ #đồ_ngủ #bộ_ngủ_thun #quần_cộc_áo_cộc #đồ_bộ_mặc_nhà #đồ_mặc_nhà_đẹp #đồ_bộ_đẹp #đồ_mặc_ở_nhà #pijama #bộ_pijama #bộ_pijama_mặc_nhà #pijama_cộc_tay', 0, '50900', 10, 0),
(45, 'Áo hai dây Choobe dáng ôm không đệm vải cotton mịn cao cấp 2 dây nữ co giãn tốt có chốt điều chỉnh - A11', 65, 7, 'Choobe chuyên cung cấp quần áo, phụ kiện thời trang nữ. \r\nCam kết giá tốt nhất thị trường, chất lượng đảm bảo. \r\nUy tín được đảm bảo qua hàng vạn đơn hàng trên khắp cả nước\r\nĐổi trả trong vòng 7 ngày nếu hàng lỗi, sai mẫu cho quý khách.\r\nHàng sản xuất tại Việt Nam, trên dây chuyền xuất khẩu cao cấp\r\n👑 Choobe - 𝓒𝓗𝓞𝓞se us to 𝓑𝓔 your signature \r\n==> Shop xin phép giới thiệu đến các bạn mẫu sản phẩm mới: \"Áo hai dây Choobe mặc trong, chất mịn, dáng ôm, vải cotton co giãn tốt, dây có chốt điều chỉnh, nhiều màu sắc\". \r\n------------------------------------------\r\n * THÔNG TIN SẢN PHẨM:\r\n- Áo hai dây là phụ kiện không thể thiếu trong tủ đồ của các nàng, vừa mát mẻ lại cứ diện vào là “xinh hết nấc”\r\n- Áo thiết kế dáng dáng ôm quyến rũ,  hai dây có chốt điều chỉnh để có thể điều chỉnh độ dài của áo và độ trễ của ngực\r\n- Chất liệu thun co giãn 4 chiều cao cấp được xử lý bề mặt, không bai, xù qua nhiều lần giặt\r\n- Vải mềm mại và thoáng mát tuyệt đối\r\n- Đường may cẩn thận, tỉ mỉ, chắc chắn\r\n- Áo có thể kế hợp với quần jean, chân váy mang đến sự trẻ trung, năng động hay kết hợp với áo vest, áo khoác thu đông cũng rất hợp \r\n- Có 8 màu cơ bản: Đen, Trắng, Xám, Xanh min, Hồng, Nâu, Đỏ gạch và Đỏ đun\r\n* Chất liệu: Cotton co giãn 4 chiều\r\n* Freesize từ 40 - 58kg\r\n- Dài 32, ngực <94cm\r\n\r\n* Bảng size chỉ mang tính chất tham khảo, tùy thuộc vào số đo cơ thể và chất liệu vải khác nhau sẽ có sự chênh lệch nhất định. \r\n* Màu sắc vải sản phẩm có thể sẽ chênh lệch thực tế một phần nhỏ, do ảnh hưởng về độ lệch màu của ánh sáng nhưng vẫn đảm bảo chất lượng\r\n-------------------------------\r\n* CHOOBE CAM KẾT: \r\n- Choobe không bán hàng giả, hàng nhái, chất lượng luôn là hàng đầu để shop có thể phát triển thương hiệu và vươn xa. \r\n- Áo hai dây 100% giống mô tả\r\n- Tư vấn nhiệt tình, chu đáo luôn lắng nghe khách hàng để phục vụ tốt. \r\n- Giao hàng nhanh đúng tiến độ không phải để quý khách chờ đợi lâu để nhận hàng. \r\n-------------------------------\r\n* Đổi trả theo đúng quy định của Shopee \r\n1. Điều kiện áp dụng (trong vòng 07 ngày kể từ khi nhận sản phẩm): \r\n- Hàng hoá vẫn còn mới, chưa qua sử dụng \r\n- Hàng hóa hư hỏng do vận chuyển hoặc do nhà sản xuất. \r\n2. Trường hợp được chấp nhận: \r\n- Hàng không đúng size, kiểu dáng như quý khách đặt hàng \r\n- Không đủ số lượng, không đủ bộ như trong đơn hàng\r\n3. Trường hợp không đủ điều kiện áp dụng chính sách:\r\n - Quá 07 ngày kể từ khi Quý khách nhận hàng \r\n - Gửi lại hàng không đúng mẫu mã, không phải hàng của Choobe\r\n - Đặt nhầm sản phẩm, chủng loại, không thích, không hợp,...\r\n Ấn theo dõi để ủng hộ shop và tham khảo các sản phẩm mới của shop, Choobe rất hân hạnh được phục vụ quý khách.\r\n\r\n#choobe #ao #hai #day #nu #2 #aohaiday #haiday #ao2day #co #gian #om #aohaidaylua #aohaidaydep #cotton #ao2dayden #aohaidaymactrong #aohaidaymaclot', 0, '45000', 90, 0),
(46, 'Xiaozhainv Áo Blazer ngắn tay thời trang Hàn Quốc dễ phối đồ', 65, 7, 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\r\n  \r\n  \r\n  \r\n  Gói hàng bao gồm: 1 áo blazer\r\n  \r\n  \r\n  \r\n  4.27#xiaozhainv.vn \r\n  \r\n  \r\n  \r\n  Chất liệu: Khác\r\n  \r\n  \r\n  \r\n  Thành phần: 31% -50% \r\n  \r\n  \r\n  \r\n  Kích thước:\r\n  \r\n  Chiều dài 69 - Ngực 102\r\n  \r\n  \r\n  \r\n  ✨✨Lưu ý: đơn vị đo thủ công: cm\r\n  \r\n  Do các phương pháp đo khác nhau, cho phép sai số 1-3CM, điều này không ảnh hưởng chất lượng sản phẩm\r\n  \r\n  🌿Vì ánh sáng và màn hình hiển thị các lý do khác nhau, có thể khác với bảng màu, vui lòng lấy sản phẩm thật làm tiêu chuẩn\r\n  \r\n  \r\n  \r\n  🌿Bạn có thể thấy rằng cửa hàng khác bán cùng sản phẩm với giá thấp hơn chúng tôi nhưng họ không thể đảm bảo chất lượng và dịch vụ như chúng tôi.', 0, '138000', 1100, 0),
(47, 'Áo bra gym yoga bra thể thao dáng crotop hàng xịn giá rẻ alaxendre weng', 65, 7, '❤️ THÔNG SỐ ❤️ \r\nĐa năng: dùng là áo tập gym, dùng làm croptop phối đồ (vì phần lưng có điểm nhấn, và thần thân áo khá tôn dáng)\r\nMàu sắc: bảng màu đa dạng, hợp nhiều sắc da\r\n- Áo lót bra gân tăm  nâng ngực gợi cảm “mê hoặc” phái đẹp bởi nét quyến rũ trong thiết kế, đường gân sắc sảo, đường viền chân rất đẹp và thời trang \r\n- Chất liệu spandex co giãn 4 chiều vô cùng thoải mái. \r\n- Hơn cả một chiếc áo lót, bralette có thể biến hóa đa dạng phong cách từ thanh lịch, năng động đến gợi cảm và đầy lôi cuốn. \r\n- Bralette là một dạng áo ngực không gọng và không có cúp ngực nhưng lại có độ nâng đỡ dành cho những khuôn ngực từ nhỏ đến trung bình.\r\n- Kiểu áo lót bra gân tăm đan này có dây mảnh và có. Vi sợi, ren hoặc cotton là những chất liệu thường được sử dụng để làm nên áo bra nữ. \r\n- Bralette được nhiều cô gái yêu thích không chỉ vì sự thoải mái mà còn vì tính thời trang, thiết kế quyến rũ, thoải mái và khả năng kết hợp linh hoạt. \r\n- Phần cổ áo: ôm sát viền sâu gợi cảm\r\n- Phần mút lót: chất liệu cao cấp giúp nâng vòng một\r\n- Size: Free size\r\n- Phù hợp cho các chị em từ 40 kg đến 55kg\r\n\r\n❤️ CAM KẾT CỦA SHOP ❤️ \r\n✽ Sản phẩm giống như hình và video 100%.\r\n✽ Hàng luôn có sẵn, thời gian xử lý đơn hàng nhanh, giảm thời gian chờ đợi của quý khách.\r\n✽ Giao hàng COD, nhận hàng rồi mới thanh toán.', 0, '30000', 2000, 0),
(48, 'áo gym yoga áo thể thao bra không gọng đệm chắc chắn thoải mái co dãn tốt', 65, 6, 'HƯỚNG DẪN B1 CHO MÀU 1 ( SẢN PHẨM 1 ) VÀO GIỎ HÀNG .B2 CHO MÀU 2 (SP 2 ) VÀO GIỎ HÀNG .... CHO ĐẾN KHI ĐẦY ĐỦ CÁC SẢN PHẨM CẦN MUA R ẤN MUA HÀNG KIỂM TRA LẠI 1 LƯỢT SỐ LƯỢNG CẦN MUA .LƯU Ý SHOP K LẤY HÀNG THEO GHI CHÚ HAY TIN NHẮN VÌ SHOP NHẶT HÀNG THEO PHIẾU IN\r\n\r\nHàng chuẩn chỉnh chất đẹp bao chất\r\nHàng quảng châu\r\nChất len mềm  mút mỏng  \r\nCo giãn tốt \r\nfree sz dưới 56kg ( các bạn 34 36 đều mặc vừa ạ )\r\nCác chi em mua hàng chọn màu trên sản phẩm giúp shop lấy hàng cho dễ và không bị nhầm lẫn nhé \r\n#bra\r\n#ao\r\n#bikini \r\n#teen\r\n❤️ CAM KẾT CỦA SHOP ❤️ \r\n✽ Sản phẩm giống như hình và video 100%.\r\n✽ Hàng luôn có sẵn, thời gian xử lý đơn hàng nhanh, giảm thời gian chờ đợi của quý khách.\r\n✽ Giao hàng COD, nhận hàng rồi mới thanh toán.', 0, '25000', 2300, 0),
(49, 'Quần Jogger Bò Sữa Unisex', 65, 4, 'N e w  I t e m ❣️\r\n• chất nỉ da cá dày dặn lên form cực xinh với đủ size M L XL \r\n•Form rộng Unisex nam nữ đều mặc được nè\r\nSize M eo 56 - 86 đùi 64 dài 93 mông 110\r\nSize L eo 60 - 90 đùi 66 dài 95 mông 112\r\nSize Xl eo 64 - 94 đùi 68 dài 97 mông 114\r\n———\r\nAB_HOUSE tự tin cam kết:\r\n •toàn bộ ảnh tự Ab_house chụp (cam đoan từ chất lượng đến màu sắc để khách yên tâm )\r\n •Giá phù hợp với túi tiền học sinh sinh viên đảm bảo chất lượng và luôn tư vấn tận tâm\r\n •Đổi trả miễn phí nếu sản phẩm lỗi\r\n •Luôn cập nhập các chương trình khuyến mãi+Freeship cho khách hàng thân thiết\r\n •Sỉ chat zalo 0937277458', 0, '15000', 318, 0),
(50, 'Quần Jogger Bo Ống Bò Sữa/Sắc Màu Loang Siêu Chất Dáng Rộng Q14', 65, 4, 'Chất liệu: thun\r\n Freesize < 60 kg\r\nHướng dẫn ĐẶT HÀNG được FREESHIP 😍😍😍\r\n✔ Nếu các bạn mua 1 sản phẩm, vui lòng ấn mua ngay \r\n✔ Nếu các bạn mua từ 2 sản phẩm trở lên, vui lòng ấn thêm vào giỏ hàng, và lần lượt thêm các sản phẩm bạn muốn mua vào giỏ trước khi đặt hàng và thanh toán. Các bạn nên tận dụng mã giảm giá vận chuyển của shopee bằng cách đặt đơn hàng trên 150k nếu bạn ở Hà Nội, trên 250k ở các tỉnh thành còn lại nhé, điều này sẽ giúp mình tiết kiệm được kha khá tiền đó ạ.\r\n😍😍😍 Shop CAM KẾT 😍😍😍\r\n✔Về sản phẩm: Shop cam kết cả về CHẤT LIỆU cũng như HÌNH DÁNG (đúng với những gì được nêu bật trong phần mô tả sản phẩm).\r\n✔Về giá cả : Shop nhập với số lượng nhiều và trực tiếp nên chi phí sẽ là RẺ NHẤT với chất lượng sản phẩm bạn nhận được.\r\n✔Về dịch vụ: Shop sẽ cố gắng trả lời hết những thắc mắc xoay quanh sản phẩm nhé.\r\n✔Thời gian chuẩn bị hàng: Hàng có sẵn, thời gian chuẩn bị tối ưu nhất.\r\n🍃🍃🍃Quyền Lợi của Khách Hàng 🍃🍃🍃\r\n✔ Nếu sản phẩm khách nhận được không đúng với sản phẩm khách đặt, hoặc khác với mô tả sản phẩm, khách hàng đừng vội đánh giá 1s mà hãy inb ngay cho shop để được shop hỗ trợ khách hàng đổi trả sản phẩm. Shop không hi vọng trường hợp này xảy ra, và sẽ cố gắng hết sức đê bạn không có một trải nghiệm mua hàng không tốt tại shop, nhưng nếu có, shop cũng sẽ giải quyết mọi chuyện sao cho thỏa đáng nhất.\r\n✔ 10 khách hàng đánh giá 5s kèm kình ảnh ấn tượng nhất tháng sẽ được gửi kèm QUÀ TẶNG TO TO và MÃ GIẢM GIÁ trong lần mua hàng ở tháng kế tiếp.\r\n➡ LƯU Ý KHI SỬ DỤNG CÁC SẢN PHẨM CỦA SHOP\r\n- Đối vơi sản phẩm đa dạng về chất liệu, kiểu dáng, màu sắc, cách bảo quản sản phẩm tốt nhất là phân loại và giặt các sản phẩm cùng màu để giữ được độ bền và màu sắc của vải, tránh bị phai màu từ các loại quần áo khác.\r\n- Đối với những sản phẩm có thể giặt máy, chỉ nên để ở chế độ giặt nhẹ, hoặc mức trung bình \r\n- Nên lộn áo sang mặt trái trước khi phơi sản phẩm ở nơi thoáng mát, tránh ánh nắng trực tiếp dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm đón gió sẽ giữ được màu vải tốt hơn.\r\n<3 Chúng tôi biết bạn có nhiều sự lựa chọn, cảm ơn vì đã lựa chọn chúng tôi <3', 0, '90000', 5400, 0),
(51, 'Váy ngủ 2 dây đầm ngủ thun mềm mịn, thoáng mát', 65, 7, 'Váy ngủ 2 dây mềm mát + tặng kèm miếng đệm ngực\r\nSản phẩm được sản xuất ĐỘC QUYỀN bởi Yuumi, chất vải dày dặn hơn, mềm mại, và độ co giãn tốt hơn, không bai nhão như sản phẩm cùng loại trên thị trường.\r\nChất liệu vải cao cấp mịn mát, thoải mới dễ chịu\r\n-------------------------------------------------\r\nThông số size\r\nM: 40-55kg\r\nL: 50-65kg\r\nXL: 60-75kg\r\nForm rộng thoải mai nhé, các mẹ sau sinh cũng có thể mặc rất ok ạ.\r\n\r\n#đồ_ngủ	#đồ_ngủ_nữ	#đồ_ngũ_nữ	#đầm_ngủ	#đồ_ngủ_đẹp	#đồ_pijama	#đồ_ngủ_nữ_quần_áo_ngắn	#đồ_ngủ_pijama	#bộ_đồ_ngủ	#quần_áo_ngủ	#quần_áo_ngủ_nữ	#pijama_nữ		#đầm_ngủ_đẹp	#đồ_ngủ_nữ_pijama	#vay_ngu	#đồ_bộ_pijama #váy_ngủ_nữ	#đồ_ngủ_2_dây_dễ_thương	#đầm_ngủ_nữ', 0, '66000', 1620, 0),
(52, 'Bộ đồ bầu và sau sinh Thu Đông chất đũi lụa cao cấp mặc nhà và cho con bú cực kỳ xinh BD905', 65, 9, 'Bộ đồ bầu và sau sinh Thu Đông chất đũi lụa cao cấp mặc nhà và cho con bú cực kỳ xinh BD905\r\nShop Lanovamom chuyên bộ đồ bầu cao cấp ngoài ra shop có đủ váy bầu, quần bầu, đồ lót bầu, phụ kiện bầu, đầm bầu, quần đùi mặc trong váy bầu … Mời các mom ghé shop chọn đồ\r\nBộ đồ bầu có 4 màu : Hồng, Xanh lá, Vàng,  Xanh ngọc\r\nBộ bầu thiết kế 2 in 1 chất Đũi mềm mại, thoáng mát, dễ chịu cho mẹ bầu\r\n :pushpin: Quần bầu có chun rút điều chỉnh , gấu có pha ren điệu đà , Áo bầu có khóa ngang ngực tiện lợi mặc bầu và cho con bú. Cổ pha ren cực kỳ xinh  xinh xắn, nhẹ nhàng\r\nBộ đồ bầu gồm có áo bầu dài và quần bầu dài freesize : 45-68kg . cao (1.53- 1.63m) cho form người chuẩn \r\n+ Áo bầu: Ngực <108 cm, bụng <128cm dài áo 62cm khóa ngực cho bé tu ti\r\n + Quần bầu có chun chỉnh : Mông <110cm  đùi <62cm, dài 90cm\r\n======\r\n :point_right: Ấn THÊM VÀO GIỎ HÀNG (cạnh nút MUA NGAY) để xem màu+size. Còn đặt mua được là còn hàng! \r\n:point_right: Cam kết giao hàng chuẩn ảnh (Ảnh và video được quay tại shop) \r\nTrang phục mặc khi bầu bí ảnh hưởng trực tiếp đến sức khỏe cả mẹ và bé. Vậy mẹ bầu nên chọn đồ bầu thế nào vừa an toàn lại tiết kiệm mà đẹp? \r\nNội y bầu :rất quan trọng với sức khỏe mẹ và bé \r\nTrong thời gian mang thai bà bầu tiết nhiều mồ hôi, và cảm thấy nóng hơn bình thường. Do đó, việc chọn đồ lót bầu rất quan trọng dể máu lưu thông tốt, tâm lý thoải mái, giữ dáng cho mẹ bầu, và thai nhi phát triển tốt\r\nÁo lót bầu – Áo ngực bầu \r\nTheo thống kê 2/3 mẹ bầu mặc áo ngực bầu ko phù hợp với cơ thể. Ngực bầu sẽ thay đổi liên tục, vì thế nếu không nâng đỡ ngực bầu đúng cách sẽ khiến ngực bạn bị chảy sệ vì các tế bào sợi của vú không bao giờ trở lại như bạn đầu khi bị căng kéo . Một chiếc áo ngực bầu vừa vặn có chất lượng tốt sẽ ngăn ngừa chống chảy sệ cho bầu ngực. . Vì thế bà bầu không nên tiết kiệm khi chọn mua áo lót bầu trong thai kỳ \r\nChất liệu áo ngực bầu, kiểu dáng áo lót bầu cũng là điều bà bầu lưu tâm. Tốt nhất nên chọn loại áo ngực có đệm mỏng, ko có gọng. chất liệu cotton là chất liệu tốt nhất cho áo ngực bầu vì thông thoáng, thấm hút mồ hôi \r\nQUẦN LÓT BẦU\r\ngay khi biết mình mang một sinh linh bé bỏng, các mẹ bầu nên cân nhắc mua quần lót bầu chất lượng, thoải mái nhất. Nên chọn mua quần lót bầu cotton sẽ ko gây kích ứng da, thấm hút mồ hôi, co giãn tốt, nên mua loại quần lót bầu có lót trắng phía dưới để kiểm tra dịch của mẹ bầu được. Bà bầu không nên mặc quần bầu chật, tốt nhất nên mặc quần lót bầu phù hợp thời điểm mang thai, kiểu dáng đơn giản, rộng rãi, dễ chịu \r\nMọi thắc mắc, tư vấn,inbox cho shop để được hỗ trợ tốt nhất! RẤT HÂN HẠNH ĐƯỢC PHỤC VỤ CÁC MOM @@\r\n#dobobaudep #dobobauchatthun  #dobau #bau #bobaudaitay #bobausausinh #bodobau #bochoconbu #quanaobau #dobobau #dobau #dobobaumacnhavasausinh  #dobochobabau #dobobaucaocap #dobobaucoton #bodobauthudong', 0, '107000', 1800, 0),
(53, 'Bộ bầu và sau sinh LỬNG Xuân Hè cho con bú chất kate thái cho mẹ bầu mặc nhà, có size từ 48 - 85kg', 65, 4, 'Bộ bầu và sau sinh cho con bú LỬNG chất kate thái cho mẹ bầu mặc nhà, freesize 48 - 85kg\r\n===\r\n- Chất kate thái Mềm Mịn\r\n- Áo có khóa kéo mở ngực cho con ti sau sinh\r\n- Quần có chun rút điều chỉnh vòng bụng thoải mái tăng cân trong quá trình mang thai.\r\n- Có size từ 45->85kg, cao từ 1m5->1m64 Hoặc theo thông tin sau của sản phẩm:\r\n+ Size L (45->60kg)\r\n\r\nÁo dài 62cm: ngực <95cm, bụng <100 cm\r\nQuần dài 58cm: Mông <100cm, đùi <55 cm\r\n\r\n+ Size XL (60-70kg)\r\nÁo dài 65cm: ngực <103cm, bụng <110 cm\r\nQuần dài 58cm: Mông <110cm, đùi <64cm\r\n\r\n+ Size 2XL (70-85kg)\r\nÁo dài 65cm: ngực <110cm, bụng <120 cm\r\nQuần dài 58cm: Mông <120cm, đùi <68cm\r\n\r\n- Họa tiết đẹp cho các nàng diện cực dễ thương và kute:\r\n1- Dâu than \r\n2- Gấu be\r\n3- Tộc vàng\r\n4- Ngựa hồng\r\n5- Mèo hồng nhạt\r\n6-Thỏ ngọc\r\n7- Dâu hồng\r\n8- Lvv đỏ dô\r\n9- Thỏ xám\r\n10- Thỏ đỏ\r\n11- Thỏ than\r\n12- Mèo hồng\r\n======\r\n👉 Ấn THÊM VÀO GIỎ HÀNG (cạnh nút MUA NGAY) để xem màu+size. Còn đặt mua được là còn hàng!\r\n👉 Cam kết giao hàng chuẩn ảnh (Ảnh và video được quay tại shop)\r\n➡️ Áp Mã Miễn Ship để Giảm 20k tiền SHIP đơn hàng từ 50k, Giảm 70k tiền Ship đơn hàng từ 300k\r\n(Nếu nhận hàng thanh toán (COD) mẹ dùng mã miễn ship KHÔNG có chữ AirPay nhé!)\r\n➡️ Shopee không hỗ trợ đồng kiểm, nên sau khi nhận hàng, vui lòng quay clip mở hàng và kiểm tra kỹ sản phẩm. \r\n➡️ Đánh giá 5* kèm hình ảnh để shop có động lực phục vụ ngày càng tốt hơn ạ!\r\n======\r\n💌 Cần tư vấn thêm, hỗ trợ sau bán hàng, vui lòng inbox cho shop nhé!\r\nSHOP CẢM ƠN! \r\n#bobaulung #bobaumuahe #dobau #bobau #katebau #dobau #bau #mangthai #chunchinh #sausinh #quanaobaumuahe #bosausinh #bosausinhchome #bosausinhchoconbu #bigsize', 0, '98000', 330, 0),
(54, 'Quần jogger viền (kèm video hình thật)', 65, 6, '🎀🎀🎀 Quần jogger mẫu mới về\r\nChất liệu thể thao mềm mịn\r\n✓ Size: M (40-50ky). Cao dưới 1m60\r\n✓ Size: L (50-60ky). Cao 1m60 -1m70\r\n👉Sỉ: 47k\r\n🏭Zalo /Facebook sỉ online: 0708 749 176', 0, '69000', 438, 0),
(55, 'Áo bra nữ hở lưng chữ U hai dây freesize 37-60kg AL14', 65, 8, 'Áo bra nữ  không ngọng cao cấp co dãn thoáng khi không ngọng sexy nâng ngực\r\n\r\nÁo bra nữ có nhiều màu\r\n\r\nÁo bra nữ 2 dây với FREESIZE dưới 60kg\r\n\r\nÁo bra nữ Ren cao cấp không ngọng phong cách nữ tính, trẻ trung.\r\n\r\nÁo bra nữ nâng ngực không những là món phụ kiện thời trang mà còn là vũ khí thể hiện sự sexxy của bạn\r\n\r\nHãy chọn cho mình 1 áo bra 2 dây phù hợp nhé.\r\n\r\nTrong thế giới thời trang của phái đẹp áo Áo bra luôn chiếm một vị trí quan trọng.\r\n\r\nTuy nhiên, không phải ai cũng biết chọn một chiếc áo Áo bra 2 dây thực sự phù hợp với phom cơ thể của mình\r\n\r\nÁo bra ren cao cấp 2 dây mang tới cho các cô nàng sự thoải mái khi đi dạo phố hoặc hẹn hò bè bạn ,\r\n\r\nÁo bra nữ không gọng cotton đã trở thành người bạn không thể thiếu các nàng\r\n\r\nÁo bra nữ dễ thương đa dạng từ kiểu cách tới màu sắc, size…tùy theo nhu cầu của mình mà các nàng lựa chọn một\r\n\r\nLuôn là nơi cập nhật những xu hướng áo lót nữ thời trang\r\n\r\nLAVENUSA đã khẳng định vị trí của mình với nhiều bạn trẻ bởi phong cách Áo bra nữ ren cao cấp hai dây sang trọng\r\n\r\nthanh lịch nhưng không thiếu sự năng động và cá tính\r\n\r\n#bra #aobranu #aobrahaiday #aobra #aolotday\r\n\r\n#aolot #aolotnangnguc #aolotkhonggong #aolotnu\r\n\r\n#aolotnu #aolot2day #aolotdethuong #aolotnangngucsexy #aolotnucottonkhongngong #alotnugiaredep\r\n\r\n#aolotnucaocap #aolotnunhapkhau #boaolot', 0, '19000', 400, 0),
(56, 'QUẦN JOGGER BO GÂN UNISEX #AGE2X', 65, 7, '⚡ QUẦN JOGGER BO GÂN #AGE2X\r\n\r\n🍍  3 gam màu: Xanh lính, Xám, Đen\r\n🍍 3 size thông dụng phù hợp với mọi tạng người: M, L, XL\r\n🍍 Kích thước size : Eo(cm) - Dài (cm) - Cao (cm) - Nặng (kg)\r\n      Size M : 32 ;  90 ; <160 ; <55\r\n      Size L : 34 ; 92 ; 160 - 170 ; 55 -62\r\n      Size XL : 36 ; 96; <180 ; <72\r\n🍍 Chất liệu: thun bo gân V2 83% cotton thiên nhiên, 7% polyeste (tăng bền vật lý) 10% spandex tạo co giãn 4 chiều ,không gây bí hay kích ứng da khi mặc.\r\n🍍 Sản phẩm được dệt và nhuộm theo quy trình khép kín hiện đại, được chứng nhận đảm bảo an toàn không độc hại với da.\r\n🍍 Phom unisex rộng rãi thoải mái, không kén chọn nam nữ.\r\n#joggernu #joggernam #joggerthun #joggernamnu', 0, '123000', 344, 0),
(57, 'Chân váy xoè xếp ly tennis skirt - chân váy xếp ly ngắn -Chân váy xếp li ngắn lưng cao , váy xếp ly đẹp 2021', 65, 8, 'Chân váy xoè xếp ly tennis skirt - chân váy xếp ly ngắn -Chân váy xếp li ngắn lưng cao , váy xếp ly đẹp 2021\r\n\r\nSản phẩm chụp bằng cam thường điện thoại, màu sắc có thể chênh lệch đậm nhạt không đáng kể. Toàn bộ sản phẩm là hàng chụp thật 100% và có logo shop trên ảnh. Rất nhiều nơi lấy ảnh của shop nên mọi người hãy là người mua hàng thông thái nha ❤️ \r\n————\r\n  Xu Hướng: 2021\r\n  Đặc điểm / tay nghề thủ công: xếp ly\r\n  Khách hàng lựa chọn chân váy theo cân nặng\r\n\r\n- S (Dưới 48kg)\r\n- M(49-52kg)\r\n- L(53-60kg)\r\n\r\n  Bảng kích thước / đơn vị cm:\r\n  S Chiều dài chân váy 40cm/14.56\" Vòng eo 64cm/25.19\"\r\n  M Chiều dài chân váy 41cm/14.96\" Vòng eo 68cm/26.77\"\r\n  L Chiều dài chân váy 42cm/15.35\" Vòng eo 72cm/28.34\"', 0, '89999', 427, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `imageID` int NOT NULL,
  `productID` int UNSIGNED NOT NULL,
  `productImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`imageID`, `productID`, `productImage`) VALUES
(41, 12, '9d8078d4dc275d3fde221a603248609c.jpeg'),
(43, 12, '27eb833f9fd02ac8c625e5c23b8fcbf0.jpeg'),
(44, 12, '58a6138ff11ccb3da512608dd0024f77.jpeg'),
(45, 12, '9084315caa291e05c0858c54f1c3c5eb.jpeg'),
(46, 12, 'f5b496c8a03bf929656618a32dec0164.jpeg'),
(49, 17, '24a3a9d21c0926c97ab753fec1f65741.jpeg'),
(50, 17, 'f964dec03c9f6a8751aff5f2902da3e5.jpeg'),
(51, 17, '0aec7df1f8ab46845bad182b904610f7.jpeg'),
(80, 16, 'a10a3321c547858588d5830743d0a745.jpeg'),
(81, 16, '6fc6988f6dabca4311b623e51094d1db.jpeg'),
(82, 16, '833e5dcf6b41aed389c9adb626cb787b.jpeg'),
(83, 16, '0ab68db1260239caaad20f8aa10ad03c.jpeg'),
(88, 16, 'e42d0146f1e3bf9ade67c4bde9273e35.jpeg'),
(89, 17, '758e3256f4a8d3330d994a91c05082d1.jpeg'),
(90, 18, '0d19a5f5a1755f541b1e46faca9dd8f0.jpeg'),
(91, 18, '00a5dd04a0923602b25f757c15782ceb.jpeg'),
(92, 18, 'a139760bed21236e4a68eaa0f2f15b2c.jpeg'),
(93, 18, '70c3f36b22f677a001b2f24a3bda1898.jpeg'),
(94, 24, '8daf6696dc67d8a7cf0a505ff6b60d72.jpeg'),
(95, 24, 'b2d78de5f9e788270c4e9ea6634dab21.jpeg'),
(96, 24, '33ba55ed54060320b1aa901057ea1de3.jpeg'),
(97, 24, 'c1bf5864af4ddde4d314eb7fb6f26174.jpeg'),
(98, 24, '9aa25b0f76de6cfae0e1631f5dcd3c0c.jpeg'),
(99, 25, '36aef19b28e682d4133adfa76bf0aa11.jpeg'),
(100, 25, 'e635b31d80e44bf31d21fa4c6a9a472d.jpeg'),
(101, 25, '108be890029a5970ea89797944fd0912.jpeg'),
(102, 25, '8310ed4391012253dc6c87c62274c9ab.jpeg'),
(103, 26, '0f9b3e14110212cb01a13d34f79b9bbd.jpeg'),
(104, 26, '0c4f01c787ede24e1fe20a630248c60e.jpeg'),
(105, 26, '03010546013a4de0aa80057588908b73.jpeg'),
(106, 26, '53c651e0d36be783367e3c7e70b6af6f.jpeg'),
(107, 27, 'fed504ecc6d8eed72187ad39c6e5da14.jpeg'),
(108, 27, '5b51f3b557c36659b02befc150826642.jpeg'),
(109, 27, '24c4b78e88c2bc3fa5cf7536230d1f37.jpeg'),
(110, 27, 'a835b63d65395c600237ab3bb542a951.jpeg'),
(111, 30, '61c983c484f5bc39c29dd6574af5cd2e.jpeg'),
(112, 30, '0609d367108fd4f370339146b2ef8210.jpeg'),
(113, 30, '3388bb2039b011f70a35eeba3dd8e9f8.jpeg'),
(114, 30, '03099c4d1210681889609716d62660fc.jpeg'),
(115, 30, 'ab661678523a3cff1df403f75d2b31b1.jpeg'),
(116, 29, '91b47d2bd9da4c93d3644b381960e7a9.jpeg'),
(117, 29, '31d57c47831b63311d526ae69cd2194b.jpeg'),
(118, 29, '4dfcd6b7e0313d1b708679de8ed5d879.jpeg'),
(119, 29, '98e29368aa8efc9cd364a4b24a8034ad.jpeg'),
(120, 28, '2ce034a7e6c8c7bc7db03f1b82e397c0.jpeg'),
(121, 28, '83ee64d456506fef68712437daf448b7.jpeg'),
(122, 28, '580cd3c03a6cc6f411abfd8c2b2a80c7.jpeg'),
(141, 33, 'dd4db437d7743ef8ff5d1a7f100405e5.jpeg'),
(142, 33, 'e9cb6ef57d42587e93d693bf572dd4b1.jpeg'),
(143, 33, '61a541b59158acc3b6db3496ed9b4d20.jpeg'),
(144, 33, 'fd0fbdbedc120d9171bea50e1bf211c5.jpeg'),
(146, 32, 'b549b93c6f935cd8658fdfe9773c01c6.jpeg'),
(147, 32, 'fe1a0371150ac6fe2da56479534b8c66.jpeg'),
(148, 32, '8d512549e70742806af947829a06e82a.jpeg'),
(149, 32, '9a2faee34b9f60733efc02f300bcaf1e.jpeg'),
(150, 32, '22b2c19d967cf5d66d617fcc4d0f25dc.jpeg'),
(156, 31, '426caf63cf2efc635aa552ef4bf23a6a.jpeg'),
(157, 31, '806df9951d2891ffd838f70961d080f8.jpeg'),
(158, 31, 'a27e3b04533704c3954bdb874e38bb12.jpeg'),
(160, 31, '3946c3f9f8148664bab09dcad493f9b6.jpeg'),
(162, 35, '8bd11bc7b105e625de520bce171ea41d.jpeg'),
(163, 35, '83830a135b515972c55255639ab5bcbf.jpeg'),
(164, 34, '8aad550ee44fe23cc10b79d20743e988.jpeg'),
(165, 34, 'f68ab035573ea42aeaeb734c2e4884dc.jpeg'),
(166, 34, 'f860b54af6d689821fa0c638c45c3078.jpeg'),
(167, 34, 'c62446ea20c4cb0264b5f0b462ff6663.jpeg'),
(168, 34, '833828214ad958857a72b19b747319bd.jpeg'),
(169, 39, '3c4d98d4412edef18b2f7df12ed2a298.jpeg'),
(170, 39, '05ac30b809d99e91e854c002a7935e66.jpeg'),
(171, 39, '0d169911c245f313c76101ee779636ef.jpeg'),
(172, 38, 'dd8c7d3ad9afafe25ac91cccb86e5bf1.jpeg'),
(173, 38, '682559d8a46f425158b89d8e96680a4d.jpeg'),
(174, 38, '5ee5043be238eb0547ff0b0545bc6d26.jpeg'),
(175, 38, 'dc2758d6bcc8358e12ab958adbe56fdd.jpeg'),
(176, 37, 'b2f6c02942e2f0875fc1def9c1bbe62b.jpeg'),
(177, 37, '5c5d8cad43d1db785d87fcf0cef36b68.jpeg'),
(178, 37, 'f0434023d4e4c91f590deacca24db2c3.jpeg'),
(179, 37, '1dfcf1b8ba734ffde4fb5571fad90bae.jpeg'),
(180, 37, '02e15573d025bdd199e728571e33edeb.jpeg'),
(183, 36, 'c93267247e7c6b6dcff1f296fe250602.jpeg'),
(184, 36, '2226fe57060cbff2048e5a613846d89d.jpeg'),
(185, 36, 'b4a770ffe36e90173f519aa4caf0dc4d.jpeg'),
(186, 36, '999104ca29b028c2fabe6661f4d9b3d8.jpeg'),
(187, 36, '53a0426cfd327d00107f88f6d2c0dac9.jpeg'),
(188, 57, '2d6fd92c6e90529e50c5107b4cd17a39.jpeg'),
(189, 57, '278f865aaf1d1dcf1adb5590924c2062.jpeg'),
(190, 57, '29e20fadd15a83c9d161382f4037af88.jpeg'),
(191, 57, '85db450df34dcf02fd7411274109a41f.jpeg'),
(192, 57, '0cc8889e53c90b7727c4cffdf58143f3.jpeg'),
(193, 56, 'b81a309328cba271872eea64cd08ac93.jpeg'),
(194, 56, '51b13a4f93c40e4072d643b131dae341.jpeg'),
(195, 56, '6ca3c128f8c2b9d37658de1c671b1b5d.jpeg'),
(196, 56, '16d49824e869a799c124ee9d12e08d91.jpeg'),
(197, 56, 'b9d603de61f7b80add77d15a5ed76b0a.jpeg'),
(202, 55, '05aa78313bd7aeee87a45c35a1d092bf.jpeg'),
(203, 55, '27677c3529f24326054c084635806c08.jpeg'),
(204, 55, 'ff92b346d1e76dfc75a0c4ed97c1da8d.jpeg'),
(205, 55, 'b225ac17ad27976d16e655b3ebf484cc.jpeg'),
(206, 55, 'd4b7d530b2f219a483021a8df65d6517.jpeg'),
(207, 54, 'c90771571eae627b363ae8cd6ce7e74a.jpeg'),
(208, 54, 'e06bf21766365b870a03c51bbd441f02.jpeg'),
(209, 54, '5de8a75e1b6e3a1a0b6ab0597d8c79a0.jpeg'),
(210, 54, 'd094f54a75dd8a7bec38dcb3aa50579c.jpeg'),
(211, 54, 'ba1d52e00f36e8fa83f3eb08d28da640.jpeg'),
(212, 53, '89ae6f95581c6d89afb44ff24db1ad3b.jpeg'),
(213, 53, '99d1a39315c8c71c6342f2725c17b949.jpeg'),
(214, 53, '42153ed188b2142cbb7ec8c1a4d40d3d.jpeg'),
(215, 53, '520d745a2c0f9feeae5e1edef5b9a0c0.jpeg'),
(216, 52, 'bdad3cafd0d3c69ffa28d64a005ac1f0.jpeg'),
(217, 52, 'eececec1d925abba28f245beb6662069.jpeg'),
(218, 52, '0266770201879c309cfb73cb624ba8ac.jpeg'),
(219, 52, '768f6ce8006f1a611dd54ab571f301b1.jpeg'),
(220, 52, '066ccca622016070a76d18be99b68539.jpeg'),
(221, 51, 'a9f68cdb9ed831bba6ef5c57e1d9e2cd.jpeg'),
(222, 51, '72f3dfc147e42f9a49847c87f57ad013.jpeg'),
(223, 51, '3c4b9912d0612e6702afbdba6ce38df8.jpeg'),
(224, 51, '07bbbcc36f4634da455c9f3c09389961.jpeg'),
(225, 51, 'b23bdf8a2b202f4abc77df13d04a12d8.jpeg'),
(226, 50, 'f5e9ede2caf8e9b3e8ec3ddf127fbdb7.jpeg'),
(227, 50, 'ab8f91905e4abbcfdcdfa4efe36f2dee.jpeg'),
(228, 50, '39be1c0d879e29f5c370891c673ce60e.jpeg'),
(229, 50, '6fb7dd7e5a0439013b2bc3dc4b3dca8c.jpeg'),
(230, 50, 'a8ceb8b88cc0de9ce2fad17df2ba6840.jpeg'),
(231, 49, 'acc7524794412dc1806109d244b53e8f.jpeg'),
(232, 49, '7f07500d3fd9540f6697bf642d6fd9fe.jpeg'),
(233, 49, '3b22d1ab180a7cd0338e00afc6f9864d.jpeg'),
(234, 49, '58ca469d892e6ddd9d1b34b1ed0ef732.jpeg'),
(235, 48, 'a9b804886d6220c404f9cc4e29b29f11.jpeg'),
(236, 48, '79cd23c6f2b80bf60f6928588451dc23.jpeg'),
(237, 48, '7a9896f14e0ca70c68e92a372fed5b76.jpeg'),
(238, 48, '3d71f28caeff3e78e4f63ab41bd3d985.jpeg'),
(239, 48, '07757dbc6bf1a00c4d4a51d604c322e7.jpeg'),
(240, 47, 'd0bef0c642913876491d1f166a290057.jpeg'),
(241, 47, 'b2d6376156d3cd4f8668a95f3681817c.jpeg'),
(242, 47, '473a130e8293b860db812f26d6fff4ae.jpeg'),
(243, 47, '717f2a179a12b92251dfa0b7b5941827.jpeg'),
(244, 46, '66cbf5c4c886cf8d868c24da9532141b.jpeg'),
(245, 46, 'e378747ee5a6a13fc2985101152e0b9c.jpeg'),
(246, 46, 'a8ad1ae543fd530b84c3c07e50a85046.jpeg'),
(247, 46, 'e813e7bf8f9945c4a067ce3b788e1db7.jpeg'),
(248, 46, '96a223a43599086060ef77e4540ed6b3.jpeg'),
(249, 45, 'e1d587e3bad73d817bc8297d789fe066.jpeg'),
(250, 45, 'd90bd6592b3a0224473f96d515aa0cb6.jpeg'),
(251, 45, '7cd18cb224d9e8939e7310f3cb91f013.jpeg'),
(252, 45, '4764eda2cf91951281ba0d32dfec450d.jpeg'),
(253, 45, '96d05cb383c5023b4cae1e3b0f5f1ca2.jpeg'),
(254, 44, 'c4e1ba36764a8683ae69602d645d72b7.jpeg'),
(255, 44, '013c96a6635de5fd659624dfea8a0ddd.jpeg'),
(256, 44, '750127f59f866ace69a9bd76fc0354b9.jpeg'),
(257, 44, '9b0357b429000f1a2ce3492587789d31.jpeg'),
(258, 43, '44214244c073447141dcb498b660d112.jpeg'),
(259, 43, '7d5a6e4a441b877d64b74ce00a675493.jpeg'),
(260, 43, 'd1909c65e24dc9fb9f2fbba403fba477.jpeg'),
(261, 43, '341db802e0ebe27a159091336604c9ad.jpeg'),
(262, 43, 'ce01936dda7d311bbb15b5a7098fce86.jpeg'),
(263, 42, 'fca12581fbfd4932ca13a6991337f2d3.jpeg'),
(264, 42, 'b05ec2ccf6f082697572d2e08775ec75.jpeg'),
(265, 42, '38951edbe5a5fda6e03afdd5c7699b39.jpeg'),
(266, 42, 'af0ff0b78720348caac6871491671064.jpeg'),
(267, 42, '19660c534df4eb2892d191c9275cd498.jpeg'),
(268, 41, '2023d36520663eedfd7e97dbd608d8ee.jpeg'),
(269, 41, '067e53de59ca4933f845fcffd8e83ad4.jpeg'),
(270, 41, '2830ff85a3a56c16ab49d09bd2f86990.jpeg'),
(271, 41, '566311b1a5fba4a50300747923d65026.jpeg'),
(272, 41, '8e159d007de60716fa9c865a4e8c20ec.jpeg'),
(273, 40, '9db31fca1b0d9e108d1fa132bb5b6c02.jpeg'),
(274, 40, '7fbfe9a9a276d9f5d045d6c20f5a4884.jpeg'),
(275, 40, '4778d781ffeeebaed2df2eb66eb4efae.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderID` int NOT NULL,
  `sliderTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sliderImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sliderType` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderID`, `sliderTitle`, `sliderImage`, `sliderType`) VALUES
(8, 'Slider 1', '1.jfif', 'on'),
(9, 'Slider 2', '2.jfif', 'on'),
(10, 'Slider 3', '3.jfif', 'on'),
(11, 'Slider 4', '4.jfif', 'on'),
(12, 'Slider 5', '5.png', 'on'),
(13, 'Slider 6', '6.png', 'on'),
(14, 'Slider 7', '7.jfif', 'on'),
(15, 'Slider 8', '8.png', 'on'),
(16, 'Slider 9', '9.jfif', 'on'),
(17, 'Slider 10', '10.jfif', 'on'),
(18, 'Slider 11', '11.jfif', 'on'),
(19, 'Slider 12', '12.jfif', 'on'),
(20, 'Slider 13', '13.png', 'on'),
(21, 'Slider 14', '14.png', 'on'),
(22, 'Slider 15', '15.jfif', 'on'),
(23, 'Slider 16', '16.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlistID` int NOT NULL,
  `customerID` int UNSIGNED NOT NULL,
  `productID` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`,`customerID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  ADD PRIMARY KEY (`originID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`,`originID`),
  ADD KEY `originID` (`originID`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `customerID` (`customerID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  MODIFY `originID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `imageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlistID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `tbl_category` (`categoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`originID`) REFERENCES `tbl_origin` (`originID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD CONSTRAINT `tbl_product_image_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
