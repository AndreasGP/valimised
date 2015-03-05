<div class="modal-header">
    <h3 class="modal-title">SIIA MINGI PEALKIRI</h3>
</div>
<form class="form-signin" role="form">
    <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?= $user_profile['id'] ?>/picture?type=large" style="width: 140px; height: 140px;">
                <h3>Olete sisenenud kasutajana</h3>
                <h2><?= $user_profile['name'] ?></h2>
                <a href="/valimised/logout" class="btn btn-primary btn-block" role="button">Logi välja</a>
            </div>
        </div>
    <?php else: ?>
        <h2 class="form-signin-heading">Sisene kasutades Facebooki</h2>
        <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Sisene</a>
    <?php endif; ?>    
    <div class="modal-footer">
        <button class="btn btn-primary" ng-click="ok()">OK</button>
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
    </div>
</form>
</div>