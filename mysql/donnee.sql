

USE MyBookList;
# -----------------------------------------------------------------------------
#       Insertion des données : Type de livre
# ----------------------------------------------------------------------------- 

INSERT INTO MBL_Type (Type_Nom, Type_Description) 
VALUES ('Roman','Livres en prose, généralement reliés ou brochés, où l''histoire est développée sur plusieurs pages.');

INSERT INTO MBL_Type (Type_Nom, Type_Description) 
VALUES ('Manga ','Bandes dessinées japonaises publiées en volumes reliés ou en chapitres dans des magazines spécialisés.');

INSERT INTO MBL_Type (Type_Nom, Type_Description) 
VALUES ('BD (Bande Dessinée)','Bandes dessinées à l’occidentale, souvent en albums ou en séries de comics.');

INSERT INTO MBL_Type (Type_Nom, Type_Description) 
VALUES ('Webcomic','Bandes dessinées publiées en ligne, souvent en épisodes ou en séries.');

INSERT INTO MBL_Type (Type_Nom, Type_Description) 
VALUES ('Revues littéraires','Publications périodiques contenant des histoires courtes, des essais et des poèmes, souvent par des écrivains contemporains.');


# -----------------------------------------------------------------------------
#       Insertion des données : Catégorie de livre
# -----------------------------------------------------------------------------

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Roman classique','Œuvres considérées comme des classiques de la littérature, souvent étudiées pour leur style, leur influence et leur profondeur.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Science-fiction','Livres qui explorent des concepts futuristes ou technologiques, souvent dans des contextes futuristes ou alternatifs.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Fantasy','Histoires se déroulant dans des mondes imaginaires avec des éléments magiques, fantastiques ou mythologiques.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Policier/Thriller','Livres centrés sur des enquêtes criminelles, des mystères ou des intrigues palpitantes.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Romance','Histoires qui explorent les relations amoureuses et les émotions qui en découlent.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Historique','Livres qui se déroulent dans des périodes historiques spécifiques et souvent basés sur des événements réels ou des contextes historiques.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Horreur ','Livres conçus pour provoquer la peur, l'angoisse ou l'effroi, souvent avec des éléments surnaturels ou macabres.');

INSERT INTO MBL_Categorie (Cat_Nom, Cat_Description) 
VALUES ('Autobiographie/Biographie','Récits de la vie d''une personne, écrits par elle-même (autobiographie) ou par un autre auteur (biographie).');


# -----------------------------------------------------------------------------
#       Insertion des données : Livre
# -----------------------------------------------------------------------------
