
<?php
// Configura la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "Geral@123";
$dbname = "chatbot_pi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Función para obtener la respuesta del chatbot
function getBotResponse($userMessage) {
    // Implementa la lógica del chatbot aquí
    // Este es solo un ejemplo muy simple
    $responses = [
        "" => "Por favor agrega un caracter",
        "Hola" => "¡Hola! ¿En qué puedo ayudarte?",
        "Describeme el proyecto" => "Esta pagina se encarga de poder reservar y matricular a los alumnos de la facultad de ingeniería 
        electrónica e informatica (FIEI)",
        "Puedes contactar con el responsable" => "Por el momento no, esta aplicación aun está en proceso de escalabilidad",
        "Mencioname a los responsables"=> "loa integrantes del grupo son Sam, Bonifaz, Wari, Avalos, Joshep, Zummy, TIcona y Geral",
        "Tengo un problema"=> "Por el momento no puedo ser de ayuda, puedes  contactar con este correo para comunicarte con los desarrolladores gerallujan0721@gmail.com"
    ];

    return $responses[$userMessage] ?? "Lo siento, no entiendo esa pregunta, pregunte de nuevo.";
}

// Maneja la solicitud del usuario
if (isset($_POST["user_message"])) {
    $userMessage = $_POST["user_message"];
    $botMessage = getBotResponse($userMessage);

    // Guarda la conversación en la base de datos
    $sql = "INSERT INTO chat (user_message, bot_message) VALUES ('$userMessage', '$botMessage')";
    $conn->query($sql);
}

if (isset($_POST["borrar_historial"])) {
    // Realiza la consulta para borrar el historial
    $sql = "DELETE FROM chat";

    if ($conn->query($sql) === TRUE) {
        // No mostrar ningún mensaje aquí
    } else {
        echo "Error al borrar el historial: " . $conn->error;
    }
}


// Realiza la consulta con la base de datos
$sql = "SELECT user_message, bot_message FROM chat ORDER BY id DESC";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Chatbot</title>

    </head>
    <body id="model_chat">
        <h1 class="titulo">Chatbot</h1>
        <div id="chat">
            <div class="d-flex flex-column">
                <<?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            echo '<div class="d-flex gap-2 mt-2">
                                    <img class="bg-warning" id="boceto" src="static/user.png" alt="usuario">
                                    <p class="text-start border rounded-pill p-4">'
                                        . $row["user_message"] .
                                    '</p>
                                </div>';
                            
                            echo '<div class="d-flex flex-row-reverse gap-2 mt-2">
                                    <img id="boceto" src="static/bot.png" alt="bot">
                                    <p class="text-start border rounded-pill p-4">'
                                        . $row["bot_message"] .
                                    '</p>
                                </div>';

                        }
                    }
                ?>
            </div>
            
            <div>
                <form id="settigns" method="post" action="chatbot.php">
                    <input name="user_message" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Escribir mensaje">
                    <div class="d-flex justify-content-center mt-3 gap-3 mx-0">
                        <button class="btn btn-primary d-flex align-items-center gap-4" type="submit">
                            <p class="m-0">Enviar</p>
                            <img class="p-0" id="opcion" src="static/enviar-wf.png" alt="envio">
                        </button>
                        <button class="btn btn-danger mx-0 d-flex align-items-center gap-4" type="submit" name="borrar_historial">
                            <p class="m-0">Borrar historial</p>
                            <img class="p-0" id="opcion" src="static/borrar-wf.png" alt="pegado">
                        </button>
                    </div>
                </form>
            </div>
        </div>  
    </body>
</html>


<?php
// Cierra la conexión a la base de datos
$conn->close();
?>