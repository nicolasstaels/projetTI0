PGDMP         "                y        	   fleuriste    13.1    13.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    24829 	   fleuriste    DATABASE     f   CREATE DATABASE fleuriste WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_Belgium.1252';
    DROP DATABASE fleuriste;
                boulangerie    false            �            1259    24877    produit    TABLE       CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    nom_produit character varying NOT NULL,
    photo character varying NOT NULL,
    prix real NOT NULL,
    stock integer NOT NULL,
    description character varying NOT NULL,
    id_cat integer NOT NULL
);
    DROP TABLE public.produit;
       public         heap    boulangerie    false            �            1259    24875    produit_id_produit_seq    SEQUENCE     �   CREATE SEQUENCE public.produit_id_produit_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.produit_id_produit_seq;
       public          boulangerie    false    207            �           0    0    produit_id_produit_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;
          public          boulangerie    false    206            9           2604    24880    produit id_produit    DEFAULT     x   ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);
 A   ALTER TABLE public.produit ALTER COLUMN id_produit DROP DEFAULT;
       public          boulangerie    false    206    207    207            �          0    24877    produit 
   TABLE DATA           c   COPY public.produit (id_produit, nom_produit, photo, prix, stock, description, id_cat) FROM stdin;
    public          boulangerie    false    207          �           0    0    produit_id_produit_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.produit_id_produit_seq', 4, true);
          public          boulangerie    false    206            <           2606    24885    produit produit_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_produit);
 >   ALTER TABLE ONLY public.produit DROP CONSTRAINT produit_pkey;
       public            boulangerie    false    207            :           1259    24886    produit_id_cat_idx    INDEX     H   CREATE INDEX produit_id_cat_idx ON public.produit USING btree (id_cat);
 &   DROP INDEX public.produit_id_cat_idx;
       public            boulangerie    false    207            =           2606    24908    produit fk_produit__id_cat    FK CONSTRAINT     �   ALTER TABLE ONLY public.produit
    ADD CONSTRAINT fk_produit__id_cat FOREIGN KEY (id_cat) REFERENCES public.categorie(id_cat);
 D   ALTER TABLE ONLY public.produit DROP CONSTRAINT fk_produit__id_cat;
       public          boulangerie    false    207            �   �   x�U�A� E��)ع#�p�{41Ԏ��E�P�Ëu���&�ϼ���̏�hU�1&�^ �0#ha �f�����"st���ex��.�C,D���1�`��47���i[��ÛPjS�n+*�b'q&����-39�Xej���!r���{���I.�e�{:�=qUB�YdWe     