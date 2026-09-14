-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/09/2026 às 00:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `feira_tecnologica`
--
CREATE DATABASE IF NOT EXISTS `feira_tecnologica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `feira_tecnologica`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `comentario` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `post_id`, `usuario_id`, `empresa_id`, `comentario`, `criado_em`, `atualizado_em`) VALUES
(6, 3, 5, NULL, 'Legal eu irei para ai assim que sair do trabalho', '2026-09-13 20:59:36', '2026-09-13 20:59:36'),
(7, 3, 6, NULL, 'isso e bugado', '2026-09-13 21:05:10', '2026-09-13 21:05:10'),
(8, 3, NULL, 4, 'VENHAM GENTE', '2026-09-13 21:44:32', '2026-09-13 21:44:32'),
(11, 3, 6, NULL, 'pde contar comigo', '2026-09-13 21:47:10', '2026-09-13 21:47:10'),
(12, 3, 6, NULL, 'testte de comentario infinito', '2026-09-13 22:31:51', '2026-09-13 22:31:51'),
(13, 3, 6, NULL, 'testte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte', '2026-09-13 22:32:03', '2026-09-13 22:32:03'),
(14, 3, 6, NULL, 'testte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario infinitotestte de comentario inftem limite a', '2026-09-13 22:32:18', '2026-09-13 22:32:18'),
(15, 3, 6, NULL, 'testte de comentario infinitotestte de comentario infinito', '2026-09-13 22:32:24', '2026-09-13 22:32:24'),
(16, 3, 6, NULL, 'testte de comentario infinito', '2026-09-13 22:32:27', '2026-09-13 22:32:27'),
(17, 3, 6, NULL, 'testte de comentario infinito', '2026-09-13 22:32:30', '2026-09-13 22:32:30'),
(18, 3, 6, NULL, 'testte de comentario infinito', '2026-09-13 22:32:32', '2026-09-13 22:32:32'),
(22, 7, NULL, 4, 'O rei rato é incrivel', '2026-09-13 23:31:16', '2026-09-13 23:31:16'),
(23, 7, 7, NULL, 'credo isso é bizarro, fico me perguntando como ribeirão pires permite um negócio desse e não tem nem botão para denunciar!', '2026-09-13 23:34:45', '2026-09-13 23:34:45'),
(24, 3, 7, NULL, 'Lorem ipsum dollor sit amet', '2026-09-13 23:37:12', '2026-09-13 23:37:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `email`, `senha`, `criado_em`) VALUES
(1, 'cigarro world', '2@2', '$2b$10$RBzdmhpZDv86khbZVPvjneSloV.1LZ/T3ENJsA2FdinmTITnCQPqe', '2026-09-12 03:00:50'),
(2, 'Ribeirao', '1@1', '$2b$10$SihhVPcKzMrBp/kfBoWHIO667bvK5wAXe6wh7MZ1582jnuZ04ihKi', '2026-09-12 16:02:17'),
(3, 'Cafeteria da rata', 'ratinha@gmail.com', '$2b$10$CEvqsoP59YeLqI3FwcBNLeATmp2k9rg5plhk1BQzE5N8IrZJ9aAR6', '2026-09-12 23:57:42'),
(4, 'rata do café', 'ratinha2@gmail.com', '$2b$10$Q5FTwtZPydsOljty8IpMEe/Nj/ps6gTA0.H84axHcsLBd2rJFXJ8a', '2026-09-13 20:53:51'),
(5, 'Delicias na cozinha', 'deleciasnacozinha@gmail.com', '$2b$10$BVM.brjey6oxtmeBwfgey.kBVveB8aMMXe1wY6buw1nmr8MD0Qwt2', '2026-09-13 23:40:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `usuario_id`, `empresa_id`, `criado_em`) VALUES
(7, 3, 5, NULL, '2026-09-13 20:59:17'),
(10, 3, NULL, 4, '2026-09-13 21:44:24'),
(18, 6, 6, NULL, '2026-09-13 23:13:50'),
(19, 3, 6, NULL, '2026-09-13 23:14:58'),
(20, 7, NULL, 4, '2026-09-13 23:30:54'),
(21, 7, 7, NULL, '2026-09-13 23:33:57'),
(22, 3, 7, NULL, '2026-09-13 23:37:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `tipo` enum('noticia','evento') NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `empresa_id`, `tipo`, `titulo`, `descricao`, `imagem`, `data_evento`, `criado_em`, `atualizado_em`) VALUES
(3, 4, 'evento', 'Cafe Gratis para todo mundo da cidade', 'nessa terça feira a cafeteria da rata como evento de inauguraçao esta distribuido cupoes de cafe gratis venha se cafeinar ', '1789333051019-341429819.jpeg', '2026-09-15', '2026-09-13 20:57:31', '2026-09-13 23:02:26'),
(4, 4, 'evento', 'evento test', 'evento test', NULL, '2026-09-01', '2026-09-13 22:21:41', '2026-09-13 22:21:41'),
(5, 4, 'evento', 'evento test', 'evento test', NULL, '2026-09-16', '2026-09-13 22:21:54', '2026-09-13 22:21:54'),
(6, 4, 'noticia', 'evento test', 'evento test', NULL, NULL, '2026-09-13 22:22:04', '2026-09-13 22:22:04'),
(7, 4, 'evento', 'Reunião dos ratos em celebração ao Rato Rei', 'Meus amigos ratos, ratas e rates.\r\nÉ  com  muito orgulho que convido a todos a participar na cerimonia de celebração do rato Rei. \r\nOnde todos nos uniremos a ele.\r\n\r\nCamundongos não serão tolerados.', '1789342189874-403688179.jpg', '2026-10-02', '2026-09-13 22:22:17', '2026-09-13 23:29:49'),
(8, 5, 'noticia', 'Novo bolo de cenoura e chocolate', 'Ingredientes (8 porções)\r\n\r\nMassa\r\nóleo\r\n1/2 xícara (chá) de óleo\r\ncenoura\r\n3 cenouras médias raladas\r\novo\r\n4 ovos\r\naçúcar\r\n2 xícaras (chá) de açúcar\r\nfarinha de trigo\r\n2 e 1/2 xícaras (chá) de farinha de trigo\r\nfermento em pó químico\r\n1 colher (sopa) de fermento em pó\r\nCobertura\r\nmanteiga\r\n1 colher (sopa) de manteiga\r\nchocolate em pó\r\n3 colheres (sopa) de chocolate em pó\r\naçúcar\r\n1 xícara (chá) de açúcar\r\nleite\r\n1 xícara (chá) de leite\r\n\r\nUtensílios\r\nBatedeira\r\nBatedeira\r\nComprar\r\nLiquidificador\r\nLiquidificador\r\nComprar\r\n\r\nFormo de bolo\r\nFormo de bolo\r\nComprar\r\nPrato de sobremesa\r\nPrato de sobremesa\r\nComprar\r\nAo clicar em comprar você será redirecionado para um site externo\r\n\r\n\r\nModo de preparo\r\nModo de preparo : 40min\r\n1\r\nMassa\r\nEm um liquidificador, adicione a cenoura, os ovos e o óleo, depois misture.\r\n\r\n2\r\nAcrescente o açúcar e bata novamente por 5 minutos.\r\n\r\n3\r\nEm uma tigela ou na batedeira, adicione a farinha de trigo e depois misture novamente.\r\n\r\n4\r\nAcrescente o fermento e misture lentamente com uma colher.\r\n\r\n5\r\nAsse em um forno preaquecido a 180° C por aproximadamente 40 minutos.\r\n\r\n6\r\nCobertura\r\nDespeje em uma tigela a manteiga, o chocolate em pó, o açúcar e o leite, depois misture.\r\n\r\n7\r\nLeve a mistura ao fogo e continue misturando até obter uma consistência cremosa, depois despeje a calda por cima do bolo.', '1789343280954-843360760.png', NULL, '2026-09-13 23:48:01', '2026-09-13 23:48:01'),
(9, 5, 'evento', 'Lorem Ipsum Dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1789343435478-454724642.jpg', '2026-09-08', '2026-09-13 23:50:35', '2026-09-13 23:50:35'),
(10, 5, 'noticia', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1789343541022-856224116.jpg', NULL, '2026-09-13 23:52:21', '2026-09-13 23:52:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criado_em`) VALUES
(1, 'sla', '1@1', '$2b$10$0CRQ4FkWMiaW/BwSe/PYAOy/MSxJNvytsT3ivVEPpuSS.Ztnbn3q2', '2026-09-12 02:55:29'),
(2, 'Henrique', 'henriquezarap@gmail.com', '$2b$10$txfRcqUy51VeE2bKSQ7TBO0TKep/pVnKSAyhbmWs6mq3DB0VnZxge', '2026-09-12 15:19:19'),
(3, 'rata do café', 'ratinha@gmail.com', '$2b$10$czgdokZldPinzYhzIrBxVuSLtq9PITZZjDHvh.bQk5Sq27XXz9HzG', '2026-09-12 23:54:53'),
(4, 'rata do café', 'ratinha2@gmail.com', '$2b$10$2SB/7PFBMqfGM.w/BSszSemxo4oPeBmcRnUNLjpI3sjCF56Q.5tVy', '2026-09-12 23:55:32'),
(5, 'sla', '1@3', '$2b$10$iw./chdWh.rJ4VftxpqlNexZW0.ZOyYkyUPuj9wShlrz8VGYfoSue', '2026-09-13 20:59:07'),
(6, '123', '123@1', '$2b$10$sm8lxK5JLPpnZPcmVPQEy.XSguZ3VmQtX32gEbqA23uGcI3LTm8/2', '2026-09-13 21:04:51'),
(7, 'Beatriz Kenobi', 'beatrizkenobi@gmail.com', '$2b$10$0r5rNcRUQNE0RG0uh95sq./7vSB6GYJG.tQhES.d0UEF0pSwcUDEC', '2026-09-13 23:33:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_comentarios_empresa` (`empresa_id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`usuario_id`),
  ADD UNIQUE KEY `unique_like_empresa` (`post_id`,`empresa_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_likes_empresa` (`empresa_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comentarios_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
