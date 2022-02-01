<?php
$message = '';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'true':
                $message = '<div class="alert alert-success" role="alert">
                            CPF VÁLIDO !!!
                            </div>';
            break;
            case 'false':
                $message = '<div class="alert alert-danger" role="alert">
                            CPF INVÁLIDO !!!
                            </div>';
            break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Validação CPF</title>
</head>
<body>
    <div class="container-fluid p-0 m-0">
       <header class="bg-primary shadow p-3 d-flex justify-content-between align-items-center">
           <h1 class="text-light">VALIDAÇÃO DE CPF</h1>
           <a class="m-0" href="https://www.4devs.com.br/gerador_de_cpf" target="__blank"><p class="text-light m-0">GERAR CPF</p></a>
       </header>
    </div>
    <div class="container-fluid bg-green">
    <?=$message?>
        <form action="validar.php" method="post">
            <div class="container mt-5 w-50">
                <label for="cpf" class="form-label">CPF:</label>
                <input name="cpf" type="text" class="form-control" id="cpf" placeholder="___.___.___-__">
                <div class="d-flex justify-content-center p-3">
                    <button class="btn btn-primary btn-lg" type="submit">CONSULTAR</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>