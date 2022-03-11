<?php
class users extends controller
{
  public function index()
  {
    $this->model = $this->model('user');
    $flights = $this->model->getAllflights();
    $this->view('user/userflight', ['user' => $flights]);
  }


  public function showpassenger()
  {
    $this->model = $this->model('user');
    $flights = $this->model->getpassenger();
    $this->view('user/user', ['user' => $flights]);
  }

  public function addpassenger()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $first = $_POST['firstname'];
      $last = $_POST['lastname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $this->model = $this->model('user');
      $this->model->insertpassenger($first, $last, $gender, $age);
      header('Refresh: 0; URL=' . URL . 'users/booking');
    }
  }
  public function deletepassenger()
  { {

      $id = $_POST['delete'];
      $this->model = $this->model('user');
      $this->model->delete($id);
      header('Refresh: 0; URL=' . URL . 'users/booking');
    }
  }
  public function editpassenger()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $idPassenger = $_POST['idPassenger'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $this->model = $this->model('user');
      $this->model->update($idPassenger, $firstname, $lastname, $gender, $age);
      header('Refresh: 0; URL=' . URL . 'users/booking');
    }
  }

  public function showForm()
  {
    if (isset($_POST['edit'])) {
      $this->view('user/editpassenger', ['idPassenger' => $_POST['edit']]);
    }
  }
  public function booking()
  {
    // print_r($_POST['flightType']);
    //   return; 
    $this->model = $this->model('user');
    $flights = $this->model->getpassenger();
    $this->view('user/user', ['user' => $flights]);
    if (isset($_POST['reserve'])) {
      $this->view('user/user', ['id' => $_POST['booking']]);
      $_SESSION['idflight'] = $_POST['booking'];

      if ($_POST['flightType'] == 1) {
        $_SESSION['flightType'] = "Round-trip";
      } elseif ($_POST['flightType'] == 0) {
        $_SESSION['flightType'] = "One way";
      }
    }
  }

  public function validate()
  {
    if (isset($_POST['validate'])) {
      $idpassenger = $_POST['validate'];
      $this->model = $this->model('user');
      $results = $this->model->checkplace();
      if ($results > 0) {
        $this->model = $this->model('user');
        $this->model->insertbooking($idpassenger);
        header('Refresh: 0; URL=' . URL . 'users/booking');
      } else {
        echo '<script> alert("Sorry all the seats are reserved")</script>';
        header('Refresh: 0; URL=' . URL . 'users/index');
      }
    }
  }

  public function checkreservation()
  {
    $this->model = $this->model('user');
    $booking = $this->model->checkbooking();
    $this->view('user/book', ['book' => $booking]);
  }
  public function deletereservation()
  { {
      $id = $_POST['delete'];
      $this->model = $this->model('user');
      $this->model->deletebook($id);
      header('Refresh: 0; URL=' . URL . 'users/checkreservation');
    }
  }
  public function editreservation()
  {

    if (isset($_POST['edit'])) {

      $this->model = $this->model('user');
      $flights = $this->model->getAllflights();
      $passenger = $this->model->getpassenger();
      // echo"<pre>";
      // print_r($passenger);
      // return;
      $this->view('user/editbooking', ['passenger' => $passenger, 'flight' => $flights, 'idbooking' => $_POST['edit']]);
    }
    if (isset($_POST['valid'])) {
      $idflight = $_POST['ID'];

      $idpassenger = $_POST['validate'];
      $idbooking = $_POST['idbooking'];
      $flighttype = $_POST['flightType'];
      if ($flighttype > 0) {
        $flighttype = 'Round trip';
      } elseif ($flighttype == 0) {
        $flighttype = 'One way';
      }
      $data = [
        'flight' => $idflight,
        'passenger' => $idpassenger,
        'booking' => $idbooking,
        'type' => $flighttype
      ];
      // echo "<pre>";
      // print_r( $data);
      // return;
      $this->model = $this->model('user');
      $this->model->updatebook($idflight, $idpassenger, $idbooking, $flighttype);
      header('Refresh: 0; URL=' . URL . ' users/checkreservation');
      
    }
  }
 
  public function logout(){
    session_start();
    unset($_SESSION['iduser']);
    session_destroy();
    header('Refresh: 0; URL=' . URL . ' registers/login');
  } 

}
