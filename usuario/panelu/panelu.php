<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <link rel="icon" type="image/x-icon" href="..\..\imagenes\CULTURA1.png">
  <title>CC Siglo XXI - Panel de Administración</title>
  <link rel="stylesheet" href="../../css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de que quieres Cerrar Sesion?")
      if (question !="0"){
          top.location = miurl;   }
    }
    </script>
</head>
<body style="background-color:#231c16">

    <section class="w-100">
            <div>
                <div class="card position-absolute bg-black text-white w-100 z-n1">
                    <img src="..\..\imagenes\teatro.jpg" class="bg-img w-100" />
                    <div class="card-img-overlay text-light justify-content-center flex-column text-center pt-0 pt-lg-5" style="background-color: rgba(0, 0, 0, 0.5)">
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <img class="col-5 " src="https://http.cat/status/501.jpg" alt="Not Implemented">
            </div>

            <div class="row">
                <div class="d-flex w-100 justify-content-center">
                    <a id="filtrocartelera" class="btn btn-danger mt-2 ms-2 fw-bold" href="" onClick="confirma('../logout.php'); return false;" title='Cerrar Sesion'><i class="bi bi-x-circle-fill"></i>&nbsp;Cerrar Sesion</a>
                </div>
            </div>
    </section>