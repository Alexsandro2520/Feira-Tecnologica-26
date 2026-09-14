
const jwt = require("jsonwebtoken");

const SEGREDO = "feira_tecnologica_26";

function autenticar(req, res, next) {

    const token = req.cookies.empresaToken;

    if (!token) {
        return res.status(401).json({
            erro: "Empresa não está logada"
        });
    }

    try {

        const empresa = jwt.verify(
            token,
            SEGREDO
        );

        if (empresa.tipo !== "empresa") {
            return res.status(403).json({
                erro: "Acesso permitido somente para empresas"
            });
        }

        req.empresa = empresa;

        next();

    } catch (erro) {

        return res.status(401).json({
            erro: "Sessão da empresa expirada"
        });

    }
}

module.exports = autenticar;

