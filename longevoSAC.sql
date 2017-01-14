--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.5
-- Dumped by pg_dump version 9.5.5

-- Started on 2017-01-14 14:38:25 BRST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12399)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 182 (class 1259 OID 16620)
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE orders (
    id_order integer NOT NULL,
    id_user integer,
    cod_order character varying(255) NOT NULL,
    date_order timestamp(0) without time zone NOT NULL
);


ALTER TABLE orders OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16636)
-- Name: orders_id_order_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE orders_id_order_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE orders_id_order_seq OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16612)
-- Name: tickets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tickets (
    id_ticket integer NOT NULL,
    title_ticket character varying(255) NOT NULL,
    desc_ticket character varying(255) NOT NULL,
    date_ticket timestamp(0) without time zone NOT NULL,
    update_date_ticket timestamp(0) without time zone NOT NULL,
    status_ticket boolean NOT NULL,
    cod_order character varying(255) NOT NULL
);


ALTER TABLE tickets OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16634)
-- Name: tickets_id_ticket_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tickets_id_ticket_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tickets_id_ticket_seq OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 16626)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id_user integer NOT NULL,
    name_user character varying(255) NOT NULL,
    email_user character varying(255) NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16638)
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_user_seq OWNER TO postgres;

--
-- TOC entry 2160 (class 0 OID 16620)
-- Dependencies: 182
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY orders (id_order, id_user, cod_order, date_order) FROM stdin;
1	1	555560	2017-01-12 11:07:40
2	2	555561	2017-01-12 11:07:40
3	3	555562	2017-01-12 11:07:40
4	4	555563	2017-01-12 11:07:40
5	5	555564	2017-01-12 11:07:40
6	6	555565	2017-01-12 11:07:40
7	7	555566	2017-01-12 11:07:40
8	8	555567	2017-01-12 11:07:40
9	9	555568	2017-01-12 11:07:40
10	10	555569	2017-01-12 11:07:40
\.


--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 185
-- Name: orders_id_order_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('orders_id_order_seq', 10, true);


--
-- TOC entry 2159 (class 0 OID 16612)
-- Dependencies: 181
-- Data for Name: tickets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tickets (id_ticket, title_ticket, desc_ticket, date_ticket, update_date_ticket, status_ticket, cod_order) FROM stdin;
1	Tive um problema X		2017-01-14 14:23:38	2017-01-14 14:27:23	t	555560
\.


--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 184
-- Name: tickets_id_ticket_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tickets_id_ticket_seq', 1, true);


--
-- TOC entry 2161 (class 0 OID 16626)
-- Dependencies: 183
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id_user, name_user, email_user) FROM stdin;
1	Alberto	alberto@mail.com
2	Tulio	getulio@mail.com
3	Andrade	andrade@mail.com
4	Flavio	flavio@mail.com
5	Wilson	wilson@mail.com
6	Pinheiro	pinheiro@mail.com
7	Claudiomiro	claudiomiro@mail.com
8	Rubens	rubens@mail.com
9	Agnaldo	agnaldo@mail.com
10	Zeno	zeno@mail.com
\.


--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 186
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_user_seq', 10, true);


--
-- TOC entry 2040 (class 2606 OID 16624)
-- Name: orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id_order);


--
-- TOC entry 2038 (class 2606 OID 16619)
-- Name: tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (id_ticket);


--
-- TOC entry 2043 (class 2606 OID 16633)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- TOC entry 2041 (class 1259 OID 16625)
-- Name: uniq_e52ffdee6b3ca4b; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX uniq_e52ffdee6b3ca4b ON orders USING btree (id_user);


--
-- TOC entry 2044 (class 2606 OID 16640)
-- Name: fk_e52ffdee6b3ca4b; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT fk_e52ffdee6b3ca4b FOREIGN KEY (id_user) REFERENCES users(id_user);


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-01-14 14:38:25 BRST

--
-- PostgreSQL database dump complete
--

