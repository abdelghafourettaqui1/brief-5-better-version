<!DOCTYPE html>
<html lang="en">
<?php 


if( empty($_SESSION['idadmin'])){

     header('location:'.URL.'registers/login');
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
  <a class="navbar-brand" href="<?= URL.'admins/showAllflight'?>"><img src="./../../public/img/logo4.svg" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link fw-bold active" aria-current="page" href="<?= URL.'admins/showAllflight'?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold active "  href="<?= URL.'admins/checkreservation'?>">Reservation</a>
        </li>
      </ul>
      <form class="d-flex" method="post" action="<?= URL ?>admins/logout">
        <button class="btn btn-outline-dark" type="submit">logout</button>
      </form>
    </div>
  </div>
</nav>
    <h1 class="text-center my-4 fw-bold fs-2 ">Flight list</h1>

    
    <div class="container">
    <form   action=" <?= URL ?> admins/showFormadd " method="post" >
        <button type="submit" class=" mx-5 my-5  p-3 mb-2 bg-primary text-white btn btn-outline-primary"> <i  class=" me-2 fa-solid fa-square-plus"></i>Add flight </button>
    </form>     
    <table class="table mx-0 my-5">
        <thead class="table-light">
            <tr>
                <th>ID flight</th>
                <th>Departure place</th>
                <th>Arrival place</th>
                <th>Departure date</th>
                <th>Return Date</th>
                <th>Place number</th>
                <th>Price</th>
                <th>Delete flight</th>
                <th>Edit flight</th>

            </tr>
        </thead>
        <tbody>
            <?php

            ?>
            <?php foreach ($data['admin'] as $datavalue) : ?>
                <tr>
                    <td><?= $datavalue['id']  ?></td>
                    <td><?= $datavalue['departurePlace'] ?></td>
                    <td><?= $datavalue['arrivalPlace']  ?> </td>
                    <td><?= $datavalue['departureDate']  ?></td>
                    <td><?= $datavalue['returnDate'] ?></td>
                    <td><?= $datavalue['placeNumber'] ?></td>
                    <td><?= $datavalue['price'] . "<br>" ?></td>
                    <td>
                        <form action="deleteflight" method="post">
                            <input type="hidden" name='delete' value="<?= $datavalue['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= URL ?>admins/showForm" method="post">
                            <input type="hidden" name='edit' value="<?= $datavalue['id'] ?>">
                            <button type="submit" class="btn btn-outline-success">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
   







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>