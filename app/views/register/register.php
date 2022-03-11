<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>flight dream</title>
</head>

<body>
  <section class="py-5" style=" background-size:cover; background-image: url('https://www.airport-technology.com/wp-content/uploads/sites/14/2022/01/shutterstock_758602234-min-1038x778.jpg');">
    <div class="mask d-flex align-items-center h-100 ">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card pt-1  bg-dark" style="border-radius: 15px;">
              <div class="card-body ">
                <h2 class="text-uppercase text-white text-center mb-5">Create an account</h2>

                <form action="<?= URL ?>registers/info" method="post">

                  <div class="form-outline mb-4">
                    <input name="firstname" type="text" id="form3Example1cg" class="form-control  bg-transparent border border-white   form-control-lg" placeholder="Firstname" />
                  </div>
                  <div class="form-outline mb-4">
                    <input name="lastname" type="text" id="form3Example1cg" class="form-control   bg-transparent border border-white form-control-lg" placeholder="Lastname"  />
                  </div>
                  <div class="form-outline mb-4">
                    <input name="age" type="text" id="form3Example1cg" class="form-control bg-transparent border border-white form-control-lg" placeholder="Your age" />
                    
                  </div>

                  <div class="form-outline mb-4">
                    <input name="email" type="email" id="form3Example3cg" class="form-control bg-transparent  border border-white form-control-lg" placeholder="Your email"/>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="password" type="password" id="form3Example4cg" class="form-control  bg-transparent border border-white form-control-lg" placeholder="Password" />
                  </div>

                  <div class="form-outline mb-4">
                    <input name="repeat" type="password" id="form3Example4cdg" class="form-control bg-transparent border border-white form-control-lg" placeholder="Repeat your password" />
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                    <label class="form-check-label text-white" for="form2Example3g">
                      I agree all statements in <a href="#!" class="text-body "><u class="text-white ">Terms of service</u></a>
                    </label>
                  </div>

                  <form  >
                    <button name="register" type="submit" class="btn btn-outline-light btn-lg px-5" >Register</button>
                  </form>

                  <p class="text-center text-white fw-bold mt-5 mb-0">Have already an account? <a href="<?= URL ?> registers/showlogin" class="fw-bold text-body"><u class="text-white">Login here</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>