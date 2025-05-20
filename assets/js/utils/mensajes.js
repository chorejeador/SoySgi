function mensaje(icon, s ) {

	Swal.fire({
		type: icon,
		title: s,
		confirmButtonText: 'Aceptar',
	}).then((result) => {

		if (result.isConfirmed) {
			console.log('Confirmed!');

		}
	});
}

function mensajeConfirmacion(icono, titulo) {
	return Swal.fire({
		title: titulo,
		type: icono,
		showCancelButton: true,
		confirmButtonText: 'Aceptar',
		cancelButtonText: 'Cancelar'
	});
}


export {mensaje, mensajeConfirmacion};
