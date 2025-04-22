drop database Pasajeros;
create database Pasajeros;
use Pasajeros;

create table Administrador(
id_A int primary key auto_increment not null,
nombre varchar(30) not null,
contraseña varchar (60) not null
);
create table Cliente (
id_C int primary key auto_increment not null,
nombre varchar (60) not null,
contraseña varchar (60) not null
);
create table Usuario (
id_U int primary key auto_increment not null,
documento varchar (11) not null,
nombre varchar (30) not null,
apellido varchar (30) not null,
telefono varchar (11) not null,
correo varchar (60) not null, 
direccion varchar (60) not null,
cargo varchar (60) not null,
base varchar (50) not null,
zona varchar (50) not null,
psl varchar (100) not null,
id_C int not null,
foreign key (id_C) references Cliente (id_C)
);

create table Movil(
id_M int primary key auto_increment not null,
movil varchar(4) not null,
placa varchar(6) not null
);

create table Ruta(
id_R int primary key auto_increment not null,
nombre varchar (60) not null,
contraseña varchar(100) not null
);

create table Registro (
id_RE int primary key auto_increment not null,
fecha date not null,
hora time not null,
documento varchar (11) not null,
id_U int not null,
id_R int not null,
id_M int not null,
foreign key (id_U) references Usuario (id_U),
foreign key (id_M) references Movil (id_M),
foreign key (id_R) references Ruta (id_R)
);

INSERT INTO Administrador(nombre, contraseña)
values ('Admin','AdminLT');
select * from Administrador;

INSERT INTO Cliente (nombre, contraseña)
values ('haliburton','haliburton123');
select * from Cliente;

INSERT INTO Usuario (documento, nombre, apellido, telefono, correo, direccion, cargo, base, zona, psl, id_C)  
VALUES  
('12345678901', 'Juan', 'Pérez', '3001234567', 'juan.perez@email.com', 'Calle 123, Ciudad', 'Vendedor', 'BOG', 'Zona 1', 'Wireline and Perforating', 1),
('23456789012', 'María', 'Gómez', '3012345678', 'maria.gomez@email.com', 'Carrera 456, Ciudad', 'Supervisor', 'BOG', 'Zona 2', ' Maintenance PSL', 1),
('34567890123', 'Carlos', 'López', '3023456789', 'carlos.lopez@email.com', 'Avenida 789, Ciudad', 'Gerente', 'BOG', 'Zona 3', ' BD-Other', 1),
('45678901234', 'Ana', 'Martínez', '3034567890', 'ana.martinez@email.com', 'Diagonal 101, Ciudad', 'Asesor', 'BOG', 'Zona 4', ' Real Estate Services', 1),
('NUEVO', 'NUEVO', 'NUEVO', 'NUEVO', 'NUEVO.NUEVO@email.com', 'NUEVO', 'NUEVO', 'NUEVO', 'NUEVO', 'NUEVO', 1);
select * from Usuario;

INSERT INTO Movil (movil, placa)
values 
('3014','KSQ714'), ('3003','LLQ846'), ('2995','GUZ239');
select * from Movil;

INSERT INTO Ruta (nombre, contraseña)
values ('Norte','NORTE123'),
('SUR','SUR123'),
('CALLE80','CALLE80');
select * from Ruta;

INSERT INTO Registro (fecha, hora, documento, id_U, id_R, id_M)  
VALUES  
('2025-02-19', '08:00:00', '12345678901', 4, 2, 1),  
('2025-02-19', '12:30:00', '12345678901', 3, 2, 2),  
('2025-02-19', '15:45:00', '12345678901', 2, 2, 3),  
('2025-02-19', '18:00:00', '12345678901', 5, 2, 1);  
select * from Registro;