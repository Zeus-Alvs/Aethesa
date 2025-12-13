
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Estrutura para tabela `users`
--
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(61, 'ZEUS', 'zeus@teste.com', '$2y$10$6TFJVhkwDJUcV8bQBbSgk.6Rvs9B5WZx9g4vDRudSl8poA9yM/Mku'),
(62, 'LUDMYLA', 'aethesa@teste.com', '$2y$10$0dyoY/uCu5uqCfsJjtkLUejU5YSYOr8DHaJjBUcTcVFVnXGy8iaOy');

--
-- Estrutura para tabela `products`
--
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sold_count` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--
INSERT INTO `products` (`id`, `name`, `price`, `image`, `sold_count`) VALUES
(44, 'Calça cargo cintura baixa com corrente adicional', 119.99, 'images/produto1.jpg', 18),
(45, 'Jaqueta Jeans esbranquiçada - coleção Magic', 159.99, 'images/produto2.jpg', 21),
(48, 'Jaqueta Jeans - coleção Urbana', 99.99, 'images/produto3.jpg', 19),
(51, 'Vestido Midi Denim "Urban Chic" com Cinto', 219.99, 'images/produto9.jpg', 7),
(52, 'Calça Cargo Modular "Desert Storm" - Transform Edition', 329.99, 'images/produto10.jpg', 9),
(53, 'Calça Jeans Cargo Wide Leg "Skate Vibe"', 178.00, 'images/produto11.jpg', 7),
(55, 'Bucket Hat "Yellow Monarch" - Drop Aethesa', 59.99, 'images/produto5.jpeg', 6),
(56, 'Colar Aethesa "Urban Fly" Prateado', 49.99, 'images/produto7.jpg', 15),
(58, 'Short Denim "Vintage Blue" - Summer Edition', 45.00, 'images/produto8.jpg', 5),
(59, 'Bolsa Crossbody "Denim Quilted" Utilitária', 89.99, 'images/produto12.jpeg', 11),
(60, 'Jaqueta Denim "Ice Wash" Desconstruída', 79.99, 'images/produto4.png', 23);


--
-- Estrutura para tabela `carts`
--
CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `favorites`
--
CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sessions` (
    `id` varchar(255) NOT NULL,
    `user_id` bigint(20) UNSIGNED DEFAULT NULL,
    `ip_address` varchar(45) DEFAULT NULL,
    `user_agent` text DEFAULT NULL,
    `payload` longtext NOT NULL,
    `last_activity` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `sessions_user_id_index` (`user_id`),
    KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;