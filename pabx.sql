-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 09-Jun-2017 às 23:09
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pabx`
--
CREATE DATABASE IF NOT EXISTS `pabx` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pabx`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `consultorio` varchar(50) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `obs` varchar(250) NOT NULL,
  `ramal` int(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cel01` varchar(20) NOT NULL,
  `cel02` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_cadastro`, `nome`, `consultorio`, `setor`, `obs`, `ramal`, `telefone`, `cel01`, `cel02`) VALUES
(1, 'Lucas', 'Teste', '1', 'Ã©Ã©Ã©Ã©', 555, '(65) 3684-1325', '(65) 98462-7282', ''),
(2, 'teste', 'Ã©Ã©Ã©', '3', 'Ã©Ã©Ã©', 555, '(65) 3684-1325', '(65) 98462-7282', ''),
(3, 'teste2', 'ééé', '3', 'éééé', 555, '(65) 3684-1325', '(65) 98462-7282', ''),
(4, 'Denis', 'ééé', 'Almoxarifado', 'teste', 558, '(65) 9848-8484', '(65) 99898-9898', ''),
(5, 'asdasd', 'asdasd', 'Almoxarifado', 'asdsd', 123, '(12) 3123-1231', '(12) 31231-2312', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `id_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(100) NOT NULL,
  PRIMARY KEY (`id_localizacao`),
  UNIQUE KEY `Id_localizacao` (`id_localizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id_localizacao`, `local`) VALUES
(1, 'Almoxarifado'),
(2, 'CAF'),
(3, 'CAF Farmácia Centro Cirúrgico'),
(4, 'CAF Farmácia Posto 2'),
(5, 'CAF Farmácia Pronto Atendimento'),
(6, 'CAF Farmácia UTI Adulto'),
(7, 'Contabilidade'),
(8, 'Coord Enfermagem'),
(9, 'Coord Enfermagem CCIH'),
(10, 'Coord Enfermagem Centro Cirúrgico'),
(11, 'Coord Enfermagem CME'),
(12, 'Coord Enfermagem Educação Continuada'),
(13, 'Coord Enfermagem Posto 1'),
(14, 'Coord Enfermagem Posto 1 Sala dos Médicos'),
(15, 'Coord Enfermagem Posto 2'),
(16, 'Coord Enfermagem Posto 3'),
(17, 'Coord Enfermagem Unidade da Mulher'),
(18, 'Coord Enfermagem UTI Adulto'),
(19, 'Coord Suprimentos'),
(20, 'Coord Suprimentos Compras'),
(21, 'Departamento Jurídico'),
(22, 'Departamento Pessoal'),
(23, 'Diretoria'),
(24, 'Engenharia Ambiental'),
(25, 'Faturamento'),
(26, 'Faturamento Arquivo'),
(27, 'Faturamento Central de Guias'),
(28, 'Faturamento Gestão de Contas'),
(29, 'Financeiro'),
(30, 'Gerência Atendimento'),
(31, 'Hospital Jardim Cuiabá'),
(32, 'Manutenção'),
(33, 'Núcleo de Qualidade'),
(34, 'Ouvidoria'),
(35, 'Recepção'),
(36, 'Recepção Consultórios'),
(37, 'Recepção Internação'),
(38, 'Recepção Portaria'),
(39, 'Recepção Pronto Atendimento'),
(40, 'Recursos Humanos'),
(41, 'SEST'),
(42, 'SHL'),
(43, 'SND'),
(44, 'SND Cantina'),
(45, 'Tesouraria'),
(46, 'TI');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
