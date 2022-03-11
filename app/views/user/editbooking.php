<!DOCTYPE html>
<html lang="en">

<?php

if (empty($_SESSION)) {

    header('location:' . URL . 'registers/login');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b5682ff9f5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>flight dream</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL . 'users/index' ?>"><img src="./../../public/img/logo4.svg" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link fw-bold active" aria-current="page" href="<?= URL . 'users/index' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold active " href="<?= URL . 'users/checkreservation' ?>">Reservation</a>
                    </li>
                </ul>
                <form class="d-flex" method="post" action="<?= URL ?>users/logout">
                    <button class="btn btn-outline-dark" type="submit">logout</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="text-center my-4 fw-bold fs-2 "> Edit booking </h1>

    <?php
    // print_r($data['idbooking']);
    ?>
    <div class="container">
        <table class="table mx-0 my-5 table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID flight</th>
                    <th>Departure place</th>
                    <th>Arrival place</th>
                    <th>Departure date</th>
                    <th class="return-date">Return date </th>
                    <th>Price</th>
                    <th>Reserve</th>

                </tr>
            </thead>
            <div class="mx-5 mt-5" method="post">
                <button type="submit" name='one way' class="btn btn-outline-info one-way "> One way</button>
                <button type="submit" name='round-trip' class="btn btn-outline-primary round-trip">Round-trip</button>
            </div>


            <tbody>
                <?php
                //    echo"<pre>";
                //     print_r($data);
                //     return;

                ?>
                <?php foreach ($data['flight'] as $datavalue) : ?>

                    <tr>
                        <td><?= $datavalue['id']  ?></td>
                        <td><?= $datavalue['departurePlace'] ?></td>
                        <td><?= $datavalue['arrivalPlace']  ?> </td>
                        <td><?= $datavalue['departureDate']  ?></td>
                        <td class="return-date"><?= $datavalue['returnDate']  ?></td>
                        <td><?= $datavalue['price']  ?></td>

                        <td>
                            <button type="submit" data-id="<?= $datavalue['id'] ?>" name='reserve' class="btn btn-outline-danger reserve data " id="reservationBtn">Reserve</button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>



    <div class="d-none container passenger " id="passengerR">
        <h1 class="text-center my-4 fw-bold fs-2 "> Your passenger </h1>
        <table class="table mx-0 my-5 table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID passenger </th>

                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Age</th>

                    <th>Validate</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // echo"<pre>";
                // print_r($data);
                // return;
                ?>
                <?php foreach ($data['passenger'] as $datavalue) : ?>
                    <tr>
                        <td><?= $datavalue['idPassenger']  ?></td>
                        <td><?= $datavalue['firstname']  ?> </td>
                        <td><?= $datavalue['lastname']  ?></td>
                        <td><?= $datavalue['gender'] ?></td>
                        <td><?= $datavalue['age'] . "<br>" ?></td>
                        <td>
                            <form action="<?= URL ?>users/editreservation" method="post">
                                <input type="hidden" name='validate' value="<?= $datavalue['idPassenger'] ?>">
                                <input type="hidden" name='ID' class="value" value="">
                                <input type="hidden" name="flightType" class="flightType">
                                <input type="hidden" name='idbooking' value="<?= $data['idbooking'] ?>">
                                <button type="submit" name="valid" class="btn btn-primary">Validate</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>FlightDream
            </h6>
            <p>
              Discounts and Savings Claims
              Discounts and savings claims are based on multiple factors, including searching over 600 airlines to find the lowest available fare. 
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Our partner
            </h6>
            <p>
              <a href="#!" class="text-reset">Singapore Airlines</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Emirates</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Turkish Airlines</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Qatar Airways</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              offres
            </h6>
            <p>
              <a href="#!" class="text-reset">Miles</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Dream</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Honeymoon</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Business travel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Morocco,Safi,4600</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              ettaqui88@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 06 00 13 13 13</p>
            <p><i class="fas fa-print me-3"></i> + 05 00 13 13 13</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">flightdream.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var round_trip = document.querySelector('.round-trip');
        var one_way = document.querySelector('.one-way');
        var return_date = document.querySelectorAll('.return-date');
        let textValue = document.querySelectorAll('#textValue');
        var reserve = document.querySelector('#reservationBtn');
        var passenger = document.getElementById('passengerR');
        const element = document.querySelector('.data');





        var data = document.querySelectorAll('.data');
        data.forEach(function(element) {
            element.addEventListener('click', function() {
                // console.log("hello");
                passenger.classList.remove("d-none")
                passenger.style.display = 'block'
                document.querySelector(".value").value = element.dataset.id;
            })
        });





        round_trip.addEventListener('click', open);

        function open() {
            return_date.forEach(e => {
                e.classList.remove("d-none");
                e.classList.add("d-block");
                document.querySelector(".flightType").value = 1
            });

        }



        one_way.addEventListener('click', close);

        function close() {
            return_date.forEach(e => {
                e.classList.remove("d-block");
                e.classList.add("d-none");
                document.querySelector(".flightType").value = 0;
            });

        }


        //    const hello= document.querySelector(".value").value;
        //    console.log(hello);
    </script>


</body>

</html>