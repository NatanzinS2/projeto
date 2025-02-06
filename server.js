require("dotenv").config();
const express = require("express");
const mysql = require("mysql2");
const cors = require("cors");

const app = express();
app.use(express.json());
app.use(cors()); // Permite o frontend acessar o backend

// 🔹 Configuração da Conexão com o MySQL
const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
  port: process.env.DB_PORT,
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0,
});

// 🔹 Testando conexão com o Banco
pool.getConnection((err, connection) => {
  if (err) {
    console.error("❌ Erro ao conectar ao MySQL:", err);
    return;
  }
  console.log("✅ Conexão bem-sucedida ao MySQL!");
  connection.release();
});

// 🔹 Rota para receber os dados do formulário e salvar no banco
app.post("/registrar", (req, res) => {
  const { nome, email, telefone, sexo, data_nascimento, cidade, endereco } = req.body;

  if (!nome || !email || !telefone) {
    return res.status(400).json({ error: "Todos os campos são obrigatórios!" });
  }

  const sql =
    "INSERT INTO usuarios (nome, email, telefone, sexo, data_nasc, cidade, endereco) VALUES (?, ?, ?, ?, ?, ?, ?)";
  const values = [nome, email, telefone, sexo, data_nascimento, cidade, endereco];

  pool.query(sql, values, (err, result) => {
    if (err) {
      console.error("❌ Erro ao inserir no banco:", err);
      return res.status(500).json({ error: "Erro no servidor" });
    }
    console.log("✅ Usuário cadastrado com sucesso!");
    res.json({ success: true, message: "Cadastro realizado com sucesso!" });
  });
});

// 🔹 Rota para pegar os usuários cadastrados (opcional)
app.get("/usuarios", (req, res) => {
  pool.query("SELECT * FROM usuarios", (err, results) => {
    if (err) {
      return res.status(500).json({ error: "Erro no servidor" });
    }
    res.json(results);
  });
});

// 🔹 Inicia o servidor
const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
  console.log(`🚀 Servidor rodando na porta ${PORT}`);
});
