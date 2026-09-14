const express = require("express");
const multer = require("multer");
const path = require("path");
const fs = require("fs");
const banco = require("../db");
const autenticar = require("../middleware/auth");

const router = express.Router();

const pastaUploads = path.join(__dirname, "..", "uploads");

if (!fs.existsSync(pastaUploads)) {
  fs.mkdirSync(pastaUploads, { recursive: true });
}

const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, pastaUploads);
  },
  filename: function (req, file, cb) {
    const extensao = path.extname(file.originalname).toLowerCase();
    cb(
      null,
      Date.now() + "-" + Math.round(Math.random() * 1000000000) + extensao
    );
  }
});

const upload = multer({
  storage: storage,
  limits: {
    fileSize: 5 * 1024 * 1024
  },
  fileFilter: function (req, file, cb) {
    const extensoes = [".jpg", ".jpeg", ".png", ".webp", ".gif"];
    const extensao = path.extname(file.originalname).toLowerCase();

    if (!extensoes.includes(extensao)) {
      return cb(
        new Error("Imagem inválida. Use JPG, JPEG, PNG, WEBP ou GIF.")
      );
    }

    cb(null, true);
  }
});

// Criar publicação
router.post("/", autenticar, upload.single("imagem"), async function (req, res) {
  const { tipo, titulo, descricao, data_evento } = req.body;

  if (!tipo || !titulo || !descricao) {
    return res.status(400).json({
      erro: "Preencha todos os campos obrigatórios"
    });
  }

  if (tipo !== "noticia" && tipo !== "evento") {
    return res.status(400).json({
      erro: "Tipo inválido"
    });
  }

  if (tipo === "evento" && !data_evento) {
    return res.status(400).json({
      erro: "Informe a data do evento"
    });
  }

  try {
    const imagem = req.file ? req.file.filename : null;

    const [resultado] = await banco.promise().query(
      `INSERT INTO posts (
        empresa_id,
        tipo,
        titulo,
        descricao,
        imagem,
        data_evento
      )
      VALUES (?, ?, ?, ?, ?, ?)`,
      [
        req.empresa.id,
        tipo,
        titulo,
        descricao,
        imagem,
        tipo === "evento" ? data_evento : null
      ]
    );

    res.status(201).json({
      mensagem: "Publicação criada com sucesso",
      id: resultado.insertId
    });
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao criar publicação"
    });
  }
});

// Listar todas as publicações (com filtro opcional por tipo)
router.get("/", async function (req, res) {
  const tipo = req.query.tipo;

  try {
    let sql = `SELECT
        p.id,
        p.tipo,
        p.titulo,
        p.descricao,
        p.imagem,
        p.data_evento,
        p.criado_em,
        p.atualizado_em,
        e.nome AS empresa_nome,

        (
          SELECT COUNT(*)
          FROM likes l
          WHERE l.post_id = p.id
        ) AS total_likes,

        (
          SELECT COUNT(*)
          FROM comentarios c
          WHERE c.post_id = p.id
        ) AS total_comentarios

      FROM posts p

      INNER JOIN empresas e
        ON e.id = p.empresa_id`;

    const valores = [];

    if (tipo) {
      sql += ` WHERE p.tipo = ?`;
      valores.push(tipo);
    }

    sql += ` ORDER BY p.criado_em DESC`;

    const [posts] = await banco.promise().query(sql, valores);

    res.json(posts);
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao buscar publicações"
    });
  }
});

// Listar publicações da empresa autenticada
router.get("/minhas", autenticar, async function (req, res) {
  try {
    const [posts] = await banco.promise().query(
      `SELECT
        p.id,
        p.tipo,
        p.titulo,
        p.descricao,
        p.imagem,
        p.data_evento,
        p.criado_em,
        p.atualizado_em,

        (
          SELECT COUNT(*)
          FROM likes l
          WHERE l.post_id = p.id
        ) AS total_likes,

        (
          SELECT COUNT(*)
          FROM comentarios c
          WHERE c.post_id = p.id
        ) AS total_comentarios

      FROM posts p

      WHERE p.empresa_id = ?

      ORDER BY p.criado_em DESC`,
      [req.empresa.id]
    );

    res.json(posts);
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao buscar suas publicações"
    });
  }
});

// Buscar publicação específica por ID
router.get("/:id", async function (req, res) {
  try {
    const [posts] = await banco.promise().query(
      `SELECT
        p.id,
        p.tipo,
        p.titulo,
        p.descricao,
        p.imagem,
        p.data_evento,
        p.criado_em,
        p.atualizado_em,
        e.nome AS empresa_nome,

        (
          SELECT COUNT(*)
          FROM likes l
          WHERE l.post_id = p.id
        ) AS total_likes

      FROM posts p

      INNER JOIN empresas e
        ON e.id = p.empresa_id

      WHERE p.id = ?`,
      [req.params.id]
    );

    if (posts.length === 0) {
      return res.status(404).json({
        erro: "Publicação não encontrada"
      });
    }

    const [comentarios] = await banco.promise().query(
      `SELECT
        c.id,
        c.usuario_id,
        c.empresa_id,
        c.comentario,
        c.criado_em,
        c.atualizado_em,
        u.nome AS usuario_nome,
        e.nome AS empresa_nome

      FROM comentarios c

      LEFT JOIN usuarios u
        ON u.id = c.usuario_id

      LEFT JOIN empresas e
        ON e.id = c.empresa_id

      WHERE c.post_id = ?

      ORDER BY c.criado_em DESC`,
      [req.params.id]
    );

    res.json({
      post: posts[0],
      comentarios: comentarios
    });
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao buscar publicação"
    });
  }
});

// Editar publicação por ID
router.put("/:id", autenticar, upload.single("imagem"), async function (req, res) {
  const { tipo, titulo, descricao, data_evento } = req.body;

  if (!tipo || !titulo || !descricao) {
    return res.status(400).json({
      erro: "Preencha todos os campos obrigatórios"
    });
  }

  if (tipo === "evento" && !data_evento) {
    return res.status(400).json({
      erro: "Informe a data do evento"
    });
  }

  try {
    const [posts] = await banco.promise().query(
      `SELECT imagem FROM posts WHERE id = ? AND empresa_id = ?`,
      [req.params.id, req.empresa.id]
    );

    if (posts.length === 0) {
      return res.status(404).json({
        erro: "Publicação não encontrada"
      });
    }

    let imagem = posts[0].imagem;

    if (req.file) {
      imagem = req.file.filename;
    }

    await banco.promise().query(
      `UPDATE posts
       SET
        tipo = ?,
        titulo = ?,
        descricao = ?,
        imagem = ?,
        data_evento = ?
       WHERE id = ? AND empresa_id = ?`,
      [
        tipo,
        titulo,
        descricao,
        imagem,
        tipo === "evento" ? data_evento : null,
        req.params.id,
        req.empresa.id
      ]
    );

    res.json({
      mensagem: "Publicação atualizada com sucesso"
    });
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao editar publicação"
    });
  }
});

// Excluir publicação por ID
router.delete("/:id", autenticar, async function (req, res) {
  try {
    const [resultado] = await banco.promise().query(
      `DELETE FROM posts WHERE id = ? AND empresa_id = ?`,
      [req.params.id, req.empresa.id]
    );

    if (resultado.affectedRows === 0) {
      return res.status(404).json({
        erro: "Publicação não encontrada"
      });
    }

    res.json({
      mensagem: "Publicação excluída com sucesso"
    });
  } catch (erro) {
    console.log(erro);
    res.status(500).json({
      erro: "Erro ao excluir publicação"
    });
  }
});

module.exports = router;