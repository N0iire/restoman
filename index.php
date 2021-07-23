<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/restoman-icon.png" type="image/x-icon">
    <title>Login Restoman</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="logins.css">
</head>

<body>

    <div id="login">

        <form action="javascript:void(0);" method="POST">
            <div class="top">
                <h2><span class="fontawesome-lock"></span>Restoman Login</h2>
            </div>

            <fieldset style="padding: 20px 40px; justify-content: center;" class="shadow">

                <div class="form">
                    <input type="text" id="email" class="form__input" autocomplete="off" placeholder=" ">
                    <label for="email" class="form__label">Id Pengguna</label>
                </div>

                <div class="form mt-3">
                    <input type="password" id="password" class="form__input" autocomplete="off" placeholder=" ">
                    <label for="email" class="form__label">Password</label>
                </div>

                <div class="form mt-3">
                    <select class="form-select" style="padding-left: 20px;" aria-label="Default select example">
                        <option selected>Masuk Sebagai</option>
                        <option value="owner">Owner</option>
                        <option value="pelayan">Pelayan</option>
                        <option value="koki">Koki</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
                <div class="mt-3" style="margin-left: 85px; justify-content: center;">
                    <input class="grad" type="submit" value="Masuk">
                </div>
            </fieldset>

        </form>

    </div> <!-- end login -->

</body>

<!-- end body -->
<?php include 'footer.php' ?>