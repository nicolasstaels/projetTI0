--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-05-03 15:32:39

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 210 (class 1255 OID 24913)
-- Name: is_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_admin from admin where login=f_login and password=f_password;
	if not found
	then 
		retour = 0;
	else
		retour = 1;
	end if;
	return retour;
end;
';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 209 (class 1259 OID 24889)
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login character varying NOT NULL,
    password character varying NOT NULL
);


--
-- TOC entry 208 (class 1259 OID 24887)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3045 (class 0 OID 0)
-- Dependencies: 208
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 205 (class 1259 OID 24866)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    nom_cat character varying NOT NULL,
    image text,
    description_cat text
);


--
-- TOC entry 204 (class 1259 OID 24864)
-- Name: categorie_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_id_cat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3046 (class 0 OID 0)
-- Dependencies: 204
-- Name: categorie_id_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_id_cat_seq OWNED BY public.categorie.id_cat;


--
-- TOC entry 201 (class 1259 OID 24845)
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    id_client integer NOT NULL,
    nom character varying NOT NULL,
    prenom character varying NOT NULL,
    mail character varying NOT NULL,
    tel character varying NOT NULL,
    password character varying NOT NULL
);


--
-- TOC entry 200 (class 1259 OID 24843)
-- Name: client_id_client_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.client_id_client_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3047 (class 0 OID 0)
-- Dependencies: 200
-- Name: client_id_client_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.client_id_client_seq OWNED BY public.client.id_client;


--
-- TOC entry 203 (class 1259 OID 24856)
-- Name: commande; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.commande (
    id_com integer NOT NULL,
    prix real NOT NULL,
    quantite integer NOT NULL,
    id_client integer NOT NULL,
    id_produit integer NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 24854)
-- Name: commande_id_com_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.commande_id_com_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3048 (class 0 OID 0)
-- Dependencies: 202
-- Name: commande_id_com_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.commande_id_com_seq OWNED BY public.commande.id_com;


--
-- TOC entry 207 (class 1259 OID 24877)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    nom_produit character varying NOT NULL,
    photo character varying NOT NULL,
    prix real NOT NULL,
    stock integer NOT NULL,
    description character varying NOT NULL,
    id_cat integer NOT NULL
);


--
-- TOC entry 206 (class 1259 OID 24875)
-- Name: produit_id_produit_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_id_produit_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3049 (class 0 OID 0)
-- Dependencies: 206
-- Name: produit_id_produit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;


--
-- TOC entry 2883 (class 2604 OID 24892)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 2881 (class 2604 OID 24869)
-- Name: categorie id_cat; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id_cat SET DEFAULT nextval('public.categorie_id_cat_seq'::regclass);


--
-- TOC entry 2879 (class 2604 OID 24848)
-- Name: client id_client; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client ALTER COLUMN id_client SET DEFAULT nextval('public.client_id_client_seq'::regclass);


--
-- TOC entry 2880 (class 2604 OID 24859)
-- Name: commande id_com; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande ALTER COLUMN id_com SET DEFAULT nextval('public.commande_id_com_seq'::regclass);


--
-- TOC entry 2882 (class 2604 OID 24880)
-- Name: produit id_produit; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);


--
-- TOC entry 3039 (class 0 OID 24889)
-- Dependencies: 209
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id_admin, login, password) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');


--
-- TOC entry 3035 (class 0 OID 24866)
-- Dependencies: 205
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_cat, nom_cat, image, description_cat) VALUES (1, 'fleurs', 'fleur_unique.jpg', 'fleurs vendue de façon unique');
INSERT INTO public.categorie (id_cat, nom_cat, image, description_cat) VALUES (2, 'bouquets préparés', 'bouquet_fleur.jpg', 'bouquet déjà préparé à l''avance
');
INSERT INTO public.categorie (id_cat, nom_cat, image, description_cat) VALUES (3, 'outils', 'arrosoire.png', 'outils en tout genre pour prendre soins de vos fleurs');


--
-- TOC entry 3031 (class 0 OID 24845)
-- Dependencies: 201
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3033 (class 0 OID 24856)
-- Dependencies: 203
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3037 (class 0 OID 24877)
-- Dependencies: 207
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.produit (id_produit, nom_produit, photo, prix, stock, description, id_cat) VALUES (1, 'rose', 'rose.jpg', 1.4, 222, 'rose d''europe', 1);
INSERT INTO public.produit (id_produit, nom_produit, photo, prix, stock, description, id_cat) VALUES (2, 'tulipe jaune', 'tulipe_jaune.jpg', 3, 152, 'tulipe jaune d''Asie de l''est', 1);
INSERT INTO public.produit (id_produit, nom_produit, photo, prix, stock, description, id_cat) VALUES (3, 'rateau', 'rateau.jpg', 30.99, 12, 'reteau métalique 120 cm', 3);
INSERT INTO public.produit (id_produit, nom_produit, photo, prix, stock, description, id_cat) VALUES (4, 'bouquet d''été', 'bouquet_ete.jpg', 23.25, 4, 'bouquet formé de fleur d''été au couleur chaude ', 2);


--
-- TOC entry 3050 (class 0 OID 0)
-- Dependencies: 208
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, false);


--
-- TOC entry 3051 (class 0 OID 0)
-- Dependencies: 204
-- Name: categorie_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_id_cat_seq', 3, true);


--
-- TOC entry 3052 (class 0 OID 0)
-- Dependencies: 200
-- Name: client_id_client_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.client_id_client_seq', 1, false);


--
-- TOC entry 3053 (class 0 OID 0)
-- Dependencies: 202
-- Name: commande_id_com_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.commande_id_com_seq', 1, false);


--
-- TOC entry 3054 (class 0 OID 0)
-- Dependencies: 206
-- Name: produit_id_produit_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_id_produit_seq', 4, true);


--
-- TOC entry 2896 (class 2606 OID 24897)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2891 (class 2606 OID 24874)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2885 (class 2606 OID 24853)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_client);


--
-- TOC entry 2889 (class 2606 OID 24861)
-- Name: commande commande_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT commande_pkey PRIMARY KEY (id_com);


--
-- TOC entry 2894 (class 2606 OID 24885)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_produit);


--
-- TOC entry 2886 (class 1259 OID 24862)
-- Name: commande_id_client_idx; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX commande_id_client_idx ON public.commande USING btree (id_client);


--
-- TOC entry 2887 (class 1259 OID 24863)
-- Name: commande_id_produit_idx; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX commande_id_produit_idx ON public.commande USING btree (id_produit);


--
-- TOC entry 2892 (class 1259 OID 24886)
-- Name: produit_id_cat_idx; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX produit_id_cat_idx ON public.produit USING btree (id_cat);


--
-- TOC entry 2897 (class 2606 OID 24898)
-- Name: commande fk_commande__id_client; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande__id_client FOREIGN KEY (id_client) REFERENCES public.client(id_client);


--
-- TOC entry 2898 (class 2606 OID 24903)
-- Name: commande fk_commande__id_produit; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande__id_produit FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2899 (class 2606 OID 24908)
-- Name: produit fk_produit__id_cat; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT fk_produit__id_cat FOREIGN KEY (id_cat) REFERENCES public.categorie(id_cat);


-- Completed on 2021-05-03 15:32:39

--
-- PostgreSQL database dump complete
--

