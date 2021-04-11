SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema restaurante
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema restaurante
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET utf8 ;
USE `restaurante` ;
-- DROP SCHEMA restaurante;

-- -----------------------------------------------------
-- Table `restaurante`.`cozinha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`cozinha` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `abertura` TIME(1) NOT NULL,
  `fechamento` TIME(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`ingrediente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `validade` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cozinha` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `salario` DECIMAL(8,2) NOT NULL,
  `funcao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `cozinha`),
  INDEX `fk_funcionario_cozinha1_idx` (`cozinha` ASC) VISIBLE,
  CONSTRAINT `fk_funcionario_cozinha1`
    FOREIGN KEY (`cozinha`)
    REFERENCES `restaurante`.`cozinha` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`cozinha_has_ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`cozinha_has_ingrediente` (
  `cozinha_id` INT NOT NULL,
  `ingrediente_id` INT NOT NULL,
  PRIMARY KEY (`cozinha_id`, `ingrediente_id`),
  INDEX `fk_cozinha_has_ingrediente_ingrediente1_idx` (`ingrediente_id` ASC) VISIBLE,
  INDEX `fk_cozinha_has_ingrediente_cozinha_idx` (`cozinha_id` ASC) VISIBLE,
  CONSTRAINT `fk_cozinha_has_ingrediente_cozinha`
    FOREIGN KEY (`cozinha_id`)
    REFERENCES `restaurante`.`cozinha` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cozinha_has_ingrediente_ingrediente1`
    FOREIGN KEY (`ingrediente_id`)
    REFERENCES `restaurante`.`ingrediente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


select * from funcionario;
insert into cozinha(nome, abertura, fechamento) 
values("Mineira", NOW(), NOW());
insert into cozinha(nome, abertura, fechamento) 
values("Chinesa", NOW(), NOW());
insert into cozinha(nome, abertura, fechamento) 
values("italiana", NOW(), NOW());
insert into cozinha(nome, abertura, fechamento) 
values("Mineira2", NOW(), NOW());

-- insere funcionario na cozinha 1(mineira)
insert into funcionario(nome, funcao, salario, cozinha) values("Felipe", "Atendente", 2000,1);
-- insere funcionario na cozinha 2(chinesa)
insert into funcionario(nome, funcao, salario, cozinha) values("Joao", "Atendente", 2200, 2);
-- insere funcionario na cozinha 3(italiana)
insert into funcionario(nome, funcao, salario, cozinha) values("natanael", "Gerente", 2900.9, 3);

insert into ingrediente(nome, validade) values("Feijao", date(now()));
insert into ingrediente(nome, validade) values("Arroz", date(now()));
insert into ingrediente(nome, validade) values("Carne de porco", date(now()));

-- Insere feijao na cozinha mineira
insert into cozinha_has_ingrediente values(1,1);
-- Insere arroz na cozinha italiana
insert into cozinha_has_ingrediente values(2,3);
-- Insere carne de porco na cozinha chinesa
insert into cozinha_has_ingrediente values(3,2);

-- lista todas as cozinhas(inclusive sem ingredientes) e seus ingredientes
SELECT c.nome as NomeCozinha, i.nome as NomeIngrediente
FROM cozinha c LEFT JOIN cozinha_has_ingrediente ci ON c.id = ci.cozinha_id LEFT JOIN ingrediente i ON i.id = ci.ingrediente_id;

SELECT COUNT(*) FROM cozinha;
SELECT * FROM cozinha WHERE DATEDIFF(fechamento, NOW()); 
SELECT * from ingrediente WHERE validade < NOW();



