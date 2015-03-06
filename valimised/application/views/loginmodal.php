<div class="modal-header">
</div>
<form class="form-signin" role="form">
    <div class="modal-body">
        <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 text-center">
                    <h3>Olete sisenenud kasutajana</h3>
                    <h2><?= $user_profile['name'] ?></h2>
                    <a href="/valimised/logout" class="btn btn-primary btn-block" role="button">Logi välja</a>
                </div>
            </div>
        <?php else: ?>
            <h2 class="form-signin-heading">Sisene kasutades Facebooki</h2>
            <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Sisene</a>
        <?php endif; ?>   
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" ng-click="ok()">OK</button>
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
    </div>
</form>
</div>