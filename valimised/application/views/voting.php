
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Hääletamine</h3>


            <div ng-controller="ResultsCtrl">
                <label for="pwd">Piirkonna valik:</label>
                <select class="form-control" id="area">
                    <option value="" style="display:none;"></option>
                    <?php foreach ($areas as $row): ?>
                        <option><?php echo $row->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="pwd">Erakonna valik:</label>
                <select class="form-control" id="party">
                    <option value="" style="display:none;"></option>
                    <?php foreach ($parties as $row): ?>
                        <option><?php echo $row->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="col-sm-8">
                    <div ng-controller="VotingCtrl">
                        <table ng-table="tableParams" class="table table-striped">
                            <tr ng-repeat="candidate in $data" >
                                <td class="col-md-1" data-title="'Kandidaadi number'" sortable="id">{{candidate.id}}</td>
                                <td class="col-md-3" data-title="'Nimi'" sortable="'name'">{{candidate.firstname}} {{candidate.lastname}}</td>
                                <td class="col-md-4" data-title="'Kandideerib erakonnas'" sortable="'party'">{{candidate.party}}</td>
                                <td class="col-md-4" data-tutle="'Anna hääl'"><input class="btn btn-success" type="submit" ng-click="vote({{candidate.id}})" value="Anna hääl"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>