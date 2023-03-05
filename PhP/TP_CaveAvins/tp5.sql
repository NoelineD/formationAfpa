#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Catégories
#------------------------------------------------------------

CREATE TABLE Categories(
        id_cat      Int  Auto_increment  NOT NULL ,
        libelle_cat Varchar (255) NOT NULL
	,CONSTRAINT Categories_PK PRIMARY KEY (id_cat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Articles
#------------------------------------------------------------

CREATE TABLE Articles(
        id_art          Int  Auto_increment  NOT NULL ,
        code_art        Varchar (10) NOT NULL ,
        libelle_art     Varchar (255) NOT NULL ,
        prix_ht_article Float NOT NULL ,
        promo_art       Bool NOT NULL ,
        id_cat          Int NOT NULL
	,CONSTRAINT Articles_PK PRIMARY KEY (id_art)

	,CONSTRAINT Articles_Categories_FK FOREIGN KEY (id_cat) REFERENCES Categories(id_cat)
)ENGINE=InnoDB;

