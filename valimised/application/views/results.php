<div class="container">
    <div class="row">
        <div class="col-sm-16">
            <h1>Tulemused</h1>
            <div id="content" ng-controller="ResultsCtrl">

                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#erakonnadriik" showtab="" id="tab1" role="tab" ng-click="switchedToGeneralResults()" data-toggle="tab">Erakonnad riigis</a></li>
                    <li><a href="#kandidaadidriik" showtab="" id="tab2" role="tab" ng-init="candidategenstat()" ng-click="candidategenstat()" data-toggle="tab">Kandidaadid riigis</a></li>
                    <li><a href="#erakonnad" showtab="" id="tab3" role="tab" ng-click="partystat()" data-toggle="tab">Kandidaadid erakonnas</a></li>
                    <li><a href="#kandidaadidpiirkond" showtab="" id="tab4" role="tab" ng-click="candidateareastat()" data-toggle="tab">Kandidaadid piirkonnas</a></li>
                    <li><a href="#erakonnadpiirkond" showtab="" id="tab5" role="tab" ng-click="partyareastat()" data-toggle="tab">Erakonnad piirkonnas</a></li>

                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id ="erakonnadriik">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="tulemus in data| orderBy:'-number' track by $index">
                                <td class="col-md-3" data-title="'Erakonna Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                            </tr>
                        </table>
                        
                    </div>

                    <div class="tab-pane" id ="kandidaadidriik">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="kandidaat in candidate| orderBy:'-number' track by $index">
                                <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{kandidaat.name}}</td>
                                <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{kandidaat.number}}</td>
                            </tr>
                        </table>
                        
                    </div>


                    <div class="tab-pane" id ="erakonnad">
                        <div class ="col-md-6">
                            <h2>Erakonnad</h2>
                            <select size="10" onChange="partyChanged()" class="form-control" id="party">
                                <option value="" class="hidden"></option>
                                <?php foreach ($parties as $party): ?>
                                    <option value="<?php echo $party->getId(); ?>"><?php echo $party->getId() . ". " . $party->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <label id="partyname"></label>
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="tulemus in party| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                                </tr>
                            </table>
                             
                        </div>
                    </div>

                    <div class="tab-pane" id ="erakonnadpiirkond">
                        <div class ="col-md-4">
                            <h2>Piirkonnad</h2>
                            <select size="10" onChange="areaChanged()" class="form-control" id="area">
                                <option value="" class="hidden"></option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area->getId(); ?>"><?php echo $area->getId() . ". " . $area->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <label id="areaname"></label>
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="tulemus in data| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Erakonna Nimi'" sortable="'party'">{{tulemus.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{tulemus.number}}</td>
                                </tr>
                            </table>
                        </div>
                         
                    </div>


                    <div class="tab-pane" id ="kandidaadidpiirkond">
                        <div class ="col-md-4">
                            <h2>Piirkonnad</h2>
                            <select size="10" onChange="areaChanged()" class="form-control" id="candidatearea">
                                <option value="" class="hidden"></option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area->getId(); ?>"><?php echo $area->getId() . ". " . $area->getName(); ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class ="col-md-6">
                            <label id="candidateareaname"></label>
                            <table ng-table="tableParams" class="table table-striped">
                                <tr ng-repeat="kandidaat in candidate| orderBy:'-number' track by $index">
                                    <td class="col-md-3" data-title="'Kandidaadi Nimi'" sortable="'party'">{{kandidaat.name}}</td>
                                    <td class="col-md-4" data-title="'Häälte arv'" sortable="'votes'">{{kandidaat.number}}</td>
                                </tr>
                            </table>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>