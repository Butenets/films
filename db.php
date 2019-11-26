<?php
class connectbd
{
    protected $datab;
    /*Подключаемся к базе*/
    public function __construct($username = "id10232895_admin", $password = "Gfh0km1995", $host = "localhost", $dbname = "id10232895_films")
    {
        try {
            $option = [
                //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->datab = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $username, $password, $option
            );
            echo 'error';
        } catch
        (PDOException $e) {
            throw new Exception($e->getMessage());
            echo 'error';
        }
    }
  
    public function adbase($data)
    {
    $stmt = $this->datab->prepare("INSERT INTO prosmotrennoe (films, date) VALUES (:films, now())");
    $stmt->execute(array( ':films'=>$data[0]));
    }
}

$data[0] = $_POST['film'];
$lil = new connectbd();
$lil->adbase($data);
?>