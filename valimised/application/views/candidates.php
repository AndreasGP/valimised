<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Kandidaadid</h3>
            <div ng-controller="CandidatesCtrl">
                <table ng-table="tableParams" class="table table-striped">
                    <tr ng-repeat="candidate in $data" onclick="candidatePage({{candidate.id}})">
                        <td class="col-md-1" data-title="'Kandidaadi number'" sortable="id">{{candidate.id}}</td>
                        <td class="col-md-3" data-title="'Nimi'" sortable="'name'">{{candidate.name}}</td>
                        <td class="col-md-4" data-title="'Kandideerib erakonnas'" sortable="'party'">{{candidate.party}}</td>
                        <td class="col-md-4" data-title="'Kandideerimispiirkond'" sortable="'area'">{{candidate.area}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>Otsi kandidaati</h3>
            <form role="form">
                <div class="form-group">
                    <label for="name">Nime järgi:</label>
                    <input type="text" class="form-control" id="name">
                    <label for="pwd">Erakonna järgi:</label>
                    <select class="form-control" id="party">
                        <option value="" style="display:none;"></option>
                        <?php foreach ($parties as $row): ?>
                            <option><?php echo $row->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="area">Piirkonna järgi:</label>
                    <select class="form-control" id="area">
                        <option value="" style="display:none;"></option>
                        <?php foreach ($areas as $row): ?>
                            <option><?php echo $row->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button type="button" class="btn btn-lg btn-info pull-right">Otsi</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>