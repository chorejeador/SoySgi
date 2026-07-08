<div class="container" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 text-center">Cambiar Contraseña</h5>
                </div>

                <div class="card-body p-4">
                    <form id="formPassword">

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Contraseña actual</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password_actual"
                                    name="password_actual"
                                    class="form-control"
                                    placeholder="Ingrese su clave actual"
                                    required>
                                <span
                                    class="input-group-text bg-light"
                                    onclick="togglePassword('password_actual', this)"
                                    style="cursor:pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Nueva contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-shield-alt text-muted"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password_nueva"
                                    name="password_nueva"
                                    class="form-control"
                                    placeholder="Mínimo 8 caracteres"
                                    required>
                                <span
                                    class="input-group-text bg-light"
                                    onclick="togglePassword('password_nueva', this)"
                                    style="cursor:pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-text text-muted small">
                                Asegúrese de usar una clave que pueda recordar.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Confirmar nueva contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-check text-muted"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password_confirmar"
                                    name="password_confirmar"
                                    class="form-control"
                                    placeholder="Repita la nueva contraseña"
                                    required>
                                <span
                                    class="input-group-text bg-light"
                                    onclick="togglePassword('password_confirmar', this)"
                                    style="cursor:pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm">
                                <i class="fas fa-sync-alt me-2"></i>Actualizar contraseña
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("formPassword");
        if (!form) return;

        const btnSubmit = form.querySelector("button[type='submit']");

        form.addEventListener("submit", async function(e) {
            e.preventDefault();

            const actual = document.getElementById("password_actual").value.trim();
            const nueva = document.getElementById("password_nueva").value.trim();
            const confirmar = document.getElementById("password_confirmar").value.trim();


            if (!actual || !nueva || !confirmar) {
                Swal.fire("Campos incompletos", "Todos los campos son obligatorios", "warning");
                return;
            }

            if (nueva !== confirmar) {
                Swal.fire("Error", "Las contraseñas nuevas no coinciden", "error");
                return;
            }

            if (nueva.length < 8) {
                Swal.fire("Contraseña débil", "Debe tener al menos 8 caracteres", "warning");
                return;
            }


            if (btnSubmit) btnSubmit.disabled = true;

            try {
                const formData = new FormData(form);

                const response = await fetch("<?= base_url('index.php/guardar_cambiar_password') ?>", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                });


                if (!response.ok) {
                    throw new Error("Error en la respuesta del servidor");
                }

                const data = await response.json();
                console.log("Respuesta servidor:", data);

                if (!data || !data[0]) {
                    throw new Error("Respuesta inválida del servidor");
                }

                const resultado = data[0];

                if (parseInt(resultado.retorno) === 1) {
                    await Swal.fire({
                        icon: "success",
                        title: "Contraseña actualizada",
                        text: "su contraseña fue cambiada correctamente. Por seguridad, debes iniciar sesión nuevamente,gracias por la compresion .",
                        confirmButtonText: "Continuar"
                    });


                    window.location.href = resultado.redirect;

                } else {
                    Swal.fire("Error", resultado.mensaje || "No se pudo procesar", "error");
                }

            } catch (error) {
                console.error("Error:", error);

                Swal.fire(
                    "Error",
                    "Ocurrió un problema al procesar la solicitud",
                    "error"
                );
            } finally {

                if (btnSubmit) btnSubmit.disabled = false;
            }
        });
    });



    function togglePassword(id, el) {
        const input = document.getElementById(id);
        if (!input) return;

        const icon = el.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            if (icon) {
                icon.classList.replace("fa-eye", "fa-eye-slash");
            }
        } else {
            input.type = "password";
            if (icon) {
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    }
</script>