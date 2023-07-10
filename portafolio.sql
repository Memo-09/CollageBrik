/*
 Navicat Premium Data Transfer

 Source Server         : CONEXION2
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : portafolio

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 11/07/2022 23:13:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for infromacion_usuario
-- ----------------------------
DROP TABLE IF EXISTS `infromacion_usuario`;
CREATE TABLE `infromacion_usuario`  (
  `ID_INFORMACION_PORTAFOLIO` int NOT NULL AUTO_INCREMENT,
  `INFORMACION_PERSONAL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `HABILIDADES_PERSONAL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TRABAJO_PERSONAL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MATRICULA_PORTAFOLIO_REGISTRO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_INFORMACION_PORTAFOLIO`) USING BTREE,
  INDEX `REG_INF`(`MATRICULA_PORTAFOLIO_REGISTRO`) USING BTREE,
  CONSTRAINT `REG_INF` FOREIGN KEY (`MATRICULA_PORTAFOLIO_REGISTRO`) REFERENCES `registro_portafolio` (`MATRICULA_PORTAFOLIO_REGISTRO`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of infromacion_usuario
-- ----------------------------
INSERT INTO `infromacion_usuario` VALUES (27, 'Aqui es donde Podras Registar tu informacion de ti mismo, lo que te gustaria escribir de ti', 'Esta es tu seccion de Habilidades aqui es donde podras escribir cuales son tus cualidades', 'Esta es tu seccion Laboral, aqui podras escribir donde has trabajado y cuantos años', '124563');
INSERT INTO `infromacion_usuario` VALUES (28, 'Aqui es donde Podras Registar tu informacion de ti mismo, lo que te gustaria escribir de ti', 'Esta es tu seccion de Habilidades aqui es donde podras escribir cuales son tus cualidades', 'Esta es tu seccion Laboral, aqui podras escribir donde has trabajado y cuantos años', '6789345');
INSERT INTO `infromacion_usuario` VALUES (29, 'Aqui es donde Podras Registar tu informacion de ti mismo, lo que te gustaria escribir de ti', 'Esta es tu seccion de Habilidades aqui es donde podras escribir cuales son tus cualidades', 'Esta es tu seccion Laboral, aqui podras escribir donde has trabajado y cuantos años', '201923214');

-- ----------------------------
-- Table structure for proyectos_portafolio
-- ----------------------------
DROP TABLE IF EXISTS `proyectos_portafolio`;
CREATE TABLE `proyectos_portafolio`  (
  `ID_PROYECTOS_PORTAFOLIO` int NOT NULL AUTO_INCREMENT,
  `LINK_PROYECTO_PORTAFOLIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NOMBRE_PROYECTO_PORTAFOLIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DESCRIPICION_PROYECTO_PROTAFOLIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MATRICULA_PORTAFOLIO_REGISTRO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_PROYECTOS_PORTAFOLIO`) USING BTREE,
  INDEX `PROY_REG`(`MATRICULA_PORTAFOLIO_REGISTRO`) USING BTREE,
  CONSTRAINT `PROY_REG` FOREIGN KEY (`MATRICULA_PORTAFOLIO_REGISTRO`) REFERENCES `registro_portafolio` (`MATRICULA_PORTAFOLIO_REGISTRO`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proyectos_portafolio
-- ----------------------------
INSERT INTO `proyectos_portafolio` VALUES (19, 'https://github.com/DonVoid18/R-calculadora', 'Hola Mundo', 'Mi primer Proyecto en Java', '201923214');

-- ----------------------------
-- Table structure for registro_portafolio
-- ----------------------------
DROP TABLE IF EXISTS `registro_portafolio`;
CREATE TABLE `registro_portafolio`  (
  `ID_PORTAFOLIO_REGISTRO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_PORTAFOLIO_REGISTRO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APELLIDOS_PORTAFOLIO_REGISTRO` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MATRICULA_PORTAFOLIO_REGISTRO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CORREO_PORTAFOLIO_REGISTRO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CONTRASEÑA_PORTAFOLIO_REGISTRO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_ROL_PORTAFOLIO_REGISTRO` int NOT NULL,
  `STATUS_PROYECTO_PORTAFOLIO` bit(1) NOT NULL DEFAULT b'1',
  `IMAGEN_USUARIO_PORTAFOLIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `IMAGEN_FONDO_USUARIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_PORTAFOLIO_REGISTRO`) USING BTREE,
  UNIQUE INDEX `CORREO_UNICO`(`CORREO_PORTAFOLIO_REGISTRO`) USING BTREE,
  UNIQUE INDEX `CONTRASEÑA_UNICA`(`CONTRASEÑA_PORTAFOLIO_REGISTRO`) USING BTREE,
  UNIQUE INDEX `MATRICULA_UNICA`(`MATRICULA_PORTAFOLIO_REGISTRO`) USING BTREE,
  INDEX `MATRICULA_PORTAFOLIO_REGISTRO`(`MATRICULA_PORTAFOLIO_REGISTRO`) USING BTREE,
  INDEX `ROL_REGISTRO`(`ID_ROL_PORTAFOLIO_REGISTRO`) USING BTREE,
  CONSTRAINT `ROL_REGISTRO` FOREIGN KEY (`ID_ROL_PORTAFOLIO_REGISTRO`) REFERENCES `roles_escolares_portafolio` (`ID_ROL_PORTAFOLIO`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of registro_portafolio
-- ----------------------------
INSERT INTO `registro_portafolio` VALUES (1, 'Guillermo', 'Reyes', '201923210', 'guillermoreyesdid@gmail.com', '5550606487g', 4, b'1', 'assets/0131_005_es-es.jpg', 'assets/img4.jpg');
INSERT INTO `registro_portafolio` VALUES (2, 'Angel', 'Nieto', '201923107', 'angelito69@gmail.com', '555', 4, b'1', 'assets/the-ancient-magus-bride-anime.jpg', 'assets/img4.jpg');
INSERT INTO `registro_portafolio` VALUES (3, 'Daniel Gracia', 'Chimal', '201923328', 'danny.chiga@gmail.com', 'zelda', 4, b'1', 'assets/Vlcsnap-2018-07-11-08h25m04s365.png', 'assets/img4.jpg');
INSERT INTO `registro_portafolio` VALUES (52, 'Gabriel ', 'Leonardo', '124563', 'gabo@gmail.com', 'gabo', 1, b'1', 'assets/usuario.png', 'assets/img4.jpg');
INSERT INTO `registro_portafolio` VALUES (53, 'Manuel', 'Alcantara Ruiz', '6789345', 'manuelal@gmail.com', 'manuel', 2, b'1', 'assets/usuario.png', 'assets/img4.jpg');
INSERT INTO `registro_portafolio` VALUES (54, 'Ismael Alcantara', 'Bueno', '201923214', 'isma@gmail.com', '1234', 1, b'1', 'assets/GAtitosProtada.webp', 'assets/gatitosperfil.jpg');

-- ----------------------------
-- Table structure for roles_escolares_portafolio
-- ----------------------------
DROP TABLE IF EXISTS `roles_escolares_portafolio`;
CREATE TABLE `roles_escolares_portafolio`  (
  `ID_ROL_PORTAFOLIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL_PORTAFOLIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_ROL_PORTAFOLIO`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles_escolares_portafolio
-- ----------------------------
INSERT INTO `roles_escolares_portafolio` VALUES (1, 'ESTUDIANTE');
INSERT INTO `roles_escolares_portafolio` VALUES (2, 'PROFESOR');
INSERT INTO `roles_escolares_portafolio` VALUES (3, 'JEFE DE DIVICION');
INSERT INTO `roles_escolares_portafolio` VALUES (4, 'ADMINISTRADOR');
INSERT INTO `roles_escolares_portafolio` VALUES (5, 'SUPERVISOR');

-- ----------------------------
-- Procedure structure for Acceder
-- ----------------------------
DROP PROCEDURE IF EXISTS `Acceder`;
delimiter ;;
CREATE PROCEDURE `Acceder`(p_correo VARCHAR (255),
	p_contrasenia VARCHAR (20))
BEGIN 
	SELECT
	registro_portafolio.ID_PORTAFOLIO_REGISTRO, 
	registro_portafolio.NOMBRE_PORTAFOLIO_REGISTRO, 
	registro_portafolio.APELLIDOS_PORTAFOLIO_REGISTRO, 
	registro_portafolio.MATRICULA_PORTAFOLIO_REGISTRO, 
	registro_portafolio.CORREO_PORTAFOLIO_REGISTRO, 
	registro_portafolio.`CONTRASEÑA_PORTAFOLIO_REGISTRO`, 
	registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO, 
	roles_escolares_portafolio.NOMBRE_ROL_PORTAFOLIO,
	registro_portafolio.IMAGEN_USUARIO_PORTAFOLIO
FROM
	registro_portafolio
	INNER JOIN
	roles_escolares_portafolio
	ON 
		registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO = roles_escolares_portafolio.ID_ROL_PORTAFOLIO
	WHERE CORREO_PORTAFOLIO_REGISTRO=p_correo AND CONTRASEÑA_PORTAFOLIO_REGISTRO=p_contrasenia;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actcontr
-- ----------------------------
DROP PROCEDURE IF EXISTS `actcontr`;
delimiter ;;
CREATE PROCEDURE `actcontr`(p_correo VARCHAR (255),
nueva_pswr VARCHAR (20))
BEGIN
	IF EXISTS (SELECT CORREO_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO = p_correo) THEN
	UPDATE registro_portafolio SET CONTRASEÑA_PORTAFOLIO_REGISTRO = nueva_pswr WHERE CORREO_PORTAFOLIO_REGISTRO =  p_correo;
	ELSE
	SELECT 'El registro no existe';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizarRegistro
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizarRegistro`;
delimiter ;;
CREATE PROCEDURE `actualizarRegistro`(p_nombre VARCHAR (255),
	p_apellidos VARCHAR (100),
	p_matricula varchar(20),
	p_correo VARCHAR (255),
	p_idrol int (11))
BEGIN
UPDATE registro_portafolio SET
	NOMBRE_PORTAFOLIO_REGISTRO = p_nombre,
	APELLIDOS_PORTAFOLIO_REGISTRO = p_apellidos,
	CORREO_PORTAFOLIO_REGISTRO = p_correo,
	ID_ROL_PORTAFOLIO_REGISTRO = p_idrol
WHERE MATRICULA_PORTAFOLIO_REGISTRO = p_matricula;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Agregar_Proyectos
-- ----------------------------
DROP PROCEDURE IF EXISTS `Agregar_Proyectos`;
delimiter ;;
CREATE PROCEDURE `Agregar_Proyectos`(P_LINK_PROYECTO_PORTAFOLIO varchar(255),
	P_NOMBRE_PROYECTO_PORTAFOLIO varchar(255),
	P_DESCRIPICION_PROYECTO_PROTAFOLIO varchar(255),
	P_MATRICULA_PORTAFOLIO_REGISTRO varchar(20))
BEGIN
	IF EXISTS(SELECT * FROM proyectos_portafolio WHERE NOMBRE_PROYECTO_PORTAFOLIO=P_NOMBRE_PROYECTO_PORTAFOLIO AND MATRICULA_PORTAFOLIO_REGISTRO=P_MATRICULA_PORTAFOLIO_REGISTRO) THEN
		SELECT 'ESTE PROYECTO YA EXISTE' AS mensaje1;
	ELSE
		INSERT proyectos_portafolio VALUES(DEFAULT,P_LINK_PROYECTO_PORTAFOLIO,P_NOMBRE_PROYECTO_PORTAFOLIO,P_DESCRIPICION_PROYECTO_PROTAFOLIO,P_MATRICULA_PORTAFOLIO_REGISTRO);
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Editar_Informacion
-- ----------------------------
DROP PROCEDURE IF EXISTS `Editar_Informacion`;
delimiter ;;
CREATE PROCEDURE `Editar_Informacion`(P_INFORMACION_PERSONAL varchar(255),
	P_HABILIDADES_PERSONAL varchar(255),
	P_TRABAJO_PERSONAL varchar(255),
	P_MATRICULA_PORTAFOLIO_REGISTRO varchar(20))
BEGIN
	UPDATE infromacion_usuario SET INFORMACION_PERSONAL=P_INFORMACION_PERSONAL,HABILIDADES_PERSONAL=P_HABILIDADES_PERSONAL,TRABAJO_PERSONAL=P_TRABAJO_PERSONAL WHERE MATRICULA_PORTAFOLIO_REGISTRO=P_MATRICULA_PORTAFOLIO_REGISTRO;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Insertar_Registros
-- ----------------------------
DROP PROCEDURE IF EXISTS `Insertar_Registros`;
delimiter ;;
CREATE PROCEDURE `Insertar_Registros`(P_NOMBRE_PORTAFOLIO_REGISTRO VARCHAR(255),
	P_APELLIDOS_PORTAFOLIO_REGISTRO VARCHAR(100),
	P_MATRICULA_PORTAFOLIO_REGISTRO VARCHAR(20),
	P_CORREO_PORTAFOLIO_REGISTRO VARCHAR(255),
	P_CONTRASEÑA_PORTAFOLIO_REGISTRO VARCHAR(20),
	P_ID_ROL_PORTAFOLIO_REGISTRO INT)
BEGIN
	INSERT registro_portafolio VALUES(
	DEFAULT,
	P_NOMBRE_PORTAFOLIO_REGISTRO,
	P_APELLIDOS_PORTAFOLIO_REGISTRO,
	P_MATRICULA_PORTAFOLIO_REGISTRO,
	P_CORREO_PORTAFOLIO_REGISTRO,
	P_CONTRASEÑA_PORTAFOLIO_REGISTRO,
	P_ID_ROL_PORTAFOLIO_REGISTRO,1,'assets/usuario.png','assets/img4.jpg');
	
	INSERT infromacion_usuario VALUES(DEFAULT,'Aqui es donde Podras Registar tu informacion de ti mismo, lo que te gustaria escribir de ti','Esta es tu seccion de Habilidades aqui es donde podras escribir cuales son tus cualidades','Esta es tu seccion Laboral, aqui podras escribir donde has trabajado y cuantos años',P_MATRICULA_PORTAFOLIO_REGISTRO);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for llenarformregistros
-- ----------------------------
DROP PROCEDURE IF EXISTS `llenarformregistros`;
delimiter ;;
CREATE PROCEDURE `llenarformregistros`(p_matricula VARCHAR (20))
BEGIN
SELECT 
	registro_portafolio.NOMBRE_PORTAFOLIO_REGISTRO, 
	registro_portafolio.APELLIDOS_PORTAFOLIO_REGISTRO, 
	registro_portafolio.MATRICULA_PORTAFOLIO_REGISTRO, 
	registro_portafolio.CORREO_PORTAFOLIO_REGISTRO, 
	registro_portafolio.`CONTRASEÑA_PORTAFOLIO_REGISTRO`, 
	registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO, 
	roles_escolares_portafolio.NOMBRE_ROL_PORTAFOLIO
FROM
	registro_portafolio
	INNER JOIN
	roles_escolares_portafolio
	ON 
		registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO = roles_escolares_portafolio.ID_ROL_PORTAFOLIO
		WHERE MATRICULA_PORTAFOLIO_REGISTRO = p_matricula;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostrar_Administrado
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostrar_Administrado`;
delimiter ;;
CREATE PROCEDURE `Mostrar_Administrado`()
BEGIN
	SELECT
	registro_portafolio.NOMBRE_PORTAFOLIO_REGISTRO, 
	registro_portafolio.APELLIDOS_PORTAFOLIO_REGISTRO, 
	registro_portafolio.MATRICULA_PORTAFOLIO_REGISTRO
FROM
	registro_portafolio 
	
WHERE ID_ROL_PORTAFOLIO_REGISTRO=4 OR ID_ROL_PORTAFOLIO_REGISTRO=5;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostrar_Alumnos
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostrar_Alumnos`;
delimiter ;;
CREATE PROCEDURE `Mostrar_Alumnos`()
BEGIN 
	SELECT NOMBRE_PORTAFOLIO_REGISTRO, APELLIDOS_PORTAFOLIO_REGISTRO, MATRICULA_PORTAFOLIO_REGISTRO,CORREO_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE ID_ROL_PORTAFOLIO_REGISTRO=1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostrar_Profesores
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostrar_Profesores`;
delimiter ;;
CREATE PROCEDURE `Mostrar_Profesores`()
BEGIN 
	SELECT NOMBRE_PORTAFOLIO_REGISTRO, APELLIDOS_PORTAFOLIO_REGISTRO, MATRICULA_PORTAFOLIO_REGISTRO,CORREO_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE ID_ROL_PORTAFOLIO_REGISTRO <=3 AND ID_ROL_PORTAFOLIO_REGISTRO >1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostrar_Roles_Administrado
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostrar_Roles_Administrado`;
delimiter ;;
CREATE PROCEDURE `Mostrar_Roles_Administrado`()
BEGIN 
	SELECT * FROM roles_escolares_portafolio WHERE ID_ROL_PORTAFOLIO > 3;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostrar_Roles_Profesor
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostrar_Roles_Profesor`;
delimiter ;;
CREATE PROCEDURE `Mostrar_Roles_Profesor`()
BEGIN 
	SELECT * FROM roles_escolares_portafolio WHERE ID_ROL_PORTAFOLIO <=3 AND ID_ROL_PORTAFOLIO >1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Mostra_Mensaje
-- ----------------------------
DROP PROCEDURE IF EXISTS `Mostra_Mensaje`;
delimiter ;;
CREATE PROCEDURE `Mostra_Mensaje`()
BEGIN
SELECT 'ESTE PROYECTO YA EXISTE' AS mensaje1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Seleccionar_Usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `Seleccionar_Usuario`;
delimiter ;;
CREATE PROCEDURE `Seleccionar_Usuario`(P_MATRICULA_PORTAFOLIO_REGISTRO varchar(20))
BEGIN
	SELECT
	registro_portafolio.NOMBRE_PORTAFOLIO_REGISTRO, 
	registro_portafolio.APELLIDOS_PORTAFOLIO_REGISTRO, 
	registro_portafolio.MATRICULA_PORTAFOLIO_REGISTRO, 
	registro_portafolio.CORREO_PORTAFOLIO_REGISTRO, 
	registro_portafolio.`CONTRASEÑA_PORTAFOLIO_REGISTRO`, 
	roles_escolares_portafolio.ID_ROL_PORTAFOLIO,
	roles_escolares_portafolio.NOMBRE_ROL_PORTAFOLIO
FROM
	registro_portafolio
	INNER JOIN
	roles_escolares_portafolio
	ON 
		registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO = roles_escolares_portafolio.ID_ROL_PORTAFOLIO WHERE MATRICULA_PORTAFOLIO_REGISTRO=P_MATRICULA_PORTAFOLIO_REGISTRO;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Texto_Default
-- ----------------------------
DROP PROCEDURE IF EXISTS `Texto_Default`;
delimiter ;;
CREATE PROCEDURE `Texto_Default`(P_MATRICULA_PORTAFOLIO_REGISTRO varchar(20))
BEGIN
	INSERT infromacion_usuario VALUES(DEFAULT,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima odio quod tempora eum nemo nesciunt molestiae. Necessitatibus, recusandae itaque sunt accusamus omnis sint accusantium voluptates cumque, dicta, ipsam quia quam?(Texto de Inicio)','Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima odio quod tempora eum nemo nesciunt molestiae. Necessitatibus, recusandae itaque sunt accusamus omnis sint accusantium voluptates cumque, dicta, ipsam quia quam?(Texto de Inicio)','Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima odio quod tempora eum nemo nesciunt molestiae. Necessitatibus, recusandae itaque sunt accusamus omnis sint accusantium voluptates cumque, dicta, ipsam quia quam?(Texto de Inicio)',P_MATRICULA_PORTAFOLIO_REGISTRO);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for validacionUsr
-- ----------------------------
DROP PROCEDURE IF EXISTS `validacionUsr`;
delimiter ;;
CREATE PROCEDURE `validacionUsr`(p_correo VARCHAR (255),
p_contrasenia VARCHAR (20))
BEGIN
	IF EXISTS (SELECT CORREO_PORTAFOLIO_REGISTRO, CONTRASEÑA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO = p_correo AND  CONTRASEÑA_PORTAFOLIO_REGISTRO = p_contrasenia)
	THEN
		SELECT CORREO_PORTAFOLIO_REGISTRO, CONTRASEÑA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO = p_correo AND  CONTRASEÑA_PORTAFOLIO_REGISTRO = p_contrasenia;
	ELSE
	SELECT "noexist";
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for verroles
-- ----------------------------
DROP PROCEDURE IF EXISTS `verroles`;
delimiter ;;
CREATE PROCEDURE `verroles`()
BEGIN
	SELECT * from roles_escolares_portafolio;
	END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for ver_registros
-- ----------------------------
DROP PROCEDURE IF EXISTS `ver_registros`;
delimiter ;;
CREATE PROCEDURE `ver_registros`()
BEGIN
SELECT
	registro_portafolio.NOMBRE_PORTAFOLIO_REGISTRO, 
	registro_portafolio.APELLIDOS_PORTAFOLIO_REGISTRO, 
	registro_portafolio.MATRICULA_PORTAFOLIO_REGISTRO, 
	registro_portafolio.CORREO_PORTAFOLIO_REGISTRO, 
	registro_portafolio.`CONTRASEÑA_PORTAFOLIO_REGISTRO`, 
	roles_escolares_portafolio.NOMBRE_ROL_PORTAFOLIO
FROM
	registro_portafolio
	INNER JOIN
	roles_escolares_portafolio
	ON 
		registro_portafolio.ID_ROL_PORTAFOLIO_REGISTRO = roles_escolares_portafolio.ID_ROL_PORTAFOLIO;
	END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
