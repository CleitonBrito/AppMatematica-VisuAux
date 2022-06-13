-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2022 às 18:48
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
(1, 'Fácil', 1, 10),
(2, 'Médio', 10, 100),
(3, 'Difícil', 100, 500);

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
(1, 1, 1, 'Maria tem | unidades de bonecas. Represente a quantidade de bonecas que Maria tem.', 1, 1, '', '', ''),
(2, 1, 2, 'Joana tem | unidades de bonecas. Represente a quantidade de bonecas que Joana tem.', 1, 1, '', '', ''),
(3, 1, 2, 'Patrícia tem | unidades de bonecas. Represente a quantidade de bonecas que Patrícia tem.', 1, 1, '', '', ''),
(4, 1, 1, 'Carlos tem | unidades de carrinhos. Represente a quantidade de carrinhos digitando.', 1, 1, '', '', ''),
(5, 1, 2, 'Pedro tem | unidades de carrinhos. Represente a quantidade de carrinhos digitando.', 1, 1, '', '', ''),
(6, 1, 2, 'Jonas tem | unidades de carrinhos. Represente a quantidade de carrinhos digitando.', 1, 1, '', '', ''),
(7, 1, 1, 'Luna está começando sua coleção de canetinhas coloridas. Ela já tem | unidades. Represente digitando a quantidade.', 1, 1, '', '', ''),
(8, 1, 2, 'Camila está começando sua coleção de canetinhas coloridas. Ela já tem | unidades. Represente digitando a quantidade.', 1, 1, '', '', ''),
(9, 1, 2, 'Amanda está começando sua coleção de canetinhas coloridas. Ela já tem | unidades. Represente digitando a quantidade.', 1, 1, '', '', ''),
(10, 1, 1, 'Em uma sala é possível colocar | unidades de cadeiras. Represente esse número.', 5, 1, '', '', ''),
(11, 1, 2, 'Em uma sala é possível colocar | unidades de cadeiras. Represente esse número.', 2, 1, '', '', ''),
(12, 1, 2, 'Em uma sala é possível colocar | unidades de cadeiras. Represente esse número.', 1, 1, '', '', ''),
(13, 1, 1, 'Qual número representa | dezenas e | unidades?', 2, 2, 'true', '', ''),
(14, 1, 2, 'Qual número representa | dezenas e | unidades?', 4, 2, 'true', '', ''),
(15, 1, 2, 'Qual número representa | dezenas e | unidades?', 6, 2, 'true', '', ''),
(16, 1, 1, 'Para o aniversário de Jorge foram feitos | dezenas e | unidades de brigadeiros. Quantos brigadeiros foram feitos?', 2, 2, 'true', '', ''),
(17, 1, 2, 'Para o aniversário de Marcos foram feitos | dezenas e | unidades de brigadeiros. Quantos brigadeiros foram feitos?', 3, 2, 'true', '', ''),
(18, 1, 2, 'Para o aniversário de Mônica foram feitos | dezenas e | unidades de brigadeiros. Quantos brigadeiros foram feitos?', 4, 2, 'true', '', ''),
(19, 1, 1, 'Se você comprar um pacote de balas com | centenas, | dezenas e | unidades, quantas balas você terá?', 3, 3, 'true', '', ''),
(20, 1, 2, 'Se você comprar um pacote de balas com | centenas, | dezenas e | unidades, quantas balas você terá?', 5, 3, 'true', '', ''),
(21, 1, 2, 'Se você comprar um pacote de balas com | centenas, | dezenas e | unidades, quantas balas você terá?', 7, 3, 'true', '', ''),
(22, 1, 1, 'Um pote de doces tem capacidade para armazenar | dezenas e | unidades de bolacha. Quantas bolachas serão armazenadas?', 3, 2, 'true', '', ''),
(23, 1, 1, 'Num caminhão é possível carregar | centenas, | dezenas e | unidades de melancias. Represente essa quantidade.', 3, 3, 'true', '', ''),
(24, 1, 1, 'Karla vendeu | centenas, | dezenas e | unidades de camisas em sua loja. Quantas camisas ela vendeu?', 4, 3, 'true', '', ''),
(25, 1, 1, 'José tem | centenas, | dezenas e | unidades de bolinhas de gude. Digite o número que representa a quantidade de bolinhas de gude que José tem.', 2, 3, 'true', '', ''),
(26, 1, 2, 'Bruno tem | dezenas e | unidades de bolinhas de gude. Represente essa quantidade', 4, 2, 'true', '', ''),
(27, 2, 1, 'Pedro tinha | carrinhos e ganhou mais |. Com quantos carrinhos ele ficou?', 8, 2, '', '', '+'),
(28, 2, 2, 'Lucas tinha | carrinhos e ganhou mais |. Com quantos carrinhos ele ficou?', 9, 2, '', '', '+'),
(29, 2, 2, 'Fabrício tinha | carrinhos e ganhou mais |. Com quantos carrinhos ele ficou?', 10, 2, '', '', '+'),
(30, 2, 1, 'Márcia tinha | canetas e deu | para Camilla. Com quantas canetas Márcia ficou?', 3, 2, '', 'true', '-'),
(31, 2, 2, 'Júlia tinha | canetas e deu | para João. Com quantas canetas Márcia ficou?', 5, 2, '', 'true', '-'),
(32, 2, 2, 'Amanda tinha | canetas e deu | para Lina. Com quantas canetas Márcia ficou?', 7, 2, '', 'true', '-'),
(33, 2, 1, 'Heitor tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 3, 2, '', '', '+'),
(34, 2, 2, 'Lucas tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 5, 2, '', '', '+'),
(35, 2, 2, 'Valter tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 7, 2, '', '', '+'),
(36, 2, 1, 'Roberta tinha | e deu | de suas bolsas. Com quantas bolsas ela ficou?', 3, 2, '', 'true', '-'),
(37, 2, 2, 'Cássia tinha | e deu | de suas bolsas. Com quantas bolsas ela ficou?', 5, 2, '', 'true', '-'),
(38, 2, 2, 'Marlene tinha | e deu | de suas bolsas. Com quantas bolsas ela ficou?', 7, 2, '', 'true', '-'),
(39, 2, 1, 'Heitor tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 3, 2, '', '', '+'),
(40, 2, 2, 'Jonas tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 6, 2, '', '', '+'),
(41, 2, 2, 'Carlos tinha | carrinhos e ganhou mais |. Com quantos ele ficou?', 8, 2, '', '', '+'),
(42, 2, 1, 'O salário de João é de R$ |, e de sua esposa de R$ |. Quanto os dois têm no total?', 3, 2, '', '', '+'),
(43, 2, 2, 'O salário de Amilton é de R$ |, e de sua esposa de R$ |. Quanto os dois têm no total?', 6, 2, '', '', '+'),
(44, 2, 2, 'O salário de Jorge é de R$ |, e de sua esposa de R$ |. Quanto os dois têm no total?', 9, 2, '', '', '+'),
(45, 2, 1, 'Você tem | gatos de estimação e cada um tem | filhotes. Quantos filhotes tem no total?', 1, 2, '', '', '*'),
(46, 2, 2, 'Você tem | gatos de estimação e cada um tem | filhotes. Quantos filhotes tem no total?', 1, 2, '', '', '*'),
(47, 2, 2, 'Você tem | gatos de estimação e cada um tem | filhotes. Quantos filhotes tem no total?', 2, 2, '', '', '*'),
(48, 6, 3, 'Comprei uma pizza de | pedaços e comi |. Qual alternativa representa essa fração?', 1, 2, '', 'true', ''),
(49, 6, 3, 'Tenho uma área dividida em | lotes. Vendi |. Qual alternativa representa essa fração?', 3, 2, '', 'true', ''),
(50, 6, 3, 'Tenho uma área dividida em | lotes. Vendi |. Qual alternativa representa essa fração?', 5, 2, '', 'true', ''),
(51, 6, 3, 'Uma barra de chocolate tem | quadradinhos. Se você comer |, qual fração representa essa quantidade?', 3, 2, '', 'true', ''),
(52, 6, 3, 'Ailton quer dividir seu lote de | partes  |. Qual alternativa representa essa fração?', 5, 2, '', 'true', ''),
(53, 6, 3, 'Se dividirmos | em |. Qual alternativa representa essa fração?', 5, 2, '', 'true', ''),
(54, 7, 3, 'Quantos por cento representa | de |?', 1, 2, '', 'false', ''),
(55, 7, 3, 'Quantos por cento representa | de |?', 1, 2, '', 'false', ''),
(56, 7, 3, 'Quantos por cento representa | de |?', 1, 2, '', 'false', ''),
(57, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(58, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(59, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(60, 7, 3, '|% de | equivale à?', 1, 2, '', '', '%'),
(61, 7, 3, '|% de | equivale à?', 1, 2, '', '', '%'),
(62, 7, 3, '|% de | equivale à?', 1, 2, '', '', '%'),
(63, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(64, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(65, 7, 3, 'Quantos por cento representa | de |?', 2, 2, '', 'false', ''),
(66, 7, 3, 'Quantos por cento representa | de |?', 3, 2, '', 'false', ''),
(67, 7, 3, 'Quantos por cento representa | de |?', 3, 2, '', 'false', ''),
(68, 7, 3, 'Quantos por cento representa | de |?', 3, 2, '', 'false', ''),
(69, 7, 3, '|% de | equivale à?', 2, 2, '', '', '%'),
(70, 7, 3, '|% de | equivale à?', 2, 2, '', '', '%'),
(71, 7, 3, '|% de | equivale à?', 2, 2, '', '', '%'),
(72, 7, 3, '|% de | equivale à?', 5, 2, '', 'false', '%'),
(73, 7, 3, '|% de | equivale à?', 5, 2, '', 'false', '%'),
(74, 7, 3, '|% de | equivale à?', 5, 2, '', 'false', '%');

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
  MODIFY `id_questao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
