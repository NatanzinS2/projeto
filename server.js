require('dotenv').config();
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');

const app = express();
app.use(express.json()); // Para permitir JSON no body das requisições
app.use(cors()); // Para permitir requisições de outras origens

// Conexão com o MySQL no Railway
const db = mysql.createConnection({
    host: "autorack.proxy.rlwy.net",
    user: "root",
    password: "QPTGNOzdPnHwUzogygKsJtqnlYLJonnV", 
    database: "railway",
    port: 59014
});

// Testa a conexão
db.connect(err => {
    if (err) {
        console.error("Erro ao conectar ao banco:", err);
    } else {
        console.log("Conectado ao MySQL no Railway!");
    }
});

// Rota para salvar os dados no banco
app.post('/register', (req, res) => {
    const { nome, email, telefone, sexo, data_nascimento, cidade, endereco } = req.body;
    const sql = "INSERT INTO usuarios (nome, email, telefone, sexo, data_nasc, cidade, endereco) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    db.query(sql, [nome, email, telefone, sexo, data_nascimento, cidade, endereco], (err, result) => {
        if (err) {
            console.error("Erro ao inserir dados:", err);
            return res.status(500).json({ error: "Erro ao salvar os dados" });
        }
        res.json({ message: "Cadastro realizado com sucesso!" });
    });
});

// Inicia o servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
// Rota para buscar os usuários
app.get('/api/usuarios', (req, res) => {
  const sql = "SELECT * FROM usuarios"; // Seleciona todos os usuários
  db.query(sql, (err, results) => {
      if (err) {
          return res.status(500).json({ error: "Erro ao carregar usuários" });
      }
      res.json(results); // Envia os dados de volta para o frontend
  });
});

