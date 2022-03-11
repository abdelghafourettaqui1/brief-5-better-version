<?php

require_once '../app/core/connection.php';


class user extends Connection
{
    public function getAllflights()
    {
        $sql = "SELECT * FROM flight";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $flight = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $flight[] = $row;
            }
        }
        return $flight;
    }


    public function getpassenger()
    {
        if (empty($_SESSION['iduser'])) {

            header('Refresh: 0; URL=' . URL . ' registers/login');
        }
        $id = $_SESSION['iduser'];
        // echo $id;
        // return;
        $sql = "SELECT * FROM passenger where `iduser`=$id ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $passenger = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $passenger[] = $row;
            }
        }
        return $passenger;
    }

    public function insertpassenger($first, $last, $gender, $age)
    {
        // echo $first , $last ,$gender ,$age; 
        // return;
        if (empty($_SESSION['iduser'])) {

            header('Refresh: 0; URL=' . URL . ' registers/login');
        }
        $id = $_SESSION['iduser'];
        $first = $first;
        $last = $last;
        $gender = $gender;
        $age = $age;
        $this->connect()->query("INSERT INTO `passenger` ( `firstname`, `lastname`, `gender`, `age`, `iduser`) VALUES ( '$first','$last', '$gender', $age ,$id)");
    }


    public function delete($id)
    {
        $ID = $id;
        $this->connect()->query("DELETE FROM passenger WHERE idPassenger=$ID");
    }
    public function update($idPassenger, $firstname, $lastname, $gender, $age)
    {
        $idPassenger = $idPassenger;
        $firstname = $firstname;
        $lastname = $lastname;
        $gender = $gender;
        $age = $age;
        $this->connect()->query("UPDATE `passenger` SET `firstname` = '$firstname', `lastname` = '$lastname' ,`gender` = '$gender' ,`age` = $age   WHERE `passenger`.`idPassenger` =  $idPassenger");
    }
    public function checkplace()
    {
        $idflight = $_SESSION['idflight'];
        // echo $idflight;
        $count = $this->connect()->query("SELECT COUNT(idflight) AS count FROM `booking` WHERE `idflight`=$idflight");
        $seats = $this->connect()->query("SELECT placeNumber FROM `flight` WHERE `id`=$idflight");
        // echo "<pre>";
        $count = $count->fetch_assoc();
        $seats = $seats->fetch_assoc();
        $results = $seats['placeNumber'] - $count['count'];
        return $results;
    }

    public function insertbooking($idpassenger)
    {
        $idflight = $_SESSION['idflight'];
        $idpassenger1 = $idpassenger;
        $iduser = $_SESSION['iduser'];
        $idflight = $_SESSION['idflight'];
        $flightType = $_SESSION['flightType'];

        $this->connect()->query("INSERT INTO `booking` ( `iduser`, `idflight`, `flightType` , `idpassenger`) VALUES ( $iduser , $idflight, '$flightType',$idpassenger1 )");
    }


    public function checkbooking()
    {
        if (empty($_SESSION['iduser'])) {

            header('Refresh: 0; URL=' . URL . ' registers/login');
        }
        $id = $_SESSION['iduser'];
        $data = $this->connect()->query("SELECT flight.*, booking.idbooking ,booking.idflight, booking.iduser , booking.idPassenger , booking.flightType ,p.idpassenger ,p.firstname , p.lastname ,p.iduser FROM flight JOIN booking  ON booking.iduser= $id AND booking.idflight= `id` JOIN `passenger` AS p ON p.iduser = $id  AND p.idPassenger=booking.idPassenger");
        $numRows = $data->num_rows;
        $book = [];
       
            
         
            // die;
    
        if ($numRows > 0) {
            while ($row = $data->fetch_assoc()) {
                if ($row['flightType'] === "One way") {
                    $row['returnDate'] = "0000-00-00";
                }
                
                $book[] = $row;
              
            }
        }


        return $book;
    }

    public function deletebook($id)
    {
        $ID = $id;
        // echo $id;
        // return;
        $this->connect()->query("DELETE FROM booking WHERE idbooking=$ID");
    }
    public function updatebook($idflight, $idpassenger, $idbooking, $flighttype)
    {


        $this->connect()->query("UPDATE `booking` SET `idflight` = $idflight , `idpassenger` = $idpassenger  ,`flighttype` = '$flighttype'  WHERE `idbooking` = $idbooking");
    }
}
