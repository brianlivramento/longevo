/* Database name: longevoSAC */

CREATE TABLE users (
    id_user integer NOT NULL,
    name_user character varying(255) NOT NULL,
    email_user character varying(255) NOT NULL
);

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);

CREATE TABLE orders (
    id_order integer NOT NULL,
    id_user integer,
    cod_order character varying(255) NOT NULL,
    date_order timestamp(0) without time zone NOT NULL
);

ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id_order);

ALTER TABLE ONLY orders
    ADD CONSTRAINT fk_e52ffdee6b3ca4b FOREIGN KEY (id_user) REFERENCES users(id_user);


CREATE TABLE tickets (
    id_ticket integer NOT NULL,
    title_ticket character varying(255) NOT NULL,
    desc_ticket character varying(255) NOT NULL,
    date_ticket timestamp(0) without time zone NOT NULL,
    update_date_ticket timestamp(0) without time zone NOT NULL,
    status_ticket boolean NOT NULL,
    cod_order character varying(255) NOT NULL
);

ALTER TABLE ONLY tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (id_ticket);

INSERT INTO  users (id_user, name_user, email_user) VALUES
(1,	'Alberto',	'alberto@mail.com'),
(2,	'Tulio',	'getulio@mail.com'),
(3,	'Andrade',	'andrade@mail.com'),
(4,	'Flavio',	'flavio@mail.com'),
(5,	'Wilson',	'wilson@mail.com'),
(6,	'Pinheiro',	'pinheiro@mail.com'),
(7,	'Claudiomiro',	'claudiomiro@mail.com'),
(8,	'Rubens',	'rubens@mail.com'),
(9,	'Agnaldo',	'agnaldo@mail.com'),
(10,'Zeno',	'zeno@mail.com');

INSERT INTO orders (id_order, id_user, cod_order, date_order) VALUES
(1,	1,	'555560',	'2017-01-12 11:07:40'),
(2,	2,	'555561',	'2017-01-12 11:07:40'),
(3,	3,	'555562',	'2017-01-12 11:07:40'),
(4,	4,	'555563',	'2017-01-12 11:07:40'),
(5,	5,	'555564',	'2017-01-12 11:07:40'),
(6,	6,	'555565',	'2017-01-12 11:07:40'),
(7,	7,	'555566',	'2017-01-12 11:07:40'),
(8,	8,	'555567',	'2017-01-12 11:07:40'),
(9,	9,	'555568',	'2017-01-12 11:07:40'),
(10,   10,      '555569',	'2017-01-12 11:07:40');

INSERT INTO  tickets (id_ticket, title_ticket, desc_ticket, date_ticket, update_date_ticket, status_ticket, cod_order) VALUES
(1,	'Tive um problema X',  '',		'2017-01-12 14:23:38',	'2017-01-12 14:27:23',	'f',	'555560'),
(2,	'Tive um problema X',  '',		'2017-01-12 14:23:38',	'2017-01-12 14:27:23',	'f',	'555561'),
(3,	'Tive um problema X',  '',		'2017-01-12 14:23:38',	'2017-01-12 14:27:23',	'f',	'555562'),
(4,	'Tive um problema X',  '',		'2017-01-12 14:23:38',	'2017-01-12 14:27:23',	'f',	'555563');