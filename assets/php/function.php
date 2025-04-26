<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario y sanitizarlos
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Configurar destinatario y asunto
        $destinatario = "carloandres29@gmail.com"; // Cambia por tu correo
        $asunto = "Nuevo mensaje de contacto desde tu página web";

        // Construir el cuerpo del correo
        $cuerpo = "Has recibido un nuevo mensaje de contacto:\n\n";
        $cuerpo .= "Nombre: $nombre\n";
        $cuerpo .= "Email: $email\n";
        $cuerpo .= "Mensaje:\n$mensaje\n";

        // Encabezados del correo
        $encabezados = "From: $email\r\n";
        $encabezados .= "Reply-To: $email\r\n";

        // Enviar el correo
        if (mail($destinatario, $asunto, $cuerpo, $encabezados)) {
            echo "El mensaje se ha enviado correctamente.";
        } else {
            echo "Hubo un error al enviar el mensaje. Inténtalo de nuevo más tarde.";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
}
?>
