<?php
class Client
{
    protected $id;
    private $last_name;
    private $name;
    private $middle_name;
    private $birthday;
    private $phone;


    public function __construct($id = 0, $last_name = "", $name = "", $middle_name = "", $birthday = "", $phone = "")
    {
        $this->id = $id;
        $this->last_name = $last_name;
        $this->name = $name;
        $this->middle_name = $middle_name;
        $this->birthday = $birthday;
        $this->phone = $phone;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMiddleName($middle_name)
    {
       $this->middle_name = $middle_name;
    }

    public function getMiddleName()
    {
        return $this->middle_name;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setPhone($phone)
    {
         $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}

//    public function insertData()
//    {
//        try {
//            $isSaved = $connection
//                ->prepare("INSERT INTO client ( last_name, name, middle_name, date_of_birth, phone_number) VALUES (?,?,?,?,?)")
//                ->execute([
//                    $this->last_name,
//                    $this->name,
//                    $this->middle_name,
//                    $this->birthday,
//                    $this->phone
//                ]);
//        } catch (PDOException $error) {
//            return $error->getMessage();
//        }
//    }
//
//
//    public function fetchAll()
//    {
//
//        try {
//            $sql =$this-> connection
//                ->prepare("SELECT * FROM client WHERE deleted_at IS NULL");
//            $sql->execute();
//            return $clients = $sql->fetchAll(PDO::FETCH_OBJ);
//        } catch (PDOException $error) {
//            return "<br> {$error->getMessage()}";
//        }
//    }
//
//    public function fetchOne()
//    {
//        try {
//            $sql = $connection->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
//            $sql->execute(['client_id' => $this->id]);
//            $client = $sql->fetch(PDO::FETCH_OBJ);
//        } catch (PDOException $error) {
//            die("Oops... something went wrong! Please try later. Details: {$error->getMessage()}");
//        }
//
//    }
//
//
//    public function update()
//    {
//        try {
//            if (!empty($id)) {
//                $sql = $connection->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
//                $sql->execute(['client_id' => $id]);
//                $client = $sql->fetchObject();
//            }
//        } catch (PDOException $error) {
//            echo "Oops... something went wrong! Please try later. Details: {$error->getMessage()}";
//        }
//    }




//$client1 = new Client();
//$client1->last_name = 'Bogdanov';
//$client1->name = "Alex";
//$client1->middle_name = 'Buninovich';
//$client1->birthday = '22.04.1992';
//$client1->phone = '0930039993';
////var_dump($client1);
//echo $client1->name;

