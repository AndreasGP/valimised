<div class="container">
    <div class="row">
        <div class="col-sm-16">
            <h3>Tulemused</h3>


            <div id="content">

                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#uldtulemused" data-toggle="tab">Üldtulemused</a></li>
                    <li><a href="#erakonnad" data-toggle="tab">Erakondade tulemused</a></li>
                    <li><a href="#piirkonnad" data-toggle="tab">Piirkondade tulemused</a></li>
                    <li><a href="#kandidaadid" data-toggle="tab">Kandidaatide tulemused</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane" id ="uldtulemus" ng-controller="ResultsCtrl">
                        <table ng-table="tableParams" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Kandidaat</th>
                                    <th class="col-md-1">Hääli</th>
                                    <th class="col-md-2">Erakond</th>
                                </tr>
                            </thead>
                            <tr ng-repeat="vote in $data">
                                <td data-title="'candidate'" sortable="'candidate'">{{vote.candidate}}</td>
                                <td data-title="'votes'" sortable="'count'">{{vote.votes}}</td>
                                <td data-title="'party'" sortable="'party'">{{vote.party}}</td> 
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane" id ="erakonnad">
                        <canvas id="Chart" class="chart chart-pie chart-xs" data="data" labels="labels"></canvas>
                    </div>

                    <div class="tab-pane" id ="piirkonnad" >
                        <p>HAHAHA</p>
                    </div>

                    <div class="tab-pane" id ="kandidaadid" ng-controller="ResultsCtrl">
                        <table ng-table="tableParams" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Kandidaat</th>
                                    <th class="col-md-1">Hääli</th>
                                    <th class="col-md-2">Erakond</th>
                                </tr>
                            </thead>
                            <tr ng-repeat="vote in $data | orderBy:'-votes'">
                                <td  >{{vote.candidate}}</td>
                                <td >{{vote.votes}}</td>
                                <td >{{vote.party}}</td> 
                            </tr>
                        </table>
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