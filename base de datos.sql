create database bd_programaa;
use bd_programa;

drop table cliente;
create table cliente(
    CodC int not null AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(40) not null,
    telefono varchar(40)not null,
	direccion varchar(40) not null
);
insert into cliente(nombre,telefono,direccion) value ( 'laura Rivero', '72247214', 'radial 13');
select * from cliente;


drop table cargo;
 create table cargo(
    idc int not null AUTO_INCREMENT PRIMARY KEY,
    Descripcion varchar(40) not null
);
insert into cargo(Descripcion)
value ('Administrador'),('vededor');
select * from cargo;


drop table empleados;
create table empleados(
	CodEm int not null AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(20) not null,
    Telefono varchar(8) not null,
    idc int not null,
    foreign key (idc) references cargo(idc)
);
insert into empleados(Nombre,Telefono,idc)
VALUES('Carla Silva', '67737854','1'),('Carlos Soruco', '68488444','1'),
('Marco Perez', '77642380','2'),('Ana Basquez', '67917699','2'),
('Valeria Ribero', '77849568','2');
select * from empleados;



SELECT empleados.CodEm, empleados.Nombre, empleados.Telefono, cargo.Descripcion
FROM empleados
JOIN cargo ON empleados.idc = cargo.idc;


drop table UnidadMedida;
 create table UnidadMedida(
    CodM int not null AUTO_INCREMENT PRIMARY KEY,
    Descripcion varchar(40) not null
    );
insert into UnidadMedida(Descripcion)
value ('Metro cuadrado'),('Metro lineal'),('Unidad');
select * from UnidadMedida;

drop table Usuarios;
create table Usuarios (
    CodU int not null AUTO_INCREMENT PRIMARY KEY,
    Usuario varchar(30) not null,
    Gmail varchar(30) not null,
    Clave varchar(15) not null,
    CodEm int not null,
    foreign key (CodEm) references empleados(CodEm)
);
insert into Usuarios (Usuario, Gmail, clave, CodEm)
value
    ('carla', 'carlasilva@gmail.com', 'carla123', 1),
    ('carlos','carlossoruco@gmail.com', 'carlos123', 2),
    ('marco','marcoperez@gmail.com', 'marco', 3),
    ('ana','anabasquez@gmail.com', 'ana123', 4),
    ('valeria','valeriarivero@gmail.com', 'valeria123', 5);
select * from Usuarios;

SELECT Usuario,clave FROM Usuarios; 

drop table productos;
create table productos(
    COP int not null AUTO_INCREMENT PRIMARY KEY,
    productos varchar(45) not null, 
    precio varchar(8) not null, 
    CodM int not null,
    foreign key (CodM) references UnidadMedida(CodM)
);
insert into productos(productos,precio,CodM)
values ( 'chapa electrica ', '11000', 3),( 'jaladores redondos cromado', '1050', 3),
('jalador de box', '1200', 3),( 'jaladores doble box cromado ', '1200',3),
('chapa de abatir ', '1200', 3),('soporte centro', '1200', 3),
('puerta batiente ', '630', 1),('puerta corrediza', '590', 1),
( 'barandas con tubines', '980', 2),('barandas con vidrios', '1120', 2),
('picaporte', '1200',2),('soporte diamante', '1200', 3),
('Esquineros', '1200', 3),('contra picaporte', '1200', 3),
('chapa de correr ', '1200', 3);
select * from productos;

drop table Proveedores;
create table Proveedores(
	CPROV  int not null AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(20) not null,
    Telefono varchar(10) not null,
	COP int not null,
	foreign key (COP) references productos(COP)
);
insert into Proveedores(Nombre,Telefono,COP)
value ('Julia Daza', '71638348',4);
select * from Proveedores;


drop table Cotizacion;
create table Cotizacion(
	Coti  int not null AUTO_INCREMENT PRIMARY KEY,
    Ancho varchar(20) not null,
    Largo varchar(10) not null,
	Cantidad varchar(30) not null,
	COP int not null,
	CodC int not null,
	CodEm  int not null,
	foreign key (COP) references productos(COP),
	foreign key (CodC) references cliente(CodC),
	foreign key (CodEm) references empleados(CodEm)
);

insert into Cotizacion(Ancho,Largo,Cantidad,COP,CodC,CodEm)
value ('9.5', '2.5','5',7,1,1),('9.1', '2.5','5',8,1,1);
select * from Cotizacion;



drop table Pedidos;
create table Pedidos(
	COdPed  int not null AUTO_INCREMENT PRIMARY KEY,
    FechaPedido date not null,
    FechaEntrega date not null,
    Total varchar(30) not null,
	CodC int not null,
	CodEm  int not null,
	foreign key (CodC) references cliente(CodC), /*empleado*/
	foreign key (CodEm) references empleados(CodEm) /*cliente*/
);

insert into Pedidos(FechaPedido,FechaEntrega,Total,CodC,CodEm)
value ( '2024-01-19', '2024-03-15','1810',1,1);
select * from Pedidos;



drop table DetalleVenta1;
create table DetalleVenta1(
	DV1  int not null AUTO_INCREMENT PRIMARY KEY,
	SubTotal varchar(10) not null,
	COdPed int not null,
	foreign key (COdPed) references Pedidos(COdPed) /*pedidos*/
);
insert into DetalleVenta1(Subtotal,COdPed)
value ('630',1),( '1180','1');
select * from DetalleVenta1;


drop table compraxmayor;
create table compraxmayor(
	CXM  int not null AUTO_INCREMENT PRIMARY KEY,
    cantidad varchar(20) not null,
    FechaPedido date not null, 
	CodEm int not null,
	foreign key (CodEm) references empleados(CodEm)
);
insert into compraxmayor(cantidad,FechaPedido,CodEm)
value ( '2','2024-01-19','2');
select * from compraxmayor;




SELECT C.Coti, C.Ancho, C.Largo, C.Cantidad, P.productos AS Producto, CL.nombre AS Cliente, E.Nombre AS Empleado
    FROM Cotizacion C
    JOIN productos P ON C.COP = P.COP
    JOIN cliente CL ON C.CodC = CL.CodC
    JOIN empleados E ON C.CodEm = E.CodEm;
    
    
SELECT C.Coti, C.Ancho, C.Largo, C.Cantidad, P.productos AS Producto, P.precio AS Precio, CL.nombre AS Cliente, E.Nombre AS Empleado
FROM Cotizacion C
JOIN productos P ON C.COP = P.COP
JOIN cliente CL ON C.CodC = CL.CodC
JOIN empleados E ON C.CodEm = E.CodEm;



DELETE FROM cliente  WHERE CodC








/**detalle de una venta*/
SELECT Cotizacion.Coti, Cotizacion.Ancho, Cotizacion.Largo, productos.productos AS NombreProducto, Cotizacion.Cantidad, DetalleVenta1.SubTotal, Pedidos.COdPed, Pedidos.FechaPedido, Pedidos.FechaEntrega, Pedidos.Total, cliente.Nombre AS NombreCliente, empleados.Nombre AS NombreEmpleado
FROM DetalleVenta1
JOIN Pedidos ON DetalleVenta1.COdPed = Pedidos.COdPed
JOIN cliente ON Pedidos.CodC = cliente.CodC
JOIN empleados ON Pedidos.CodEm = empleados.CodEm
JOIN Cotizacion ON DetalleVenta1.COdPed = Cotizacion.Coti
JOIN productos ON Cotizacion.COP = productos.COP;


SELECT C.Coti, C.Ancho, C.Largo, C.Cantidad, P.productos AS Producto, CL.nombre AS Cliente, E.Nombre AS Empleado
FROM Cotizacion C
JOIN productos P ON C.COP = P.COP
JOIN cliente CL ON C.CodC = CL.CodC
JOIN empleados E ON C.CodEm = E.CodEm;




/**total ventas de la tabla de pedidos*/
SELECT COUNT(COdPed) AS TotalPedidos FROM Pedidos;


SELECT c.*, e.Nombre AS NombreEmpleado
FROM compraxmayor c
JOIN empleados e ON c.CodEm = e.CodEm;

SELECT p.Nombre AS Proveedor, pr.productos AS Producto, p.Telefono
FROM Proveedores p
JOIN productos pr ON p.COP = pr.COP;




SELECT C.Coti, C.Ancho, C.Largo, C.Cantidad, P.productos AS Producto, CL.nombre AS Cliente, E.Nombre AS Empleado
    FROM Cotizacion C
    JOIN productos P ON C.COP = P.COP
    JOIN cliente CL ON C.CodC = CL.CodC
    JOIN empleados E ON C.CodEm = E.CodEm;