const express = require("express");
const jwt = require("jsonwebtoken");
const banco = require("../db");

const router = express.Router();
const SEGREDO = "feira_tecnologica_26";

function identificarConta(req) {
    const empresaToken = req.cookies.empresaToken;
    const usuarioToken = req.cookies.usuarioToken;

    if (empresaToken) {
        try {
            const empresa = jwt.verify(empresaToken, SEGREDO);
            if (empresa.tipo === "empresa") {
                return { tipo: "empresa", id: empresa.id };
            }
        } catch (erro) {}
    }

    if (usuarioToken) {
        try {
            const usuario = jwt.verify(usuarioToken, SEGREDO);
            if (usuario.tipo === "usuario") {
                return { tipo: "usuario", id: usuario.id };
            }
        } catch (erro) {}
    }

    return null;
}

router.post("/like", async function (req, res) {
    const conta = identificarConta(req);

    if (!conta) {
        return res.status(401).json({ erro: "Você precisa estar logado para curtir" });
    }

    const { post_id } = req.body;

    if (!post_id) {
        return res.status(400).json({ erro: "Publicação não informada" });
    }

    try {
        let existente;

        if (conta.tipo === "usuario") {
            [existente] = await banco.promise().query(
                `SELECT id FROM likes WHERE post_id = ? AND usuario_id = ?`,
                [post_id, conta.id]
            );
        } else {
            [existente] = await banco.promise().query(
                `SELECT id FROM likes WHERE post_id = ? AND empresa_id = ?`,
                [post_id, conta.id]
            );
        }

        if (existente.length > 0) {
            if (conta.tipo === "usuario") {
                await banco.promise().query(
                    `DELETE FROM likes WHERE post_id = ? AND usuario_id = ?`,
                    [post_id, conta.id]
                );
            } else {
                await banco.promise().query(
                    `DELETE FROM likes WHERE post_id = ? AND empresa_id = ?`,
                    [post_id, conta.id]
                );
            }
            return res.json({ curtido: false });
        }

        if (conta.tipo === "usuario") {
            await banco.promise().query(
                `INSERT INTO likes (post_id, usuario_id, empresa_id) VALUES (?, ?, NULL)`,
                [post_id, conta.id]
            );
        } else {
            await banco.promise().query(
                `INSERT INTO likes (post_id, usuario_id, empresa_id) VALUES (?, NULL, ?)`,
                [post_id, conta.id]
            );
        }

        res.json({ curtido: true });
    } catch (erro) {
        console.log(erro);
        res.status(500).json({ erro: "Erro ao alterar curtida" });
    }
});

router.post("/comentario", async function (req, res) {
    const conta = identificarConta(req);

    if (!conta) {
        return res.status(401).json({ erro: "Você precisa estar logado para comentar" });
    }

    const { post_id, comentario } = req.body;

    if (!post_id || !comentario) {
        return res.status(400).json({ erro: "Preencha o comentário" });
    }

    if (comentario.trim().length > 500) {
        return res.status(400).json({ erro: "O comentário pode ter no máximo 500 caracteres" });
    }

    try {
        if (conta.tipo === "usuario") {
            await banco.promise().query(
                `INSERT INTO comentarios (post_id, usuario_id, empresa_id, comentario) VALUES (?, ?, NULL, ?)`,
                [post_id, conta.id, comentario.trim()]
            );
        } else {
            await banco.promise().query(
                `INSERT INTO comentarios (post_id, usuario_id, empresa_id, comentario) VALUES (?, NULL, ?, ?)`,
                [post_id, conta.id, comentario.trim()]
            );
        }

        res.status(201).json({ mensagem: "Comentário publicado" });
    } catch (erro) {
        console.log(erro);
        res.status(500).json({ erro: "Erro ao publicar comentário" });
    }
});

router.put("/comentario/:id", async function (req, res) {
    const conta = identificarConta(req);

    if (!conta) {
        return res.status(401).json({ erro: "Você precisa estar logado" });
    }

    const comentarioId = req.params.id;
    const { comentario } = req.body;

    if (!comentario) {
        return res.status(400).json({ erro: "O comentário não pode ficar vazio" });
    }

    if (comentario.trim().length > 500) {
        return res.status(400).json({ erro: "O comentário pode ter no máximo 500 caracteres" });
    }

    try {
        let comentarios;

        if (conta.tipo === "usuario") {
            [comentarios] = await banco.promise().query(
                `SELECT id FROM comentarios WHERE id = ? AND usuario_id = ?`,
                [comentarioId, conta.id]
            );
        } else {
            [comentarios] = await banco.promise().query(
                `SELECT id FROM comentarios WHERE id = ? AND empresa_id = ?`,
                [comentarioId, conta.id]
            );
        }

        if (comentarios.length === 0) {
            return res.status(403).json({ erro: "Você não pode editar este comentário" });
        }

        await banco.promise().query(
            `UPDATE comentarios SET comentario = ? WHERE id = ?`,
            [comentario.trim(), comentarioId]
        );

        res.json({ mensagem: "Comentário editado com sucesso" });
    } catch (erro) {
        console.log(erro);
        res.status(500).json({ erro: "Erro ao editar comentário" });
    }
});

router.delete("/comentario/:id", async function (req, res) {
    const conta = identificarConta(req);

    if (!conta) {
        return res.status(401).json({ erro: "Você precisa estar logado" });
    }

    const comentarioId = req.params.id;

    try {
        let comentarios;

        if (conta.tipo === "usuario") {
            [comentarios] = await banco.promise().query(
                `SELECT id FROM comentarios WHERE id = ? AND usuario_id = ?`,
                [comentarioId, conta.id]
            );
        } else {
            [comentarios] = await banco.promise().query(
                `SELECT id FROM comentarios WHERE id = ? AND empresa_id = ?`,
                [comentarioId, conta.id]
            );
        }

        if (comentarios.length === 0) {
            return res.status(403).json({ erro: "Você não pode excluir este comentário" });
        }

        await banco.promise().query(
            `DELETE FROM comentarios WHERE id = ?`,
            [comentarioId]
        );

        res.json({ mensagem: "Comentário excluído com sucesso" });
    } catch (erro) {
        console.log(erro);
        res.status(500).json({ erro: "Erro ao excluir comentário" });
    }
});

module.exports = router;