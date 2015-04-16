<div class="container">

    <div class=""row">
         <div class="col-sm-10 col-sm-offset-2">  
            <h2>Kandidaadid</h2>
            <h3><strong><?php echo $area ?></strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <h3>Otsing</h3>
            <form role="form">
                <div class="form-group">
                    <label for="name">Nime järgi:</label>
                    <input type="text" class="form-control" ng-model="name" id="name">
                    <label for="pwd">Erakonna järgi:</label>
                    <select class="form-control" ng-model="party" id="party" onchange="onPartyChange()">
                        <option value="" style="display:none;"></option>
                        <?php foreach ($parties as $row): ?>
                            <option><?php echo $row->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button type="button" class="btn btn-lg btn-info pull-left">Otsi</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div ng-init="areaid = '<?php echo $areaid ?>'" ng-controller="CandidatesCtrl">
                <table ng-table="tableParams" class="table table-striped">
                    <tr ng-repeat="candidate in $data | filter:name | filter:party " ng-click="candidatePage({{candidate.id}})">
                        <td class="col-xs-1" data-title="'Nr'" sortable="id">{{candidate.id}}</td>
                        <td class="col-xs-3" data-title="'Nimi'" sortable="'name'"><a href='/valimised/kandidaat/nr/{{candidate.id}}'>{{candidate.firstname}} {{candidate.lastname}}</a></td>
                        <td class="col-xs-4" data-title="'Kandideerib erakonnas'" sortable="'party'"><a href='/valimised/kandidaat/nr/{{candidate.id}}'>{{candidate.party}}</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>