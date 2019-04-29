<?php

/**
 * Description of Produto
 *
 * @author Gabriel Soares
 */
class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $imagemUrl;
    private $preco;
    private $quantidade;
    private $categoria;
    private $idAdm;
    
    function __construct($id, $nome, $descricao, $imagemUrl, $preco, $quantidade, $categoria, $idAdm) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagemUrl = $imagemUrl;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->categoria = $categoria;
        $this->idAdm = $idAdm;
    }

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getImagemUrl() {
        return $this->imagemUrl;
    }

    function getPreco() {
        return $this->preco;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getIdAdm() {
        return $this->idAdm;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setImagemUrl($imagemUrl) {
        $this->imagemUrl = $imagemUrl;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setIdAdm($idAdm) {
        $this->idAdm = $idAdm;
    }


}
