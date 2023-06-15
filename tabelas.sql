DROP DATABASE projetosi;
CREATE DATABASE projetosi;
USE projetosi;

CREATE TABLE fornecedor (
  id_fornecedor int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_fornecedor varchar(200) NOT NULL
);

-- referência (1,N)
CREATE TABLE categoria (
  id_categoria int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_categoria varchar(200) NOT NULL
);

-- referência (1,1)
CREATE TABLE produtos (
  id_produto int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nroproduto int NOT NULL,
  nomeproduto varchar(200) NOT NULL,
  id_categoria int,
  id_fornecedor int,
  quantidade int NOT NULL,
  FOREIGN KEY (id_fornecedor) REFERENCES fornecedor(id_fornecedor) ON DELETE CASCADE,
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria) ON DELETE CASCADE
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
CREATE TABLE venda (
  id_venda int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_produto int,
  id_usuario int,
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`, `status`) VALUES
(1, 'Administrador', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Ativo');