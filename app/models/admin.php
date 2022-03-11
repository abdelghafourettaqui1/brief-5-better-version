<?php

require_once '../app/core/connection.php';

class admin extends Connection
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

    public function insertFlight($departurePlace, $arrivalPlace, $departureDate, $returnDate, $placeNumber, $price)
    {
        $departure = $departurePlace;
        $arrival = $arrivalPlace;
        $date = $departureDate;
        $returnDate = $returnDate;
  
        $sets = $placeNumber;
        $p = $price;
        // $info=$this->connect()->prepare("INSERT INTO `flight` (`departurePlace`, `arrivalPlace`, `departureDate`, `passengerNumber`,`placeNumber`, `price`) VALUES (?, ?, ?, ?, ?, ?)");
        // $info->bind_param('sssiii',$departure,$arrival,$date,$passenger,$sets,$p);
        // $info->execute(); 
        $this->connect()->query("INSERT INTO `flight` ( `departurePlace`, `arrivalPlace`, `departureDate`, `returnDate`, `placeNumber`, `price`) VALUES ( '$departure','$arrival', '$date', '$returnDate', $sets, $p)");
    }

    public function delete($id)
    {
        $ID = $id;
        $this->connect()->query("DELETE FROM flight WHERE ID=$ID");
    }
    public function update($id, $departurePlace, $arrivalPlace, $departureDate, $returnDate, $placeNumber, $price)
    {
        $ID = $id;
        $departure = $departurePlace;
        $arrival = $arrivalPlace;
        $date = $departureDate;
        $returnDate = $returnDate;
        $sets = $placeNumber;
        $p = $price;
        $this->connect()->query("UPDATE flight SET departurePlace ='$departure' , arrivalPlace='$arrival' , departureDate='$date',returnDate='$returnDate',placeNumber= $sets ,price= $p WHERE ID = $ID ");
    }

    public function checkbooking()
    {
       
        $data=$this->connect()->query("SELECT flight.*, booking.idbooking ,booking.idflight, booking.iduser , booking.idPassenger , booking.flightType ,p.idpassenger ,p.firstname , p.lastname ,p.iduser FROM flight JOIN booking  ON  booking.idflight= `id` JOIN `passenger` AS p ON  p.idPassenger=booking.idPassenger");
        $numRows = $data->num_rows;
        $book = [];
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
}
