-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for quanly
CREATE DATABASE IF NOT EXISTS `quanly` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `quanly`;

-- Dumping structure for table quanly.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.departments: ~7 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `manager`, `created_at`, `updated_at`) VALUES
	(1, 'Nhân sự', 8, '2023-03-03 10:23:40', '2023-03-04 07:55:32'),
	(2, 'Marketing', 12, '2023-03-03 10:23:41', '2023-03-04 07:34:05'),
	(3, 'Kế toán', 1, '2023-03-03 10:23:41', '2023-03-05 08:22:34'),
	(4, 'Kinh doanh', 14, '2023-03-03 10:23:42', '2023-03-06 00:40:50'),
	(5, 'Thông tin', 7, '2023-03-03 10:23:43', '2023-03-04 07:55:48'),
	(6, 'Hr', 4, '2023-03-04 11:39:05', '2023-03-04 07:14:36'),
	(7, 'Sự kiện', 6, '2023-03-04 11:39:20', '2023-03-04 07:29:47'),
	(8, 'Đối ngoại', 15, '2023-03-07 01:19:22', '2023-03-07 01:19:51');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table quanly.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_account` bigint(20) DEFAULT NULL,
  `position` bigint(20) NOT NULL,
  `department` bigint(20) NOT NULL,
  `cmtnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `bank_number` int(11) NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `birth_day` date NOT NULL,
  `home_town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_entered` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.employees: ~7 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name`, `id_account`, `position`, `department`, `cmtnd`, `phone`, `email`, `gender`, `bank_number`, `bank_name`, `birth_day`, `home_town`, `img`, `status`, `description`, `date_entered`, `created_at`, `updated_at`) VALUES
	(1, 'Khánh Minh', 14, 1, 5, '099999999', '0999999999', 'khanh0704495681@gmail.com', 1, 12345678, 'mb bank', '1990-03-03', 'Hà Nội', 'y910sgAyGTjA6eQSb8TrTunsQB1rIJNtSVS8TvV8.png', '1', '', '2023-03-03', '2023-03-03 11:20:06', '2023-03-05 08:22:34'),
	(3, 'Nam Phạm', 16, 1, 1, '123456780', '0704495681', 'khanh0704d4495681@gmail.com', 2, 9876543, 'mb bank', '2023-03-02', 'Đà Nẵng', 'YLET6n8kv2dEYrrbbsyAO78jIKuUUV7aCIAngYsA.jpg', '1', NULL, '2023-03-16', '2023-03-03 07:30:55', '2023-03-04 11:13:24'),
	(5, 'Tuấn minh', 15, 2, 1, '999999999', '0704495682', 'khanh07044d9f5681@gmail.com', 2, 999999999, 'mb bank', '2023-03-08', 'Sóc Trăng', 'gbYYITdHTzeOVAyRNem9OOKH0jo2OC7s5dRS0EK0.jpg', '1', NULL, '2023-03-08', '2023-03-03 07:42:33', '2023-03-03 17:59:40'),
	(6, 'Đình Đạt', 17, 2, 3, '999999999', '0704495681', 'khanh070449asd5681@gmail.com', 1, 988844444, 'mb bank', '2023-03-03', 'Đà Nẵng', 'QdW1aygyWApC498Mu4HXWE2sGZC3iBJk9QWK3R3l.jpg', '1', NULL, '2023-01-31', '2023-03-03 07:46:29', '2023-03-04 07:16:06'),
	(7, 'Phan Tú', 1, 2, 1, '999999999', '0704495681', 'khanh07044956dd81@gmail.com', 2, 999999999, 'mb bank', '2023-03-22', 'Bình Dương', '51zhFCLu31wMlOxzylVSEEDtqlwTMMdbpvpvD4Hy.jpg', '1', NULL, '2023-02-28', '2023-03-03 09:47:25', '2023-03-03 09:47:25'),
	(8, 'Thanh Nam', 33, 1, 2, '999999999', '0704495681', 'khanh07044d95681@gmail.com', 1, 999999999, 'mb bank', '2023-03-06', 'Hồ Chí Minh', 'Rxirnfxd88nE5hWMUT0trpQC1KBVQ8QNafqe5aXd.jpg', '1', NULL, '2023-03-20', '2023-03-03 09:48:29', '2023-03-05 10:45:08'),
	(12, 'Minh Hùng', 35, 3, 1, '999999999', '0704495681', 'khanh070da4495681@gmail.com', 1, 999999999, 'mb bank', '2023-03-15', 'Bình Dương', 'LzHU1EPc6bhL0szqJi52PWMEGvNw8JyB6oZ5sjDo.jpg', '1', NULL, '2023-03-15', '2023-03-03 09:50:52', '2023-03-06 02:41:24'),
	(13, 'Minh Cương', 38, 1, 3, '999999999', '0704495682', 'khanh07044956afasdf81@gmail.com', 1, 988844444, 'mb bank', '2023-03-22', 'Sóc Trăng', 'cdPWklnllZe7SNiZ5tklXz550sxYpQQVIvU57JHV.jpg', '1', NULL, '2023-02-28', '2023-03-04 07:39:53', '2023-03-06 03:01:28'),
	(14, 'Bảo Quốc', 34, 1, 2, '123444445', '0704495681', 'khanh070449568111@gmail.com', 2, 2341341, 'mb bank', '2023-02-27', 'Hồ Chí Minh', 'BOpt7ke9IHmj4UZGohnsfBqmOp8GFg20RyvbvJ8D.jpg', '1', NULL, '2023-02-28', '2023-03-06 00:40:50', '2023-03-06 01:58:22'),
	(15, 'Phạm Long', 39, 1, 3, '123444444', '0704495681', 'khanh191202271@gmail.com', 1, 12345678, 'mb bank', '2001-02-27', 'Nam Định', 'VKK1ZoXV8bgzLKcGk4vDd60MkaW7MBtTWSeZ0RXO.jpg', '1', NULL, '2023-03-07', '2023-03-07 01:14:18', '2023-03-07 06:43:11');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table quanly.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.failed_jobs: ~2 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
	(1, '45ead98f-87bb-4b06-b170-a909e583b1ed', 'database', 'reset_password', '{"uuid":"45ead98f-87bb-4b06-b170-a909e583b1ed","displayName":"App\\\\Jobs\\\\ResetPassword","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\ResetPassword","command":"O:22:\\"App\\\\Jobs\\\\ResetPassword\\":11:{s:4:\\"data\\";a:2:{i:0;a:2:{s:5:\\"email\\";s:25:\\"khanh0704495681@gmail.com\\";s:8:\\"password\\";s:8:\\"9F9M87O1\\";}i:1;a:2:{s:5:\\"email\\";s:20:\\"k191202271@gmail.com\\";s:8:\\"password\\";s:8:\\"2qvqZFAG\\";}}s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";s:14:\\"reset_password\\";s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}', 'ErrorException: Undefined index: password in D:\\Laragon\\laragon\\www\\Quanly\\app\\Jobs\\ResetPassword.php:37\nStack trace:\n#0 D:\\Laragon\\laragon\\www\\Quanly\\app\\Jobs\\ResetPassword.php(37): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined index...\', \'D:\\\\Laragon\\\\lara...\', 37, Array)\n#1 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ResetPassword->handle()\n#2 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ResetPassword))\n#8 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ResetPassword))\n#9 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ResetPassword), false)\n#11 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ResetPassword))\n#12 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ResetPassword))\n#13 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ResetPassword))\n#15 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'reset_password\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'reset_password\')\n#21 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 D:\\Laragon\\laragon\\www\\Quanly\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-03-04 03:49:35'),
	(2, '80ab4076-5a11-4343-b8c2-f542bfddacf1', 'database', 'reset_password', '{"uuid":"80ab4076-5a11-4343-b8c2-f542bfddacf1","displayName":"App\\\\Jobs\\\\ResetPassword","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\ResetPassword","command":"O:22:\\"App\\\\Jobs\\\\ResetPassword\\":11:{s:4:\\"data\\";a:1:{i:0;a:2:{s:5:\\"email\\";s:25:\\"khanh0704495681@gmail.com\\";s:8:\\"password\\";s:8:\\"irjlU6Ua\\";}}s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";s:14:\\"reset_password\\";s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}', 'ErrorException: Undefined index: password in D:\\Laragon\\laragon\\www\\Quanly\\app\\Jobs\\ResetPassword.php:37\nStack trace:\n#0 D:\\Laragon\\laragon\\www\\Quanly\\app\\Jobs\\ResetPassword.php(37): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined index...\', \'D:\\\\Laragon\\\\lara...\', 37, Array)\n#1 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ResetPassword->handle()\n#2 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ResetPassword))\n#8 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ResetPassword))\n#9 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ResetPassword), false)\n#11 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ResetPassword))\n#12 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ResetPassword))\n#13 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ResetPassword))\n#15 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'reset_password\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'reset_password\')\n#21 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 D:\\Laragon\\laragon\\www\\Quanly\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 D:\\Laragon\\laragon\\www\\Quanly\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-03-04 03:50:41');
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table quanly.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table quanly.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_03_03_013316_create_permission_tables', 1),
	(5, '2023_03_03_013702_create_information_staff_table', 1),
	(6, '2023_03_03_013734_create_positions_table', 1),
	(7, '2023_03_03_013754_create_departments_table', 1),
	(8, '2023_03_03_111930_create_jobs_table', 2),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table quanly.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 16),
	(1, 'App\\Models\\User', 17);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table quanly.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.model_has_roles: ~9 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 14),
	(2, 'App\\Models\\User', 15),
	(2, 'App\\Models\\User', 16),
	(1, 'App\\Models\\User', 17),
	(2, 'App\\Models\\User', 20),
	(2, 'App\\Models\\User', 32),
	(2, 'App\\Models\\User', 33),
	(2, 'App\\Models\\User', 34),
	(1, 'App\\Models\\User', 35),
	(2, 'App\\Models\\User', 37),
	(2, 'App\\Models\\User', 38),
	(2, 'App\\Models\\User', 39);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table quanly.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table quanly.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2023-03-04 13:10:32', NULL),
	(2, 'user', 'web', NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table quanly.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table quanly.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.positions: ~4 rows (approximately)
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` (`id`, `name`, `priority_level`, `created_at`, `updated_at`) VALUES
	(1, 'Quản lý', 7, '2023-03-03 10:10:30', NULL),
	(2, 'Nhân viên', 8, '2023-03-03 10:10:31', NULL),
	(3, 'CEO', 1, '2023-03-03 10:10:32', NULL),
	(4, 'intern', 11, '2023-03-03 10:10:31', NULL);
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;

-- Dumping structure for table quanly.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2023-03-03 10:09:14', '2023-03-03 10:09:16'),
	(2, 'User', 'web', '2023-03-03 10:09:26', '2023-03-03 10:09:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table quanly.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table quanly.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_first` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quanly.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_first`, `created_at`, `updated_at`) VALUES
	(1, 'khanh minh', 'khanh070e44915681@gmail.com', NULL, '$2y$10$en0CfcvcQrC2TjpEY6Ufiu/MjV69VM1A2vRtUXfhPeuxbUnhy7b3e', '7YZhag2a9tWbsG4AcbCYqsYypUST8jTmkqcCQDPZZbW1N7rWtFiF1Tx1CXD6', 1, '2023-03-03 02:33:37', '2023-03-04 01:03:06'),
	(14, 'Khánh Minh', 'khanh0704495681@gmail.com', NULL, '$2y$10$A0WTcBtCzUCubA4ZP9eY6eTwSAnC0sNXWvzVSKxuaKyb/d1dq8Lb2', '1i29rqFoX7VEUIJEBIQ0o4AORviQ4c7WrGUjewyPU4gp9xvpCfcfUJyvhWO3', 1, '2023-03-03 12:06:40', '2023-03-05 08:09:00'),
	(15, 'khanh minh', 'khanh07044d9f5681@gmail.com', NULL, '$2y$10$3DUmwnBeCz7Xzw8VubiV/.jBVllAvRruV2CbEK6hAmt73b2K2m.52', NULL, NULL, '2023-03-03 17:59:40', '2023-03-03 17:59:40'),
	(16, 'Nguyễn Viết Minh Khánh', 'khanh0704d4495681@gmail.com', NULL, '$2y$10$PaUGlqa3teonLOEISv0te.Im3M.OxZ9FhKQG5QaRYtMGvuzRVB6rm', NULL, 1, '2023-03-03 18:01:38', '2023-03-04 10:54:24'),
	(17, 'Nguyễn Viết Minh Khánh', 'minhkhanh10112019@gmail.com', NULL, '$2y$10$KehyviNQhbrnZeKyaz0vPe8Zsdw6mjoIRoiPeECzUXb0wD.imS7vO', NULL, 1, '2023-03-03 18:02:29', '2023-03-05 07:42:13'),
	(20, 'khanh minh', 'k1912021271@gmail.com', NULL, '$2y$10$Lw97dS6Wp7QkHbdZOuWUkuw8inHxpG1YdrDD5qpNy1rGnwkD3cIjm', NULL, 1, '2023-03-04 07:43:59', '2023-03-04 07:45:55'),
	(33, 'Nguyễn Viết Minh Khánh', 'kkman10112001u@gmail.com', NULL, '$2y$10$yoggaEEvGoFosvTTS32/.eaHk8A7XMuNk3Ei3c5A2QYfbq7PwU5LC', NULL, 1, '2023-03-05 10:45:08', '2023-03-05 10:46:03'),
	(34, 'Nguyễn Viết Bảo Quốc', 'khanh111112001mn@gmail.com', NULL, '$2y$10$ll8Whkbz21qvExsQtGs3yOfszmVaI.uew8BTUznnTXYIei0nh1dbe', NULL, 1, '2023-03-06 01:44:32', '2023-03-06 01:46:44'),
	(38, 'khanh minh', 'khanh111112001nn@gmail.com', NULL, '$2y$10$/QDZp68a3A2.//eMJOqSQOq6CHQmNVLtUelwCbIuUQXXUFj4uABwq', NULL, 1, '2023-03-06 03:01:28', '2023-03-07 01:33:28'),
	(39, 'Nam Phạm', 'khanh191202271@gmail.com', NULL, '$2y$10$LX25aLm6un1rlqbHLzwhtu8eQnIcT5/8YsFarfF2ubBPUFaHL0d4.', NULL, 1, '2023-03-07 06:43:11', '2023-03-07 06:44:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
