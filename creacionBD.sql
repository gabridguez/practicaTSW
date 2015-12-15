CREATE TABLE IF NOT EXISTS categorias (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    username VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    foto VARCHAR(40) default 'default.png',
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS preguntas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT,
    user_id INT UNSIGNED NOT NULL,
    categoria_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) 
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (categoria_id) 
        REFERENCES categorias(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS respuestas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    pregunta_id INT UNSIGNED NOT NULL,
    respuesta TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) 
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,        
    FOREIGN KEY (pregunta_id) 
        REFERENCES preguntas(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS preguntavotos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    pregunta_id INT UNSIGNED NOT NULL,
    voto INT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) 
        REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (pregunta_id) 
        REFERENCES preguntas(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS respuestavotos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    respuesta_id INT UNSIGNED NOT NULL,
    voto INT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) 
        REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (respuesta_id) 
        REFERENCES respuestas(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DELETE FROM preguntavotos;
DELETE FROM respuestavotos;
DELETE FROM respuestas;
DELETE FROM preguntas;
DELETE FROM users;
DELETE FROM categorias;


INSERT INTO categorias (id, name, created)
    VALUES ('1', 'java', NOW()),
     ('2', 'c++', NOW()),
     ('3', 'c#', NOW()),
     ('4', 'php', NOW()),
     ('5', 'html', NOW());

INSERT INTO users (id, name, username, password, role, foto,created)
    VALUES ('1','o Manolo', 'admin@admin.es','admin','admin','defaultIMG_BD', NOW()),
     ('2','o Pepe', 'usuario2@usuario.es','usuario','author','defaultIMG_BD', NOW()),
     ('3','o Marcial', 'usuario3@usuario.es','usuario','author','defaultIMG_BD', NOW()),
     ('4','o José', 'usuario4@usuario.es','usuario','author','defaultIMG_BD', NOW()),
     ('5','Pepe do Cangallo', 'usuario5@usuario.es','usuario','author','defaultIMG_BD', NOW()),
     ('6','o Manolo', 'usuario1@usuario.es','usuario','author','defaultIMG_BD', NOW());

INSERT INTO preguntas (id, title, description, pregunta_id_user,pregunta_id_categoria, created)
    VALUES ('1', 'Pregunta Prueba numero 1', 'no entiendo nada, alguien me puede explicar como funciona html?', '1','5', NOW()),
    ('2', 'Pregunta Prueba numero 2', 'no entiendo nada, alguien me puede explicar como funciona php?', '2','4', NOW()),
    ('3', 'Pregunta Prueba numero 3', 'no entiendo nada, alguien me puede explicar como funciona java?', '3','1', NOW()),
    ('4', 'Pregunta Prueba numero 4', 'no entiendo nada, alguien me puede explicar como funciona c#?', '4','3', NOW()),
    ('5', 'Pregunta Prueba numero 5', 'no entiendo nada, alguien me puede explicar como funciona c++?', '5','2', NOW()),
    ('6', 'Pregunta Prueba numero 6', 'no entiendo nada, alguien me puede explicar como funciona php?', '1','4', NOW()),
    ('7', 'Pregunta Prueba numero 7', 'no entiendo nada, alguien me puede explicar como funciona php?', '2','4', NOW()),
    ('8', 'Pregunta Prueba numero 8', 'no entiendo nada, alguien me puede explicar como funciona php?', '3','4', NOW());

INSERT INTO respuestas (id, respuesta_id_user, respuesta_id_pregunta, respuesta, created)
    VALUES ('1', '1','1', 'deberias buscar informacion en la categoria html',  NOW()),
    ('2', '2','2', 'deberias buscar informacion en la categoria php',  NOW()),
    ('3', '3','3', 'deberias buscar informacion en la categoria java',  NOW()),
    ('4', '4','4', 'deberias buscar informacion en la categoria c#',  NOW()),
    ('5', '5','5', 'deberias buscar informacion en la categoria c++',  NOW()),
    ('6', '4','6', 'deberias buscar informacion en la categoria php',  NOW()),
    ('7', '3','7', 'deberias buscar informacion en la categoria php',  NOW()),
    ('8', '2','8', 'deberias buscar informacion en la categoria php',  NOW());

INSERT INTO preguntavotos(id,voto_id_user,voto_id_pregunta,voto, created)
	VALUES ('1','1','2','1',  NOW()),
	('2','2','2','0',  NOW()),
	('3','2','4','1',  NOW()),
	('4','1','4','1',  NOW()),
	('5','1','3','1',  NOW());

INSERT INTO respuestavotos(id,voto_id_user,voto_id_respuesta,voto, created)
    VALUES ('1','1','2','1',  NOW()),
    ('2','2','2','0',  NOW()),
    ('3','2','4','1',  NOW()),
    ('4','1','4','1',  NOW()),
    ('5','1','3','1',  NOW());