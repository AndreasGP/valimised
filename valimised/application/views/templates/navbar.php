<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/valimised">E-valimised 2015</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="/valimised/tulemused">Tulemused</a></li>
                <li><a href="/valimised/kandidaadid">Kandidaadid</a></li>
                <li><a href="/valimised/kandideerimine">Kandideerimine</a></li>
                <li><a href="/valimised/haaletamine">Hääletamine</a></li>

                <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
                    <li><a ng-controller="LoginModalCtrl" ng-click="open()"><?= $user_profile['name'] ?></a></li>
                <?php else: ?>
                    <li><a id="ngLogin" ng-controller="LoginModalCtrl" ng-click="open()">Sisene Facebookiga</a></li>
                <?php endif; ?> 
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>