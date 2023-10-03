<?
class Prediction
{
    private $db;

    public function __construct($db_host, $db_name, $db_user, $db_password)
    {
        try {
            $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    function getPrediction($rowCount) {
        try {
            
            $query = "SELECT * FROM predicitions WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array($rowCount));
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);;
        } catch (PDOException $e) {
            die("Ошибка выполнения запроса: " . $e->getMessage());
        }
    }
}

$prediction = new Prediction("localhost", "predicition", "root", "");
$answer = $prediction->getPrediction(rand(1, 479));
echo ($answer[0]['content']);