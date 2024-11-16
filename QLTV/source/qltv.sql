-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2023 lúc 09:08 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `ma_loaisp` varchar(50) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mota_sp` varchar(400) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproduct`
--

INSERT INTO `adproduct` (`ma_loaisp`, `ma_sp`, `tensp`, `hinhanh`, `soluong`, `mota_sp`, `create_date`) VALUES
('KĐ', ' CTNCN', 'CHÚA TỂ NHỮNG CHIẾC NHẪN (QUYỂN 1)', '9451-doan-ho-nhan-1.jpg', 100, '\"Đoàn hộ nhẫn\" kể về cuộc hành trình gian lao của anh chàng Hobbit Frodo Bao Gai và những người bạn từ mọi chủng tộc của mình, nhằm giải cứu Trung Địa khỏi rơi vào tay Chúa tể Sauron và chiếc Nhẫn Chúa.', '2023-12-21'),
('KĐ', ' CTNCN2', 'CHÚA TỂ NHỮNG CHIẾC NHẪN (QUYỂN 2)', '9853-chua-te-nhung-chiec-nhan-hai-toa-thap-quyen-2-1.jpg', 100, 'Chín Bộ Hành còn Bảy. Một con đường chia hai. Người Mang Nhẫn dấn thân vào Vùng Đất Đen cùng bạn đường trung nghĩa và kẻ dẫn đường bất trắc. Hai Hobbit bị cướp đi giữa ba phe Orc, để Ba Thợ Săn làm nên kỳ tích đuổi theo.', '2023-12-21'),
('KĐ', ' CTNCN3', ' CHÚA TỂ NHỮNG CHIẾC NHẪN (QUYỂN 3)', '11342-nha-vua-tro-ve-1.jpg', 100, 'Tiếp nối câu chuyện trong “The Hobbit - Anh chàng Hobbit” - tải eBook, các tập sách này được trình bày bằng một văn phong dứt khoát, chặt chẽ, được chính tác giả Tolkien thiết kế phần trang bìa và kèm theo ba bản đồ, trong đó có bản đồ chi tiết của vùng Middle-earth. Sauron, Chúa tể Bóng Tối, hiện đã nắm giữ trong tay các Chiếc nhẫn giúp hắn cai trị vùng đất Middle-earth nhưng vẫn còn thiếu One Ri', '2023-12-21'),
('TN', ' DTNM', 'ĐI TÌM NEMO', '9368-di-tim-nemo-1.jpg', 100, 'Chuyến phiêu lưu của Marlin là cô cá Dory trên đường đi tìm Nemo', '2023-12-21'),
('VN', ' NBHCS', 'NHỮNG BÀI HỌC CUỘC SỐNG TỪ ALBERT EINSTEIN', '13937-nhung-bai-hoc-cuoc-song-tu-albert-einstein-1.jpg', 100, 'Albert Einstein (1879 - 1955) là một nhà khoa học lỗi lạc, người đã phát triển thuyết tương đối tổng quát, một trong hai trụ cột của vật lý hiện đại. Ngoài những đóng góp vĩ đại cho nền khoa học của nhân loại, ông còn để lại những triết lý sống sâu sắc mà chúng ta có thể học hỏi theo.', '2023-12-21'),
('KD', ' OHTL', 'OAN HỒN TRỞ LẠI', '14682-oan-hon-tro-lai-1.jpg', 100, 'Chuyện ma kể về một câu chuyện về sự trả thù của một linh hồn, nó xảy ra với một dòng tộc vào những năm 90 của thế kỉ trước. Dù đã qua hai mươi năm nhưng mỗi khi nhắc lại, con cháu vẫn còn rùng mình ớn lạnh.', '2023-12-21'),
('TN', ' RHVNDDB', 'HAI VẠN DẶM DƯỚI ĐÁY BIỂN', '14075-hai-van-dam-duoi-bien-1.jpg', 100, 'Câu chuyện về cuộc hành trình bất đắc dĩ của nhà nghiên cứu biển Aronnax, giáo sư Viện bảo tàng Paris cùng người cộng sự Conseil và người thợ săn cá voi Ned Land sau khi đột nhiên bị rơi vào con tàu Nautilus kỳ lạ.', '2023-12-21'),
('TC', ' TCVN', 'TUYỆT PHẨM THƠ CA VIỆT NAM', '14218-tuyet-pham-tho-ca-viet-nam-1.jpg', 100, 'Những tuyệt phẩm thơ ca của Việt Nam', '2023-12-21'),
('Thiếu nhi', ' TN', 'GULLIVER DU KÍ', '14074-gulliver-du-ki-1.jpg', 100, 'Câu chuyện phiêu lưu đến những xứ sở kỳ lạ của anh chàng Gulliver dễ thương và nhân hậu', '2023-12-21'),
('KD', ' TT', 'THẾ THÂN', '14689-the-than-1.jpg', 100, 'là chuyện ma kể về một cô gái sinh ra đã bị bỏ rơi, tự mình sống cuộc sống nghèo khổ. Đến ngày nọ cô được cha nhặt về, nhưng không phải để chăm nuôi mà dùng cô để Thế Mạng cho người chị cùng cha khác mẹ của mình. Liệu rằng cuộc đời của cô sẽ đi về đâu', '2023-12-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `ma_loaisp` varchar(50) NOT NULL,
  `ten_loaisp` varchar(50) NOT NULL,
  `mota_loaisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('KD', 'Kinh dị', 'Những câu truyện ám ảnh '),
('KĐ', 'Kinh điển', 'Những tác phẩm kinh điển'),
('TC', 'Thơ ca', 'Những tác phẩm văn học'),
('TN', 'Thiếu nhi', 'Sách cho thiếu nhi'),
('VN', 'Văn học', 'Những tác phẩm văn học nổi tiếng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `makh` varchar(50) NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi_lienhe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkythanhvien`
--

CREATE TABLE `dangkythanhvien` (
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkythanhvien`
--

INSERT INTO `dangkythanhvien` (`fullname`, `email`, `password`, `level`) VALUES
('Nguyễn Bảo Khánh', 'khanh@gmail.com', '123', 'nguoidung'),
('Nguyễn Bảo Khánh', 'khanh1@gmail.com', '123', 'quantri'),
('Lê Thị Lan Phương', 'phuong@gmail.com', '2710', 'quantri'),
('Lê Thị Lan Phương', 'phuong1@gmail.com', '147', 'nguoidung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `mahd` varchar(10) NOT NULL,
  `makh` varchar(20) NOT NULL,
  `tenkh` varchar(60) NOT NULL,
  `create_date` datetime NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `mahd` varchar(50) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `dangkythanhvien`
--
ALTER TABLE `dangkythanhvien`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`mahd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
