<?php include 'header.php' ?>

<body>

    <div id="login">



        <form action="javascript:void(0);" method="POST">
            <div class="top">
                <h2><span class="fontawesome-lock"></span>Login Restoman</h2>
            </div>

            <fieldset class="shadow">

                <div class="form">
                    <input type="text" id="email" class="form__input" autocomplete="off" placeholder=" ">
                    <label for="email" class="form__label">Username</label>
                </div>

                <div class="form mt-1">
                    <input type="password" id="password" class="form__input" autocomplete="off" placeholder=" ">
                    <label for="email" class="form__label">Password</label>
                </div>

                <div class="form mt-1">
                    <select class="form-select" style="padding-left: 20px;" aria-label="Default select example">
                        <option selected>Masuk Sebagai</option>
                        <option value="owner">Owner</option>
                        <option value="pelayan">Pelayan</option>
                        <option value="koki">Koki</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
                <div class="mt-1" style="margin-left: 100px;">
                    <button class="custom-btn btn-3" type="submit" value="Masuk"><span>Masuk</span> </button>
                </div>


            </fieldset>

        </form>

    </div> <!-- end login -->

</body>

<!-- end body -->
<?php include 'footer.php' ?>