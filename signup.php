<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login system using PDO</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="css/signup2.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </head>
    <body>
        <!-- <form action="includes/signup.inc.php" method="post" class="container">
            <div class="col-md-5" style="margin: 150px auto 0 auto;">
                <h1>Sign up</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <input type="submit" name="submit" value="signup" class="btn btn-primary" style="margin-right: 20px;">
                <a href="index.php">GO TO LOGIN</a>
            </div>
        </form> -->
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <!--  Content  -->
        <article>
            <!-- <h1>GROSS DESIGN co. <br /> <span>(Made by <a href="http://mattgross.io" target="_blank">Matt Gross</a>, for <a href="https://evenvision.com">EvenVision</a>)</span></h1> -->
            <form action="includes/signup.inc.php" method="post" class="container">
                <div class="col-md-5" style="margin: 150px auto 0 auto;">
                    <h1 style="color:#fff;text-shadow: 2px 2px #aaa;text-align:center;">Sign up</h1>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:#fff;">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:#fff;">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:#fff;">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:#fff;">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="signup" class="btn btn-primary" style="margin-right: 20px;">
                    <a href="index.php" style="color:#fff;">GO TO LOGIN</a>
                </div>
            </form>
        </article>
        
        <!--  Video is muted & autoplays, placed after major DOM elements for performance & has an image fallback  -->
        <video autoplay loop id="video-background" muted plays-inline>
            <source src="https://player.vimeo.com/external/158148793.hd.mp4?s=8e8741dbee251d5c35a759718d4b0976fbf38b6f&profile_id=119&oauth2_token_id=57447761" type="video/mp4">
        </video>
    </body>
</html>