const express = require("express");
const cors = require("cors");
const path = require("path");
const cookieParser = require("cookie-parser");

const authRoutes = require("./routes/auth");
const postsRoutes = require("./routes/posts");
const interacoesRoutes = require("./routes/interacoes");

const app = express();

app.use(
cors({
origin: true,
credentials: true
})
);

app.use(express.json());

app.use(cookieParser());

app.use(
"/uploads",
express.static(
path.join(__dirname, "uploads")
)
);

app.use("/api/auth", authRoutes);
app.use("/api/posts", postsRoutes);
app.use("/api/interacoes", interacoesRoutes);

app.get("/", function (req, res) {

res.json({
    mensagem:
        "API da Feira Tecnológica funcionando!"
});

});

const PORT = 3000;

app.listen(PORT, function () {

console.log(
    `Servidor rodando em http://localhost:${PORT}`
);

});