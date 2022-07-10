<?php include "top.php"?>
<main>
        <div class="login ">
            <div class="mb-5 fw-bold text-uppercase text-center">
                <h3>Administrator Login </h3>
                <hr>
            </div>

            <div class="container-fluid ">
                <form name="form1" method="post" action="checklogin.php" onsubmit="return loginValidate(this)"
                    enctype="multipart/form-data">
                    <label for="form-label fw-bold">Username/Email :</label>
                        <input type="email" name="myusername" class="form-control "
                            id="myusername"><br>

                    <label for="form-label fw-bold">Password
                                :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="password" name="mypassword" class="form-control"
                            id="mypassword">


                    <div class="forget"><a href="#">Forgot password?</a></div>
                    <span><input class="" type="checkbox" value="" id="" />
                        <label class="mb-3" for=""> Remember me </label></span>
                    <br>
                    <input type="submit" name="Submit" value="Login" class="btn btn-primary btn-block mb-3"><br>
                    Not yet registered? <a href="registeracc.php"><strong>Register Here</strong></a>
            </div>
            </form>

        </div>
        </div>
    </main>
<?php include "bottom.php"?>