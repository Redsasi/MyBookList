
# -----------------------------------------------------------------------------
#       DATABASE : hhva_saiam
# -----------------------------------------------------------------------------

#DROP DATABASE IF EXISTS hhva_saiam; 

#CREATE DATABASE IF NOT EXISTS hhva_saiam;
USE hhva_saiam;
# -----------------------------------------------------------------------------
#       TABLE : MBL_Type
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_Type
 (
   Type_Id INTEGER NOT NULL AUTO_INCREMENT,
   Type_Nom VARCHAR(50) NOT NULL,
   Type_Description VARCHAR(1000) NOT NULL,
   PRIMARY KEY (Type_Id) 
 ) ENGINE=InnoDB;
 
# -----------------------------------------------------------------------------
#       TABLE : MBL_Livre
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_Livre
 (
   Lvr_Id INTEGER NOT NULL AUTO_INCREMENT,
   Lvr_Nom VARCHAR(90) NOT NULL,
   Lvr_Description VARCHAR(5000) NOT NULL,
   Lvr_Type INTEGER NOT NULL,
   Lvr_Image MEDIUMBLOB,
   PRIMARY KEY (Lvr_Id),
   FOREIGN KEY FK_Livre_Type (Lvr_Type) REFERENCES MBL_Type (Type_Id)   
 ) ENGINE=InnoDB;
 
# -----------------------------------------------------------------------------
#       TABLE : MBL_Categorie
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_Categorie
 (
   Cat_Id INTEGER NOT NULL AUTO_INCREMENT,
   Cat_Nom VARCHAR(50) NOT NULL,
   Cat_Description VARCHAR(1000) NOT NULL,
   PRIMARY KEY (Cat_Id) 
 ) ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : MBL_CatLivre
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_CatLivre
 (
   CatLivre_Livre INTEGER NOT NULL,
   CatLivre_Categorie INTEGER NOT NULL,
   PRIMARY KEY (CatLivre_Livre,CatLivre_Categorie),
   FOREIGN KEY FK_CatLivre_Livre (CatLivre_Livre) REFERENCES MBL_Livre (Lvr_Id),
   FOREIGN KEY FK_CatLivre_Categorie (CatLivre_Categorie) REFERENCES MBL_Categorie (Cat_Id)

 ) ENGINE=InnoDB;
# -----------------------------------------------------------------------------
#       TABLE : MBL_Lecteur
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_Lecteur
 (
   Lect_Id INTEGER NOT NULL AUTO_INCREMENT,
   Lect_Pseudo VARCHAR(255) NOT NULL,
   Lect_MDP VARCHAR(255) NOT NULL,
   Lect_email VARCHAR(255) NOT NULL UNIQUE,
   Lect_admin BOOLEAN NOT NULL,
   PRIMARY KEY (Lect_Id) 
 ) ENGINE=InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : MBL_LecteurLivre
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MBL_LecteurLivre
 (
   LectLivre_Livre INTEGER NOT NULL,
   LectLivre_Lecteur INTEGER NOT NULL,
   LectLivre_Type VARCHAR(255) NOT NULL,
   PRIMARY KEY (LectLivre_Livre, LectLivre_Lecteur),
   FOREIGN KEY FK_LectLivre_Livre (LectLivre_Livre) REFERENCES MBL_Livre (Lvr_Id),
   FOREIGN KEY FK_LectLivre_Lecteur (LectLivre_Lecteur) REFERENCES MBL_Lecteur (Lect_Id)
 ) ENGINE=InnoDB;
