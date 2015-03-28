<div class="container">
    <div class="row">
        <div class="col-sm-16">
            <h1>Tulemused</h1>
            <div id="content" ng-controller="ResultsCtrl">

                <!-- Siin töötab -->
                <canvas id="bar" class="chart chart-bar" data="data" labels="labels"></canvas> 
                
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#uldtulemused" data-toggle="tab">Üldtulemused</a></li>
                    <li><a href="#erakonnad" data-toggle="tab">Erakondade tulemused</a></li>
                    <li><a href="#piirkonnad" data-toggle="tab">Piirkondade tulemused</a></li>
                    <li><a href="#kandidaadid" data-toggle="tab">Kandidaatide tulemused</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane" id ="uldtulemused">
                        <!-- Siin ei tahtnud töötada -->
                    </div>

                    <div class="tab-pane" id ="erakonnad">
                    </div>

                    <div class="tab-pane" id ="piirkonnad" >
                        <p>HAHAHA</p>
                    </div>

                    <div class="tab-pane" id ="kandidaadid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#tabs').tab();
        });
    </script> 
</div>
</div>