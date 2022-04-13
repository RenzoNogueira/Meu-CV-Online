<?php
/* 
    Lux Andrew
    Retorna dados dos clientes, funconalidades e preços.
*/

class Orcamento
{
    public $id_cliente;
    public $cliente;
    public $funcionalidade;
    public $desconto;
    public $preco;
    public $empresa_cliente;
    public $site;
    public $allData = array();

    // Construtor da classe
    // Recebe um id de usuário
    // Chama a função getAll passando o id de usuário
    public function __construct($id_cliente)
    {
        $this->id_cliente = $id_cliente;
        return $this->getAll($this->id_cliente);
    }

    // Função que retorna todos os dados do cliente
    public function getCliente($id_cliente = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_cliente)) {
            $sql = "SELECT * FROM clientes WHERE id = '$id_cliente'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->cliente = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM clientes";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // Função que retorna todos os dados das funções
    public function getFuncionalidades($id_funcionalidade = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_funcionalidade)) {
            $sql = "SELECT * FROM funcionalidades WHERE id = '$id_funcionalidade'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->funcionalidade = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM funcionalidades";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // A função pode receber um id de uma funcionalidade
    public function getPreco($id_funcionalidade = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_funcionalidade)) {
            // Usa a funcionalidade_id
            $sql = "SELECT * FROM preco WHERE funcionalidade_id = '$id_funcionalidade'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->preco = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM preco";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // Função get desconto
    // A função pode recber um id
    public function getDesconto($id_desconto = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_desconto)) {
            // Usa a funcionalidade_id
            $sql = "SELECT * FROM desconto WHERE id = '$id_desconto'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->desconto = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM desconto";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // Função que retorna todos os dados do site do cliente
    public function getSite($id_site = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_site)) {
            // Usa a funcionalidade_id
            $sql = "SELECT * FROM site WHERE id = '$id_site'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->site = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM site";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // Função que retorna todos os dadosda empresa do cliente
    public function empresa_cliente($id_empresa = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_empresa)) {
            // Usa a funcionalidade_id
            $sql = "SELECT * FROM empresa_cliente WHERE id = '$id_empresa'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->empresa_cliente = $result;
            return $result;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM empresa_cliente";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    // Pega todos os dados de todas as tabelas referente ao id do usuário
    // Cria um objeto com os resultados
    // As tabelas são: empresa_cliente, site, desconto.
    public function getAll($id_usuario = null)
    {
        global $conexao;
        // Caso receba busca pelo o id
        if (isset($id_usuario)) {
            // Usa a funcionalidade_id
            $sql = "SELECT * FROM clientes WHERE id = '$id_usuario'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $allData['cliente'] = $result;
            $this->allData['cliente'] = $result;
            $sql = "SELECT * FROM funcionalidades WHERE id = '$id_usuario'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->allData['funcionalidade'] = $result;
            $sql = "SELECT * FROM desconto WHERE id = '$id_usuario'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->allData['desconto'] = $result;
            $sql = "SELECT * FROM site WHERE id = '$id_usuario'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->allData['site'] = $result;
            $sql = "SELECT * FROM empresa_cliente WHERE id = '$id_usuario'";
            $result = $conexao->query($sql);
            $result = $result->fetch_assoc();
            $this->allData['empresa_cliente'] = $result;
            return $this->allData;
        } else {
            // Caso não receba id
            $sql = "SELECT * FROM clientes";
            $result = $conexao->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }
}
