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

    // Função para contar quantos registros existem no banco de dados
    public function count($ip = null, $period = null)
    {
        global $conexao;
        // Com oparâmetro
        if (isset($ip) && !isset($period)) {
            $query = "SELECT COUNT(*) FROM `views` WHERE `ip`='" . $ip . "'";
        } else if (!isset($period) && isset($ip)) {
            // Sem oparâmetro
            $query = "SELECT COUNT(*) FROM `views`";
        }
        // Caso periodo for igual a today contar todos dados na data de hoje. e assim por diante
        if (isset($period) && $period == "today") {
            $query = "SELECT COUNT(*) FROM `views` WHERE `data_entry`='" . date("Y-m-d") . "'";
        } else if (isset($period) && $period == "yesterday") {
            $query = "SELECT COUNT(*) FROM `views` WHERE `data_entry`='" . date("Y-m-d", strtotime("-1 day")) . "'";
        } else if (isset($period) && $period == "lastWeek") {
            $query = "SELECT COUNT(*) FROM `views` WHERE `data_entry`>='" . date("Y-m-d", strtotime("-7 day")) . "'";
        } else if (isset($period) && $period == "lastMonth") {
            $query = "SELECT COUNT(*) FROM `views` WHERE `data_entry`>='" . date("Y-m-d", strtotime("-30 day")) . "'";
        } else if (isset($period) && $period == "lastYear") {
            $query = "SELECT COUNT(*) FROM `views` WHERE `data_entry`>='" . date("Y-m-d", strtotime("-365 day")) . "'";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC)[0]["COUNT(*)"];
    }

    // Conta quantas visualizações teve por região
    public function countRegion($region = null)
    {
        global $conexao;
        // Com oparâmetro
        if (isset($region)) {
            $query = "SELECT COUNT(*) FROM `views` WHERE `region`='" . $region . "'";
        } else {
            // Sem oparâmetro
            $query = "SELECT COUNT(*) FROM `views`";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC)[0]["COUNT(*)"];
    }

    // Conta quantas visualizações teve por cidade
    public function countCity($city = null)
    {
        global $conexao;
        // Com oparâmetro
        if (isset($city)) {
            $query = "SELECT COUNT(*) FROM `views` WHERE `city`='" . $city . "'";
        } else {
            // Sem oparâmetro
            $query = "SELECT COUNT(*) FROM `views`";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC)[0]["COUNT(*)"];
    }

    // Conta quantas visualizações teve por país
    public function countCountry($country = null)
    {
        global $conexao;
        // Com oparâmetro
        if (isset($country)) {
            $query = "SELECT COUNT(*) FROM `views` WHERE `country`='" . $country . "'";
        } else {
            // Sem oparâmetro
            $query = "SELECT COUNT(*) FROM `views`";
        }
        // Executa a query
        $result = $conexao->query($query);
        // Retorna o resultado
        return $result->fetch_all(MYSQLI_ASSOC)[0]["COUNT(*)"];
    }

    // envia post para localizar a localização da view usando a sua latitude e longitude
    public function getLocation($lat, $lng)
    {
        // Inicializa a url
        $url = "http://api.geonames.org/findNearbyPlaceNameJSON?lat=" . $lat . "&lng=" . $lng . "&username=joseph_silva";
        // Inicializa o cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);

        // Inicializa todas as varáveis com o resultado
        $this->city = $result["address"]["city"];
        $this->country = $result["address"]["countryName"];
        $this->geonameId = $result["address"]["geonameId"];
        $this->lat = $result["address"]["lat"];
        $this->lng = $result["address"]["lng"];
        $this->postalCode = $result["address"]["postalCode"];
        $this->region = $result["address"]["region"];
        // Retorna o objeto com todas as varáveis
        return $this;
    }
}
