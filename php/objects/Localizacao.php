<?php
/* 
    Lux Andrew
    A classe localiza o usuário pelo ip. Salva os dados no banco de dados.
    Retorna os dados do usuário. E conta o numero de visitas.
*/

// Classe localização do usuário	
class Localizacao
{
    public $ip = "";
    public $city = "";
    public $country = "";
    public $geonameId = "";
    public $lat = "";
    public $lng = "";
    public $postalCode = "";
    public $region = "";

    // Construtor da função chamando o metodo de localização
    public function __construct($ip = null)
    {
        $this->ip = $ip;
    }

    //  Função para pegar a localização por ip do usuário
    public function getLocalizacao($ip = null)
    {
        // Se existir parametro, caso não usará o da classe
        if (isset($ip)) {
            $this->ip = $ip;
        }

        $url = "https://geo.ipify.org/api/v2/country,city?apiKey=at_7cz45jKeCrRQ1P5kTdjpbmR4XtqQj&ipAddress=" . $ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);

        // Inicializa todas as varáveis com o resultado
        $this->city = $result["location"]["city"];
        $this->country = $result["location"]["country"];
        $this->geonameId = $result["location"]["geonameId"];
        $this->lat = $result["location"]["lat"];
        $this->lng = $result["location"]["lng"];
        $this->postalCode = $result["location"]["postalCode"];
        $this->region = $result["location"]["region"];
        // Retorna o objeto com todas as varáveis
        return $this;
    }

    // Função para guardar os dados da classe no banco de dados
    public function save($obj = null)
    {
        global $conexao;
        // Se receber um objeto, ele será usado
        if (is_object($obj)) {
            $obj = $obj;
        } else {
            // Se não receber um objeto, ele será usado o objeto da classe
            $obj = $this;
        }
        // Inicializa a query
        $query = "INSERT INTO `views`(`ip`, `city`, `country`, `geonameId`, `lat`, `lng`, `postalCode`, `region`) VALUES ('" . $obj->ip . "','" . $obj->city . "','" . $obj->country . "','" . $obj->geonameId . "','" . $obj->lat . "','" . $obj->lng . "','" . $obj->postalCode . "','" . $obj->region . "')";
        // Executa a query
        $conexao->query($query);
        // retorna se a ação foi concluída
        return $conexao->affected_rows;
    }

    // Função para pegar os dados do banco de dados
    // Retonará todos os dados ou o dado especificado
    public function get($ip = null)
    {
        global $conexao;
        // Resultado com o oparâmetro
        if (isset($ip)) {
            $query = "SELECT * FROM `views` WHERE `ip`='" . $ip . "'";
        } else {
            // Resultado sem o oparâmetro
            $query = "SELECT * FROM `views`";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Função para contar quantod registros existem no banco de dados
    public function count($ip = null)
    {
        global $conexao;
        // Com oparâmetro
        if (isset($ip)) {
            $query = "SELECT COUNT(*) FROM `views` WHERE `ip`='" . $ip . "'";
        } else {
            // Sem oparâmetro
            $query = "SELECT COUNT(*) FROM `views`";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC)[0]["COUNT(*)"];
    }
}
