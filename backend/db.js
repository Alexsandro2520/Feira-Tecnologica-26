const mysql = require("mysql2");

const banco = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "feira_tecnologica"
});

banco.connect((erro) => {
    if (erro) {
        console.log("Erro ao conectar no MySQL:", erro.message);
        return;
    }

    console.log("MySQL conectado!");
});

module.exports = banco;