# Como iniciar o projeto

## 1. Colocar o projeto no XAMPP

Copie a pasta do projeto para:

C:\xampp\htdocs\

Por exemplo:

C:\xampp\htdocs\Feira-Tecnologica-26-main

---

## 2. Iniciar o XAMPP

Abra o XAMPP Control Panel.

Inicie:

- Apache
- MySQL

Os dois precisam estar funcionando.

---

## 3. Criar o banco de dados

Abra o navegador e acesse:

http://localhost/phpmyadmin

No phpMyAdmin, clique em "SQL".

Importe o banco de dados que esta junto ao projeto

O banco utilizado pelo projeto é:

feira_tecnologica

As tabelas utilizadas são:

- empresas
- usuarios
- posts
- likes
- comentarios



---

## 4. Entrar na pasta do backend

Abra o CMD ou terminal do VScode.

Entre na pasta do projeto:

cd C:\xampp\htdocs\Feira-Tecnologica-26-main

Depois entre na pasta backend:

cd backend

---

## 5. Instalar as dependências

Dentro da pasta backend, execute:

npm install

Esse comando instala as dependências necessárias para o funcionamento da API.

O comando `npm install` precisa ser executado somente quando as dependências ainda não estiverem instaladas.

---

## 6. Iniciar o servidor

Ainda dentro da pasta backend, execute:

npm start

Se estiver tudo certo, aparecerá algo parecido com:

Servidor rodando em http://localhost:3000
MySQL conectado!

Não feche o terminal enquanto estiver utilizando o sistema.

---

## 7. Abrir o site

Com o Apache, MySQL e Node.js funcionando, abra no navegador:

http://localhost/

---

## 8. Testar a API

Para verificar se o servidor Node.js está funcionando, acesse:

http://localhost:3000/

A mensagem esperada é:

API da Feira Tecnológica funcionando!

---

## Ordem para iniciar o projeto

1. Abrir o XAMPP
2. Iniciar o Apache
3. Iniciar o MySQL
4. Abrir o CMD
5. Entrar na pasta do projeto
6. Executar `cd backend`
7. Executar `npm install` na primeira configuração
8. Executar `npm start`
9. Abrir http://localhost/

---

