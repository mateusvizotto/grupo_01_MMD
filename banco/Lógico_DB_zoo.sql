/* Lógico_DB_zoo: */

CREATE TABLE zoologico (
    id INTEGER PRIMARY KEY,
    nome VARCHAR,
    endereco VARCHAR,
    fk_animais_idAnimal INTEGER
);

CREATE TABLE funcionarios (
    email VARCHAR,
    nome VARCHAR,
    cpf INTEGER PRIMARY KEY,
    fk_zoologico_id INTEGER
);

CREATE TABLE jaula (
    numeroJaula INTEGER PRIMARY KEY,
    fk_animais_idAnimal INTEGER
);

CREATE TABLE animais (
    idade INTEGER,
    peso FLOAT,
    idAnimal INTEGER PRIMARY KEY,
    nome VARCHAR,
    sexo VARCHAR,
    paisOrigem VARCHAR,
    estadoOrigem VARCHAR
);

CREATE TABLE alimentos (
    nome VARCHAR,
    idAlimento INTEGER PRIMARY KEY
);

CREATE TABLE consumo_alimento (
    fk_animais_idAnimal INTEGER,
    fk_alimento_idAlimento INTEGER
);
 
ALTER TABLE zoologico ADD CONSTRAINT FK_zoologico_2
    FOREIGN KEY (fk_animais_idAnimal)
    REFERENCES animais (idAnimal)
    ON DELETE CASCADE;
 
ALTER TABLE funcionarios ADD CONSTRAINT FK_funcionarios_2
    FOREIGN KEY (fk_zoologico_id???)
    REFERENCES ??? (???);
 
ALTER TABLE jaula ADD CONSTRAINT FK_jaula_2
    FOREIGN KEY (fk_animais_idAnimal)
    REFERENCES animais (idAnimal)
    ON DELETE RESTRICT;
 
ALTER TABLE consumo_alimento ADD CONSTRAINT FK_consumo_alimento_1
    FOREIGN KEY (fk_animais_idAnimal, fk_animais_origem_idOrigem???)
    REFERENCES animais (idAnimal, ???)
    ON DELETE RESTRICT;
 
ALTER TABLE consumo_alimento ADD CONSTRAINT FK_consumo_alimento_2
    FOREIGN KEY (fk_alimento_idAlimento???)
    REFERENCES ??? (???);