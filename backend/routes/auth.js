const express = require("express");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const banco = require("../db");
const autenticarUsuario = require("../middleware/authUsuario");

const router = express.Router();

const SEGREDO = "feira_tecnologica_26";

function verificarSessaoAtiva(req) {

const empresaToken =
    req.cookies.empresaToken;

const usuarioToken =
    req.cookies.usuarioToken;


if (empresaToken) {

    try {

        const empresa =
            jwt.verify(
                empresaToken,
                SEGREDO
            );

        if (empresa.tipo === "empresa") {

            return {
                ativa: true,
                tipo: "empresa"
            };

        }

    } catch (erro) {
    }

}


if (usuarioToken) {

    try {

        const usuario =
            jwt.verify(
                usuarioToken,
                SEGREDO
            );

        if (usuario.tipo === "usuario") {

            return {
                ativa: true,
                tipo: "usuario"
            };

        }

    } catch (erro) {
    }

}


return {
    ativa: false
};

}

/* VERIFICAR SESSÃO ATIVA */

router.get(
"/sessao",
function (req, res) {

    const sessao =
        verificarSessaoAtiva(req);

    res.json(sessao);

}

);

/* CADASTRO DE EMPRESA */

router.post(
"/cadastro",
async function (req, res) {

    const sessao =
        verificarSessaoAtiva(req);


    if (sessao.ativa) {

        return res.status(403).json({
            erro:
                "Já existe uma conta ativa. Saia da conta atual para continuar."
        });

    }


    const {
        nome,
        email,
        senha
    } = req.body;


    if (!nome || !email || !senha) {

        return res.status(400).json({
            erro:
                "Preencha todos os campos"
        });

    }


    try {

        const [resultado] =
            await banco.promise().query(
                "SELECT id FROM empresas WHERE email = ?",
                [email]
            );


        if (resultado.length > 0) {

            return res.status(400).json({
                erro:
                    "Este email já está cadastrado"
            });

        }


        const senhaCriptografada =
            await bcrypt.hash(
                senha,
                10
            );


        await banco.promise().query(
            `INSERT INTO empresas
            (nome, email, senha)
            VALUES (?, ?, ?)`,
            [
                nome,
                email,
                senhaCriptografada
            ]
        );


        res.status(201).json({
            mensagem:
                "Empresa cadastrada com sucesso"
        });


    } catch (erro) {

        console.log(erro);

        res.status(500).json({
            erro:
                "Erro ao cadastrar empresa"
        });

    }

}

);

/* LOGIN DE EMPRESA */

router.post(
"/login",
async function (req, res) {

    const sessao =
        verificarSessaoAtiva(req);


    if (sessao.ativa) {

        return res.status(403).json({
            erro:
                "Já existe uma conta ativa. Saia da conta atual para entrar em outra."
        });

    }


    const {
        email,
        senha
    } = req.body;


    if (!email || !senha) {

        return res.status(400).json({
            erro:
                "Informe email e senha"
        });

    }


    try {

        const [empresas] =
            await banco.promise().query(
                "SELECT * FROM empresas WHERE email = ?",
                [email]
            );


        if (empresas.length === 0) {

            return res.status(401).json({
                erro:
                    "Email ou senha incorretos"
            });

        }


        const empresa =
            empresas[0];


        const senhaCorreta =
            await bcrypt.compare(
                senha,
                empresa.senha
            );


        if (!senhaCorreta) {

            return res.status(401).json({
                erro:
                    "Email ou senha incorretos"
            });

        }


        const token =
            jwt.sign(
                {
                    id: empresa.id,
                    nome: empresa.nome,
                    email: empresa.email,
                    tipo: "empresa"
                },
                SEGREDO,
                {
                    expiresIn: "2h"
                }
            );


        res.cookie(
            "empresaToken",
            token,
            {
                httpOnly: true,
                maxAge:
                    2 * 60 * 60 * 1000,
                sameSite: "lax",
                secure: false
            }
        );


        res.json({
            mensagem:
                "Login realizado com sucesso",

            empresa: {
                id: empresa.id,
                nome: empresa.nome,
                email: empresa.email
            }
        });


    } catch (erro) {

        console.log(erro);

        res.status(500).json({
            erro:
                "Erro ao fazer login"
        });

    }

}

);

/* LOGOUT */

router.post(
"/logout",
function (req, res) {

    res.clearCookie(
        "empresaToken",
        {
            httpOnly: true,
            sameSite: "lax",
            secure: false
        }
    );

    res.clearCookie(
        "usuarioToken",
        {
            httpOnly: true,
            sameSite: "lax",
            secure: false
        }
    );


    res.json({
        mensagem:
            "Logout realizado com sucesso"
    });

}

);

/* CADASTRO DE USUÁRIO */

router.post(
"/usuario/cadastro",
async function (req, res) {

    const sessao =
        verificarSessaoAtiva(req);


    if (sessao.ativa) {

        return res.status(403).json({
            erro:
                "Já existe uma conta ativa. Saia da conta atual para continuar."
        });

    }


    const {
        nome,
        email,
        senha
    } = req.body;


    if (!nome || !email || !senha) {

        return res.status(400).json({
            erro:
                "Preencha todos os campos"
        });

    }


    try {

        const [resultado] =
            await banco.promise().query(
                "SELECT id FROM usuarios WHERE email = ?",
                [email]
            );


        if (resultado.length > 0) {

            return res.status(400).json({
                erro:
                    "Este email já está cadastrado"
            });

        }


        const senhaCriptografada =
            await bcrypt.hash(
                senha,
                10
            );


        await banco.promise().query(
            `INSERT INTO usuarios
            (nome, email, senha)
            VALUES (?, ?, ?)`,
            [
                nome,
                email,
                senhaCriptografada
            ]
        );


        res.status(201).json({
            mensagem:
                "Conta criada com sucesso"
        });


    } catch (erro) {

        console.log(erro);

        res.status(500).json({
            erro:
                "Erro ao criar conta"
        });

    }

}

);

/* LOGIN DE USUÁRIO */

router.post(
"/usuario/login",
async function (req, res) {

    const sessao =
        verificarSessaoAtiva(req);


    if (sessao.ativa) {

        return res.status(403).json({
            erro:
                "Já existe uma conta ativa. Saia da conta atual para entrar em outra."
        });

    }


    const {
        email,
        senha
    } = req.body;


    if (!email || !senha) {

        return res.status(400).json({
            erro:
                "Informe email e senha"
        });

    }


    try {

        const [usuarios] =
            await banco.promise().query(
                "SELECT * FROM usuarios WHERE email = ?",
                [email]
            );


        if (usuarios.length === 0) {

            return res.status(401).json({
                erro:
                    "Email ou senha incorretos"
            });

        }


        const usuario =
            usuarios[0];


        const senhaCorreta =
            await bcrypt.compare(
                senha,
                usuario.senha
            );


        if (!senhaCorreta) {

            return res.status(401).json({
                erro:
                    "Email ou senha incorretos"
            });

        }


        const token =
            jwt.sign(
                {
                    id: usuario.id,
                    nome: usuario.nome,
                    email: usuario.email,
                    tipo: "usuario"
                },
                SEGREDO,
                {
                    expiresIn: "30d"
                }
            );


        res.cookie(
            "usuarioToken",
            token,
            {
                httpOnly: true,
                maxAge:
                    30 * 24 * 60 * 60 * 1000,
                sameSite: "lax",
                secure: false
            }
        );


        res.json({
            mensagem:
                "Login realizado com sucesso",

            usuario: {
                id: usuario.id,
                nome: usuario.nome,
                email: usuario.email
            }
        });


    } catch (erro) {

        console.log(erro);

        res.status(500).json({
            erro:
                "Erro ao fazer login"
        });

    }

}

);

/* VERIFICAR USUÁRIO LOGADO */

router.get(
"/usuario/me",
autenticarUsuario,
function (req, res) {

    res.json({
        usuario: {
            id: req.usuario.id,
            nome: req.usuario.nome,
            email: req.usuario.email
        }
    });

}

);

/* LOGOUT */

router.post(
"/usuario/logout",
function (req, res) {

    res.clearCookie(
        "usuarioToken",
        {
            httpOnly: true,
            sameSite: "lax",
            secure: false
        }
    );

    res.clearCookie(
        "empresaToken",
        {
            httpOnly: true,
            sameSite: "lax",
            secure: false
        }
    );


    res.json({
        mensagem:
            "Logout realizado com sucesso"
    });

}

);

module.exports = router;