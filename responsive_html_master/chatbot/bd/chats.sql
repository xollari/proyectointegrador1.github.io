
-- Aca se crea la base de datos:
use sys;

-- Crea la base de datos si no existe
CREATE DATABASE chatbot_pi;

-- Utiliza la base de datos
USE chatbot_pi;

-- Crea la tabla para almacenar la conversación del chat
CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_message TEXT NOT NULL,
    bot_message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
