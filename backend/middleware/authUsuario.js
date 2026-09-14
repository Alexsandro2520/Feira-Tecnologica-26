const jwt = require("jsonwebtoken");

const SEGREDO = "feira_tecnologica_26";

function autenticarUsuario(req, res, next) {

    const token = req.cookies.usuarioToken;

    if (!token) {
        return res.status(401).json({
            erro: "Usuário não está logado"
        });
    }

    try {

        const usuario = jwt.verify(
            token,
            SEGREDO
        );

        if (usuario.tipo !== "usuario") {
            return res.status(403).json({
                erro: "Acesso permitido somente para usuários"
            });
        }

        req.usuario = usuario;

        next();

    } catch (erro) {

        return res.status(401).json({
            erro: "Sessão expirada"
        });

    }
}

module.exports = autenticarUsuario;