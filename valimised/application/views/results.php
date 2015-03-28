<div class="container">
    <div class="row">
        <div class="col-sm-16">
            <h1>Tulemused</h1>
            <div id="content" ng-controller="ResultsCtrl">

                <!-- Siin töötab -->


                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#uldtulemused" id="tab1" role="tab" data-toggle="tab">Üldtulemused</a></li>
                    <li><a href="#erakonnad" id="tab2" role="tab" ng-click="partystat()" data-toggle="tab">Erakondade tulemused</a></li>
                    <li><a href="#piirkonnad" id="tab3" role="tab" ng-click="areastat()" data-toggle="tab">Piirkondade tulemused</a></li>
                    <li><a href="#kandidaadid" id="tab4" role="tab" ng-click="candidatestat()" data-toggle="tab">Kandidaatide tulemused</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id ="uldtulemused">
                           
                        <canvas id="myChart1" width="400" height="400"></canvas>
                    </div>

                    <div class="tab-pane" id ="erakonnad">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="tulemus in data| orderBy:'-number'">
                                <td class="col-md-3" data-title="'Erakonna Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                            </tr>
                        </table>
                        <canvas id="myChart2" width="400" height="400"></canvas> 
                    </div>

                    <div class="tab-pane" id ="piirkonnad" >
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="piirkond in areas| orderBy:'-number'">
                                <td class="col-md-3" data-title="'Piirkonna Nimi'" sortable="'party'">{{piirkond.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{piirkond.number}}</td>
                            </tr>
                        </table>
                        <canvas id="myChart3" width="400" height="400"></canvas> 
                    </div>

                    <div class="tab-pane" id ="kandidaadid">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="kandidaat in candidates| orderBy:'-number'">
                                <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{kandidaat.firstname}} {{kandidaat.lastname}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{kandidaat.number}}</td>
                            </tr>
                        </table>
                        <canvas id="myChart4" width="400" height="400"></canvas>
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