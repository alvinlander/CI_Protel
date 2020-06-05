<div class="lgn">
    <div id="login">
    
        <div class="container float-xl-right" style="width: 65%;">
            <div id="login-row" class="row justify-content-center align-items-center">
            <div class="col-md-6 mt-5" >
            <h1 style="font-family: Impact, Charcoal, sans-serif; color: #f7fff7; font-size: 80px;">Trip<br>Application</h1></div>
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?= site_url('login/signin')?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <center>
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>