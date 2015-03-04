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
                <li><a href="/valimised/abi">Abi</a></li>
                <li><a href="/valimised/tulemused">Valimistulemused</a></li>
                <li><a href="/valimised/kandidaadid">Kandidaadid</a></li>
                <li><a href="/valimised/kandideerimine">Kandideerimine</a></li>
                <li><a href="/valimised/haaletamine">Hääletamine</a></li>

                <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $user_profile['name'] ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" ng-controller="LoginModalCtrl" ng-click="open()">Logi välja</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sisene portaali<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">ID-kaart</a></li>
                            <li><a href="#">Mobiil ID</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Sisene panga kaudu</li>
                            <li><a href="#">Swedbank</a></li>
                            <li><a href="#">SEB</a></li>
                            <li><a href="#">Danske pank</a></li>
                            <li><a href="#">Nordea pank</a></li>
                            <li><a href="#">Krediidipank</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Sisene sotsiaalmeedia kaudu</li>
                            <li><a id="ngLogin" ng-controller="LoginModalCtrl" ng-click="open()">Facebook</a></li>
                            <li><a href="google">Google</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?> 
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>