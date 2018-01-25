

 CREATE TRIGGER après_insertion_audios AFTER INSERT
ON audios FOR EACH ROW
 BEGIN
ALTER TABLE audios AUTO_INCREMENT = 1;
END;

CREATE TABLE commentaire(
id SMALLINT (6) PRIMARY key AUTO_INCREMENT ,
 nom_commentateur varchar(40),
 prenom_commentateur varchar(40),
commentaire TEXT
)