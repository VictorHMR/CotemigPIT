SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `tecpix` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tecpix`;

DELIMITER $$
DROP PROCEDURE IF EXISTS `prc_filtrarC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_filtrarC` (IN `p_categoria` VARCHAR(100))  NO SQL
BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, usuario.telefone, reparo.regiao
from reparo, usuario

where reparo.status ="Aberto" AND
reparo.usuario = usuario.usuario AND 
reparo.categoria = p_categoria;
      

END$$

DROP PROCEDURE IF EXISTS `prc_filtrarR`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_filtrarR` (IN `p_regiao` VARCHAR(100))  NO SQL
BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, usuario.telefone, reparo.regiao
from reparo, usuario

where reparo.status ="Aberto" AND
reparo.usuario = usuario.usuario AND 
reparo.regiao = p_regiao ;
      

END$$

DROP PROCEDURE IF EXISTS `prc_filtrarRC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_filtrarRC` (IN `p_categoria` VARCHAR(100), IN `p_regiao` VARCHAR(100))  NO SQL
BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, usuario.telefone, reparo.regiao
from reparo, usuario

where reparo.status ="Aberto" AND
reparo.usuario = usuario.usuario AND 
reparo.regiao = p_regiao AND
reparo.categoria = p_categoria;
      

END$$

DROP PROCEDURE IF EXISTS `prc_listarTecnicos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_listarTecnicos` (IN `p_regiao` VARCHAR(50) CHARSET utf8)  BEGIN

SELECT usuario.nome, usuario.telefone, usuario.idade, sum(avaliacao.nota)/ count(avaliacao.id) as Nota, count(avaliacao.id) as quantidade

from usuario 

join avaliacao on avaliacao.usuario = usuario.usuario
where usuario.tipo = "Tecnico" and 
regiao = p_regiao GROUP BY usuario.nome ORDER BY Nota DESC;


END$$

DROP PROCEDURE IF EXISTS `prc_listarUsuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_listarUsuarios` (IN `p_regiao` VARCHAR(50) CHARSET utf8)  BEGIN

SELECT usuario.nome, usuario.telefone, usuario.idade, sum(avaliacao.nota)/ count(avaliacao.id) as Nota, count(avaliacao.id) as quantidade
from usuario 
join avaliacao on avaliacao.usuario = usuario.usuario

where usuario.tipo = "Usuario Comum" and regiao = p_regiao 
GROUP BY usuario.nome
ORDER BY Nota;


END$$

DROP PROCEDURE IF EXISTS `prc_pedidosAbertos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosAbertos` ()  BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, usuario.telefone, reparo.regiao
from reparo, usuario

where reparo.status ="Aberto" AND
      reparo.usuario = usuario.usuario;
      





END$$

DROP PROCEDURE IF EXISTS `prc_pedidosAbertosC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosAbertosC` (IN `p_usuario` VARCHAR(50))  BEGIN


SELECT reparo.id, reparo.detalhes,reparo.categoria, reparo.data,reparo.status
from reparo

where reparo.usuario = p_usuario AND
reparo.status = "Aberto"
GROUP BY id;
      





END$$

DROP PROCEDURE IF EXISTS `prc_pedidosEmAndamento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosEmAndamento` (IN `p_tecnico` VARCHAR(50))  BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, reparo.regiao, usuario.telefone 
from reparo

join usuario on reparo.usuario = usuario.usuario

where reparo.tecnico = p_tecnico AND
reparo.status = "Em Andamento" OR
reparo.tecnico = p_tecnico AND
reparo.status = "Aguardando Confirmação" OR
reparo.tecnico = p_tecnico AND
reparo.status = "Revisar"
GROUP BY id;
      





END$$

DROP PROCEDURE IF EXISTS `prc_pedidosEmAndamentoC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosEmAndamentoC` (IN `p_usuario` VARCHAR(50))  BEGIN


SELECT reparo.id, reparo.detalhes,reparo.categoria, reparo.data,reparo.status, usuario.nome as Tecnico, usuario.telefone, usuario.pix
from reparo

join usuario on reparo.tecnico = usuario.usuario

where reparo.usuario = p_usuario AND
reparo.status = "Em Andamento" OR
reparo.usuario = p_usuario AND
reparo.status = "Aguardando Confirmação" OR
reparo.usuario = p_usuario AND
reparo.status = "Revisar"
GROUP BY id;
      





END$$

DROP PROCEDURE IF EXISTS `prc_pedidosFinalizados`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosFinalizados` (IN `p_tecnico` VARCHAR(50))  BEGIN


SELECT reparo.id, reparo.detalhes, reparo.categoria, reparo.data,reparo.status, usuario.nome as Cliente, usuario.telefone, reparo.regiao, usuario.usuario as usuario, avaliacao.nota, avaliacao.comentario
from usuario

join reparo on reparo.usuario = usuario.usuario
left join avaliacao on avaliacao.usuario = reparo.tecnico  AND avaliacao.id_reparo = reparo.id

where 
reparo.tecnico = p_tecnico AND
reparo.status ="Aguardando Avaliação" OR

reparo.tecnico = p_tecnico AND
reparo.status = "Avaliado Pelo Usuario" OR

reparo.tecnico = p_tecnico AND
reparo.status = "Avaliado Pelo Tecnico" OR

reparo.tecnico = p_tecnico AND
reparo.status = "Finalizado"
GROUP BY id ORDER BY reparo.status;
      





END$$

DROP PROCEDURE IF EXISTS `prc_pedidosFinalizadosCP`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_pedidosFinalizadosCP` (IN `p_usuario` VARCHAR(50))  BEGIN


SELECT reparo.id, reparo.detalhes,reparo.categoria, reparo.data,reparo.status, usuario.nome as Tecnico, usuario.telefone , usuario.pix, usuario.usuario, avaliacao.comentario, avaliacao.nota
from reparo

join usuario on reparo.tecnico = usuario.usuario
left join avaliacao on avaliacao.usuario = reparo.usuario  AND avaliacao.id_reparo = reparo.id


where 
reparo.usuario = p_usuario AND
reparo.status ="Aguardando Avaliação"  OR

reparo.usuario = p_usuario AND
reparo.status = "Avaliado Pelo Usuario" OR

reparo.usuario = p_usuario AND
reparo.status = "Avaliado Pelo Tecnico"  OR

reparo.usuario = p_usuario AND
reparo.status = "Finalizado"
GROUP BY id ORDER BY reparo.status;
      





END$$

DELIMITER ;

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE `avaliacao` (
  `id` int NOT NULL,
  `nota` int DEFAULT NULL,
  `comentario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `id_reparo` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `avaliacao` (`id`, `nota`, `comentario`, `usuario`, `id_reparo`) VALUES
(205, 5, 'Tecnico Respondeu de forma Rapida e eficiente', 'admT', 92),
(204, 1, 'Usuário horrível', 'adm', 94),
(199, 5, 'Teste feito', 'adm', 89),
(198, 5, 'aaaaa', 'admT', 89),
(203, 4, 'Técnico Ótimo', 'Bolsonaro', 94);

DROP TABLE IF EXISTS `reparo`;
CREATE TABLE `reparo` (
  `id` int NOT NULL,
  `detalhes` varchar(200) NOT NULL,
  `regiao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `data` varchar(20) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `tecnico` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `reparo` (`id`, `detalhes`, `regiao`, `categoria`, `data`, `status`, `usuario`, `tecnico`) VALUES
(94, 'Trocar o Processador por um de 5 geração', 'Belo Horizonte', 'Troca de Peça', '2021-11-09', 'Finalizado', 'adm', 'Bolsonaro'),
(92, 'Trocar A Memoria Ram para uma de 4gb', 'Belo Horizonte', 'Defeito', '2021-11-17', 'Avaliado Pelo Usuario', 'Josemir', 'admT'),
(93, 'Favor trocar a Tela.', 'Belo Horizonte', 'Defeito', '2021-11-18', 'Aberto', 'Josemir', NULL),
(91, 'Favor, fazer uma limpeza em todos os componentes', 'Contagem', 'Outros', '2021-11-19', 'Em Andamento', 'adm', 'testT'),
(90, 'Favor, Fazer uma limpeza geral e instalar o Windows XP', 'Contagem', 'Troca de Peça', '2021-11-26', 'Em Andamento', 'adm', 'admT'),
(88, 'aaaaa', 'Contagem', 'Formatação', '2021-12-01', 'Em Andamento', 'adm', 'admT'),
(89, 'Favor, Trocar Placa mãe', 'Contagem', 'Outros', '2021-11-22', 'Finalizado', 'adm', 'admT'),
(95, 'Trocar a Placa mãe por uma mais atual', 'Contagem', 'Outros', '2021-11-09', 'Aberto', 'adm', NULL),
(96, 'Computador Não liga', 'Belo Horizonte', 'Formatação', '2021-11-02', 'Aberto', 'Cassemiro', NULL),
(97, 'Notebook Acer', 'Contagem', 'Limpeza', '2021-11-23', 'Aberto', 'adm', NULL),
(98, 'Favor, Fazer uma limpeza geral nos componentes', 'Contagem', 'Limpeza', '2021-11-24', 'Aberto', 'adm', NULL),
(99, 'Trocar a Placa de vídeo por uma mais moderna', 'Contagem', 'Troca de Peça', '2021-11-23', 'Aberto', 'adm', NULL);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idade` int NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regiao` varchar(50) NOT NULL,
  `pix` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `usuario` (`nome`, `idade`, `usuario`, `cpf`, `telefone`, `regiao`, `pix`, `senha`, `tipo`) VALUES
('Josemir', 75, 'Josemir', '156.465.416-51', '(15)64654-3213', 'Belo Horizonte', '265465165', '123', 'Usuario Comum'),
('Admin Comum', 87, 'adm', '999.999.999-99', '(11)11111-1111', 'Contagem', '111', 'adm', 'Usuario Comum'),
('Teste Tecnico', 78, 'testT', '585.858.585-85', '(11)11111-1111', 'Contagem', '989898', 'testT', 'Tecnico'),
('Admin Tecnico', 78, 'admT', '666.666.666-66', '(31)88552-6486', 'Contagem', '666', 'admT', 'Tecnico'),
('Cassemiro', 12, 'Cassemiro', '654.651.651-65', '(23)41654-8421', 'Belo Horizonte', '6516545', '123', 'Usuario Comum'),
('Bolsonaro', 98, 'Bolsonaro', '546.654.651-65', '(65)48546-5132', 'Belo Horizonte', '654643210', '123', 'Tecnico');


ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `id_reparo` (`id_reparo`);

ALTER TABLE `reparo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tecnico` (`tecnico`),
  ADD KEY `usuario` (`usuario`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);


ALTER TABLE `avaliacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

ALTER TABLE `reparo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
