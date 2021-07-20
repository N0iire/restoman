<?php include 'header.php' ?>

<body>
    <div class="wrapper">
        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <form class="form-horizontal">
                            <span class="heading">Log In</span>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email or Username">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group help">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                <i class="fa fa-lock"></i>
                                <a href="#" class="fa fa-question-circle"></a>
                            </div>
                            <div class="form-group">
                                <div class="main-checkbox">
                                    <input type="checkbox" value="None" id="checkbox1" name="check">
                                    <label for="checkbox1"></label>
                                </div>
                                <span class="text">Remember me</span>
                                <button type="submit" class="btn btn-default">log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end body -->
    <?php include 'footer.php' ?>