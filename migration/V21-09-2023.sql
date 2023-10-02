insert into Permisos (nombre, descripcion,estado,idusuariocrea,fechacrea)
values ('Permiso para subir indicadores','Permiso para subir indicadores solo aplica a gerentes o personas de la empresa','ACTIVO',1,getdate());

insert into Permisos (nombre, descripcion,estado,idusuariocrea,fechacrea)
values ('Permiso para visualizar indicadores  todos','Permiso para visualizar indicadores propios y de otros usuarios, permiso para admin o sgi','ACTIVO',1,getdate());



insert into PermisosUsuarios (IdUsuario,IdPermiso,Estado)
values (1,4,'ACTIVO');

insert into PermisosUsuarios (IdUsuario,IdPermiso,Estado)
values (1,5,'ACTIVO');

insert into PermisosUsuarios (IdUsuario,IdPermiso,Estado)
values (1002,4,'ACTIVO');

insert into PermisosUsuarios (IdUsuario,IdPermiso,Estado)
values (1002,5,'ACTIVO');

