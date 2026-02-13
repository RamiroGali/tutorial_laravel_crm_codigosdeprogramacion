<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - CRM</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/all.min.js') }}" rel="stylesheet" />
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                            <label for="email">Correo Electrónico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña" />
                                            <label for="password">Contraseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MRoblesDev 2025</div>
                        <div>
                            <a href="https://github.com/mroblesdev">Github</a>
                            &middot;
                            <a href="https://sistemarv.com">Website</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="js/scripts.js"></script> -->
</body>

</html>