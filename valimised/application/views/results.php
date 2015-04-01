<div class="container">
    <div class="row">
        <div class="col-sm-16">
            <h1>Tulemused</h1>
            <div id="content" ng-controller="ResultsCtrl">

                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#erakonnadriik" id="tab1" role="tab" ng-click="switchedToGeneralResults()" data-toggle="tab">Erakonnad riigis</a></li>
                    <li><a href="#kandidaadidriik" id="tab2" role="tab" ng-init="candidategenstat()" ng-click="candidategenstat()" data-toggle="tab">Kandidaadid riigis</a></li>
                    <li><a href="#erakonnad" id="tab3" role="tab" ng-click="partystat()" data-toggle="tab">Kandidaadid erakonnas</a></li>
                    <li><a href="#kandidaadidpiirkond" id="tab4" role="tab" ng-click="candidateareastat()" data-toggle="tab">Kandidaadid piirkonnas</a></li>
                    <li><a href="#erakonnadpiirkond" id="tab5" role="tab" ng-click="partyareastat()" data-toggle="tab">Erakonnad piirkonnas</a></li>

                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id ="erakonnadriik">
                        Test
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="tulemus in data| orderBy:'-number' track by $index">
                                <td class="col-md-3" data-title="'Erakonna Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                            </tr>
                        </table>
                        <canvas id="myChart2" width="400" height="400"></canvas> 
                    </div>

                    <div class="tab-pane" id ="kandidaadidriik">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="kandidaat in candidate| orderBy:'-number' track by $index">
                                <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{kandidaat.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{kandidaat.number}}</td>
                            </tr>
                        </table>
                        <canvas id="myChart2" width="400" height="400"></canvas> 
                    </div>


                    <div class="tab-pane" id ="erakonnad">
                        <div class ="col-md-6">
                            <h2>Erakonnad</h2>
                            <select size=10 onChange="partyChanged()" class="form-control" id="party">
                                <option value="" style="display:none;"></option>
                                <?php foreach ($parties as $party): ?>
                                    <option value="<?php echo $party->getId(); ?>"><?php echo $party->getId() . ". " . $party->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="tulemus in party| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                                </tr>
                            </table>
                            <canvas id="myChart2" width="400" height="400"></canvas> 
                        </div>
                    </div>

                    <div class="tab-pane" id ="erakonnadpiirkond">
                        <div class ="col-md-4">
                            <h2>Piirkonnad</h2>
                            <select size=10 onChange="areaChanged()" class="form-control" id="area">
                                <option value="" style="display:none;"></option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area->getId(); ?>"><?php echo $area->getId() . ". " . $area->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="tulemus in data| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Erakonna Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                                </tr>
                            </table>
                        </div>
                        <canvas id="myChart2" width="400" height="400"></canvas> 
                    </div>


                    <div class="tab-pane" id ="kandidaadidpiirkond">
                        <div class ="col-md-4">
                            <h2>Piirkonnad</h2>
                            <select size=10 onChange="areaChanged()" class="form-control" id="area">
                                <option value="" style="display:none;"></option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area->getId(); ?>"><?php echo $area->getId() . ". " . $area->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="kandidaat in candidate| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{kandidaat.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{kandidaat.number}}</td>
                                </tr>
                            </table>
                        </div>
                        <canvas id="myChart2" width="400" height="400"></canvas> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
                jQuery(document).ready(function () {
        $('#tabs').tab('show');
        });
                // Javascript to enable link to tab
                var hash = document.location.hash;
                var prefix = "tab_";
                if (hash) {
        hash = hash.replace(prefix, '');
                var hashPieces = hash.split('?');
                activeTab = $('.nav-tabs a[href=' + hashPieces[0] + ']');
                activeTab && activeTab.tab('show');
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
        });
                //http://stackoverflow.com/questions/7862233/twitter-bootstrap-tabs-go-to-specific-tab-on-page-reload-or-hyperlink
    </script> 
</div>