-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jan-2022 às 13:40
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_matematica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id` int(10) NOT NULL,
  `conteudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`id`, `conteudo`) VALUES
(1, 'Unidades, Dezenas e Centenas'),
(2, 'Operações Básicas'),
(3, 'Escrever por Extenso'),
(4, 'Operações Diversas'),
(5, 'Números Romanos'),
(6, 'Frações'),
(7, 'Porcentagem'),
(8, 'Razão e Proporção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dificuldade`
--

CREATE TABLE `dificuldade` (
  `id` int(10) NOT NULL,
  `dificuldade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` smallint(4) NOT NULL,
  `max` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dificuldade`
--

INSERT INTO `dificuldade` (`id`, `dificuldade`, `min`, `max`) VALUES
(1, 'Fácil', 1, 100),
(2, 'Médio', 500, 1500),
(3, 'Difícil', 1500, 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_20_204556_conteudos', 1),
(2, '2021_02_20_205243_dificuldade', 1),
(3, '2021_02_20_205414_questoes', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id_questao` int(10) NOT NULL,
  `id_conteudo` int(11) NOT NULL,
  `id_dificuldade` int(11) NOT NULL,
  `questao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` tinyint(2) NOT NULL,
  `qtd_numeros` int(11) DEFAULT NULL,
  `juntar` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decrescente` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operacao` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id_questao`, `id_conteudo`, `id_dificuldade`, `questao`, `peso`, `qtd_numeros`, `juntar`, `decrescente`, `operacao`) VALUES
(1, 1, 1, 'Maria tem | unidades de bonecas. Represente a quantidade de bonecas que Maria tem.', 1, 1, NULL, NULL, NULL),
(2, 1, 1, 'Carlos tem | unidades de carrinhos. Represente a quantidade de carrinhos digitando.', 1, 1, NULL, NULL, NULL),
(3, 1, 1, 'Luna está começando sua coleção de canetinhas coloridas. Ela já tem | unidades. Represente digitando a quantidade.', 1, 1, NULL, NULL, NULL),
(4, 1, 1, 'Em uma sala é possível colocar | unidades de cadeiras. Represente esse número.', 5, 1, NULL, NULL, NULL),
(5, 1, 1, 'Qual número representa | dezenas e | unidades?', 2, 2, 'true', NULL, NULL),
(6, 1, 1, 'Para o aniversário de Jorge foram feitos | dezenas e | unidades de brigadeiros. Quantos brigadeiros foram feitos?', 2, 2, 'true', NULL, NULL),
(7, 1, 1, 'Se você comprar um pacote de balas com | centenas, | dezenas e | unidades, quantas balas você terá?', 3, 3, 'true', NULL, NULL),
(8, 1, 1, 'Um pote de doces tem capacidade para armazenar | dezenas e | unidades de bolacha. Quantas bolachas serão armazenadas?', 3, 2, 'true', NULL, NULL),
(9, 1, 1, 'Num caminhão é possível carregar | centenas, | dezenas e | unidades de melancias. Represente essa quantidade.', 3, 3, 'true', NULL, NULL),
(10, 1, 1, 'Karla vendeu | centenas, | dezenas e | unidades de camisas em sua loja. Quantas camisas ela vendeu?', 4, 3, 'true', NULL, NULL),
(11, 1, 1, 'José tem | centenas, | dezenas e | unidades de bolinhas de gude. Digite o número que representa a quantidade de bolinhas de gude que José tem.', 2, 3, 'true', NULL, NULL),
(12, 2, 1, 'Pedro tinha | carrinhos e ganhou mais |. Com quantos carrinhos ele ficou?', 8, 2, NULL, NULL, '+'),
(13, 2, 1, 'Márcia tinha | canetas e deu | para Camilla. Com quantas canetas Márcia ficou?', 3, 2, NULL, 'true', '-'),
(14, 2, 1, 'Você tem | gatos de estimação e cada um tem | filhotes. Quantos filhotes tem no total?', 1, 2, NULL, NULL, '*'),
(15, 6, 1, 'Comprei uma pizza de | pedaços e comi |. Qual alternativa representa essa fração?', 1, 2, NULL, 'true', NULL),
(16, 6, 1, 'Uma barra de chocolate tem | quadradinhos. Se você comer |, qual fração representa essa quantidade?', 3, 2, NULL, 'true', NULL),
(17, 7, 1, 'Quantos por cento representa | de |?', 1, 2, NULL, 'false', ''),
(18, 7, 1, 'Quantos por cento representa | de |?', 8, 2, NULL, 'false', NULL),
(19, 7, 1, '|% de | equivale à?', 6, 2, NULL, NULL, '%'),
(20, 1, 2, 'Bruno tem | dezenas e | unidades de bolinhas de gude. Represente essa quantidade', 4, 2, 'true', NULL, NULL),
(21, 2, 2, 'Heitor tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 3, 2, NULL, NULL, '+'),
(22, 2, 3, 'O salário de João é de R$ |, e de sua esposa de R$ |. Quanto os dois têm no total?', 3, 2, NULL, '', '+');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dificuldade`
--
ALTER TABLE `dificuldade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id_questao`),
  ADD KEY `fk_id_conteudo` (`id_conteudo`),
  ADD KEY `fk_id_dificuldade` (`id_dificuldade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `dificuldade`
--
ALTER TABLE `dificuldade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id_questao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_id_conteudo` FOREIGN KEY (`id_conteudo`) REFERENCES `conteudos` (`id`),
  ADD CONSTRAINT `fk_id_dificuldade` FOREIGN KEY (`id_dificuldade`) REFERENCES `dificuldade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
