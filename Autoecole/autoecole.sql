Drop database if exists autoecole;
Create database autoecole;
Use autoecole;

Create table users (
	id_u int(11) not null auto_increment,
	pseudo varchar(50),
	mdp varchar(255),
	lvl int not null default 0,
	primary key (id_u)
) ENGINE=InnoDB;

Create table messages (
	id_exp int not null,
	id_dest int not null,
	contenu text,
	lu int default 0,
	non_lu int default 0,
	primary key (id_exp, id_dest),
	foreign key (id_exp) references users (id_u),
	foreign key (id_dest) references users (id_u)
) ENGINE=InnoDB;

Create table lecon (
	id_l int(11) not null auto_increment,
	date_deb varchar(10),
	heure_deb time,
	date_fin varchar(10),
	heure_fin time,
	primary key (id_l)
) ENGINE=InnoDB;

Create table commentaires (
	id_com int(11) not null auto_increment,
	contenu text,
	primary key (id_com)
) ENGINE=InnoDB;
