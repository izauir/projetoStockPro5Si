drop database projetosi;
create database projetosi;
use projetosi;

CREATE TABLE fornecedor (
  id_fornecedor int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_fornecedor varchar(200) NOT NULL
);

-- referência (1,N)
CREATE TABLE categoria (
  id_categoria int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_categoria varchar(200) NOT NULL
);

CREATE TABLE produtos (
  id_produto int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nroproduto int NOT NULL,
  nomeproduto varchar(200) NOT NULL,
  id_categoria int,
  quantidade int NOT NULL,
  fornecedor varchar(200) NOT NULL,
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE usuarios (
  id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_usuario varchar(200) NOT NULL,
  email_usuario varchar(200) NOT NULL,
  senha_usuario varchar(50) NOT NULL,
  nivel_usuario int NOT NULL,
  status varchar(50) NOT NULL
);

-- referência (N,N)
create table venda (
 id_venda int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 id_produto int,
 id_usuario int,
 FOREIGN KEY (id_produto) REFERENCES produtos(id_produto),
 FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`, `status`) VALUES
(1, 'Administrador', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Ativo');