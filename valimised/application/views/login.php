<style type="text/css">
    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading{
        padding-bottom: 10px;
        margin-bottom: 20px;
        border-bottom: 1px #ccc dotted;
        text-align: center;
    }
    .form-signin .footer{
        padding-top: 10px;
        margin-top: 20px;
        border-top: 1px #ccc dotted;
        font-weight: 600;
    }
    .fa {
        color: #cc0000;
    }
    </style>
    <div class="container">

        <form class="form-signin" role="form">
            <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                        <h2><?=$user_profile['name']?></h2>
                        <a href="<?=$user_profile['link']?>" class="btn btn-lg btn-default btn-block" role="button">View Profile</a>
                        <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <h2 class="form-signin-heading">Sisene kasutades Facebooki</h2>
                <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Sisene</a>
            <?php endif; ?>       
            </div>
        </form>
    
    </div>