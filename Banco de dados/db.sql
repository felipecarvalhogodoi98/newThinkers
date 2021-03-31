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
  `tipo` VARCHAR(45) NOT NULL,
  `horaAbertura` DATETIME NOT NULL,
  `horaFechamento` DATETIME NOT NULL,
  `pratoPrincipal` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cozinha` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `atividade` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcionario_cozinha_idx` (`cozinha` ASC) VISIBLE,
  CONSTRAINT `fk_funcionario_cozinha`
    FOREIGN KEY (`cozinha`)
    REFERENCES `mydb`.`cozinha` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`ingredientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`ingredientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `validade` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restaurante`.`cozinha_ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurante`.`cozinha_ingrediente` (
  `ingredientes` INT NOT NULL,
  `cozinha` INT NOT NULL,
  PRIMARY KEY (`ingredientes`, `cozinha`),
  INDEX `fk_ingredientes_has_cozinha_cozinha1_idx` (`cozinha` ASC) VISIBLE,
  INDEX `fk_ingredientes_has_cozinha_ingredientes1_idx` (`ingredientes` ASC) VISIBLE,
  CONSTRAINT `fk_ingredientes_has_cozinha_ingredientes1`
    FOREIGN KEY (`ingredientes`)
    REFERENCES `mydb`.`ingredientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredientes_has_cozinha_cozinha1`
    FOREIGN KEY (`cozinha`)
    REFERENCES `mydb`.`cozinha` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

select * from cozinha;
insert into cozinha(tipo, horaAbertura, horaFechamento, pratoPrincipal) 
values("Mineira", NOW(), NOW(), "Feijoada");
insert into cozinha(tipo, horaAbertura, horaFechamento, pratoPrincipal) 
values("Chinesa", NOW(), NOW(), "Yakissoba");
insert into cozinha(tipo, horaAbertura, horaFechamento, pratoPrincipal) 
values("italiana", NOW(), NOW(), "Pizza");

-- insere funcionario na cozinha 1(mineira)
insert into funcionario(nome, atividade, cozinha) values("Felipe", "Atendente", 1);
-- insere funcionario na cozinha 2(chinesa)
insert into funcionario(nome, atividade, cozinha) values("Joao", "Atendente", 2);
-- insere funcionario na cozinha 3(italiana)
insert into funcionario(nome, atividade, cozinha) values("natanael", "Gerente", 3);

insert into ingredientes(nome, validade) values("Feijao", date(now()));
insert into ingredientes(nome, validade) values("Arroz", date(now()));
insert into ingredientes(nome, validade) values("Carne de porco", date(now()));

-- Insere feijao na cozinha mineira
insert into cozinha_ingrediente values(1,1);
-- Insere arroz na cozinha italiana
insert into cozinha_ingrediente values(2,3);
-- Insere carne de porco na cozinha chinesa
insert into cozinha_ingrediente values(3,2);

-- lista as cozinhas e seus ingredientes
SELECT c.tipo as NomeCozinha, i.nome as NomeIngrediente
FROM cozinha c JOIN cozinha_ingrediente ci ON c.id = ci.cozinha JOIN ingredientes i ON i.id = ci.ingredientes;






