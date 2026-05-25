<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-primary ">LOGIN<i class="fa-solid fa-arrow-right-to-bracket"></i></h1>
                </div>

                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <div class="mb-3">

                            <input type="text" name="username" id="usename" class="form-control" placeholder="USERNAME" required autofocus>
                        </div>
                        <div class="mb-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
                        </div>
                        <div class="row">
                        <div class="col">    
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col  w-75 mx-auto">
                        <button type="submit" class="btn btn-danger btn-sm mt-5">Creat an Account</button>
                        </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</body>

</html>