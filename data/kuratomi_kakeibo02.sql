-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-12 03:00:41
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kuratomi_kakeibo02`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `expenses_2022`
--

CREATE TABLE `expenses_2022` (
  `id` int(3) NOT NULL,
  `month` int(2) DEFAULT NULL,
  `item` varchar(32) DEFAULT NULL,
  `amount` int(7) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `beneficiary` varchar(16) NOT NULL DEFAULT 'みんな',
  `paid_on` date DEFAULT NULL,
  `paid_by` varchar(16) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `last_updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `expenses_2023`
--

CREATE TABLE `expenses_2023` (
  `id` int(3) NOT NULL,
  `month` int(2) DEFAULT NULL,
  `item` varchar(32) DEFAULT NULL,
  `amount` int(7) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `beneficiary` varchar(16) NOT NULL DEFAULT 'みんな',
  `paid_on` date DEFAULT NULL,
  `paid_by` varchar(16) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `last_updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `expenses_2023`
--

INSERT INTO `expenses_2023` (`id`, `month`, `item`, `amount`, `category`, `beneficiary`, `paid_on`, `paid_by`, `note`, `last_updated_on`) VALUES
(1, 1, 'スーパーサニー', 4560, '食料費', 'みんな', '2023-01-12', 'オリガ', 'パンツ', '2024-07-12 00:15:44'),
(3, 1, 'スーパー丸共', 7352, '食料費', 'たみお', '2023-01-21', 'たみお', '食品その他', '2024-07-12 00:16:02'),
(4, 1, 'GU', 8230, '衣料費', 'たみお', '2023-01-26', 'たみお', 'パンツ', '2024-07-12 00:15:21'),
(5, 1, 'サイゼリア', 3820, '食料費', 'たみお', '2023-01-18', 'たみお', 'プチフォッカ、エスカルゴ、その他', '2024-07-12 01:06:06'),
(7, 2, '亜橋カレー', 3360, '食費', 'みんな', '2023-02-08', 'たみお', '家族４人で食事', '2024-07-12 08:47:12'),
(9, 2, 'ボンラパス', 1480, '食費', 'たみお', '2023-02-21', 'たみお', 'ワインとつまみ', '2024-07-12 08:59:02'),
(10, 2, 'スーパーサニー', 7980, '食費', 'みんな', '2023-02-23', 'オリガ', '食材', '2024-07-12 08:58:48');

-- --------------------------------------------------------

--
-- テーブルの構造 `expenses_tmpl`
--

CREATE TABLE `expenses_tmpl` (
  `id` int(3) NOT NULL,
  `month` int(2) DEFAULT NULL,
  `item` varchar(32) DEFAULT NULL,
  `amount` int(7) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `beneficiary` varchar(16) NOT NULL DEFAULT 'みんな',
  `paid_on` date DEFAULT NULL,
  `paid_by` varchar(16) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `last_updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `family`
--

CREATE TABLE `family` (
  `id` int(3) NOT NULL,
  `login_name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `real_name` varchar(128) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `suspended_until` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `family`
--

INSERT INTO `family` (`id`, `login_name`, `password`, `real_name`, `is_admin`, `created_at`, `updated_at`, `suspended_until`) VALUES
(13, 'Papa', '$2y$10$o0dxvssAu8Se8MZNsjcCTONWrDhbyCaTiUZyN6KIvefYw8dj9rpLS', '倉冨民夫', 0, '2024-07-12 02:47:40', '2024-07-12 02:47:40', '0000-00-00'),
(14, 'Mama', '$2y$10$C2PZ9gmgg64IOFOAy0AiQesYd5HyhXthQrpTXrp2UDsebwcUyO60e', 'Olha Kuratomi', 0, '2024-07-12 03:22:58', '2024-07-12 03:22:58', '0000-00-00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `expenses_2022`
--
ALTER TABLE `expenses_2022`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `expenses_2023`
--
ALTER TABLE `expenses_2023`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `expenses_tmpl`
--
ALTER TABLE `expenses_tmpl`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `expenses_2022`
--
ALTER TABLE `expenses_2022`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `expenses_2023`
--
ALTER TABLE `expenses_2023`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `expenses_tmpl`
--
ALTER TABLE `expenses_tmpl`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `family`
--
ALTER TABLE `family`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
