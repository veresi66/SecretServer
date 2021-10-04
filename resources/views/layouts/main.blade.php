<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SecretServer test site">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/vip.css" />
    <title>SecretServer test page</title>
    <script src="./scripts/jquery.min.js"></script>
    <script src="./scripts/vip.js"></script>
</head>
<body>
    <div id="container">
@yield('content');
        <div class="row">
            <footer class="col-12">
                <!-- Lábléc helye -->
                <p><span>Copyright: Veress Imre, 2021 -</span></p>
            </footer>
        </div>
    </div>
</body>
</html>