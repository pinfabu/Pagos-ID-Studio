DROP database ID_Studio;
create database ID_Studio;

use ID_Studio;

create table Estilista(
  ID_Estilista int auto_increment primary key,
  Nombre_Completo varchar(50)
);

create table Auxiliar(
  ID_Auxiliar int auto_increment primary key,
  Nombre_Completo varchar(50)
);

create table Pagos(
  ID_Pago int auto_increment primary key,
  ID_Estilista int,
  ID_Auxiliar int,
  Semana_a_pagar varchar(40),
  Total_Comisiones float(30),
  Pago_Semanal int(30),
  Pago_Total float(30),
  Primer_dia_semana date,
  Ultimo_dia_semana date,
  foreign key (ID_Estilista) references Estilista(ID_Estilista),
  foreign key (ID_Auxiliar) references Auxiliar(ID_Auxiliar)
);

create table Cita(
  ID_Cita int auto_increment primary key,
  ID_Estilista int,
  ID_Pago int,
  ID_Auxiliar int,
  Trabajo varchar(40),
  Precio int(30),
  Comision float(30),
  Fecha date,
  foreign key (ID_Estilista) references Estilista(ID_Estilista),
  foreign key (ID_Pago) references Pagos(ID_Pago),
  foreign key (ID_Auxiliar) references Auxiliar(ID_Auxiliar)
);