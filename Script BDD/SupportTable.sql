USE TabStat;

CREATE TABLE ETAT_SUPPORT
(
ref_support varchar(4) NOT NULL,
etat_support varchar(50),
nb_support int(3) NOT NULL,
statut_support varchar(30)NOT NULL,
constraint pk_ETAT_SUPPORT PRIMARY KEY(ref_support)
)
ENGINE=INNODB; 

INSERT INTO ETAT_SUPPORT VALUES('AD03','supports en cours', 10, 'nouveau');
INSERT INTO ETAT_SUPPORT VALUES('QJ87',null, 20, 'precisions requises');
INSERT INTO ETAT_SUPPORT VALUES('FD34',null, 30, 'accepte');
INSERT INTO ETAT_SUPPORT VALUES('SE56',null, 40, 'confirme');
INSERT INTO ETAT_SUPPORT VALUES('XP67',null, 50, 'affecte');
INSERT INTO ETAT_SUPPORT VALUES('PM09','supports clos', 80, 'resolu');
INSERT INTO ETAT_SUPPORT VALUES('KL45',null, 90, 'ferme');
