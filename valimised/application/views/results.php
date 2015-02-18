<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Tulemused</h3>
            <div ng-app="main" ng-controller="ResultsCtrl">
                <table ng-table="tableParams" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Kandidaat</th>
                            <th class="col-md-3">Valija</th>
                            <th class="col-md-4">Aeg</th>
                        </tr>
                    </thead>
                    <tr ng-repeat="vote in $data">
                        <td data-title="'candidate'">{{vote.candidate}}</td>
                        <td data-title="'voter'">{{vote.voter}}</td>
                        <td data-title="'date'">{{vote.date}}</td>                    
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>Otsi kandidaati</h3>
            <form role="form">
                <div class="form-group">
                    <label for="name">Nime j�rgi:</label>
                    <input type="text" class="form-control" id="name">
                    <label for="pwd">Erakonna j�rgi:</label>
                    <select class="form-control" id="party">
                        <option value="" style="display:none;"></option>
                        <option>�ksikkandidaat</option>
                        <option>Keskerakond</option>
                        <option>Isamaa ja Res Publica Liit</option>
                        <option>Reformierakond</option>
                        <option>Sotsiaal Demokraadid</option>
                    </select>
                    <label for="area">Piirkonna j�rgi:</label>
                    <select class="form-control" id="area">
                        <option value="" style="display:none;"></option>
                        <option>Tartumaa</option>
                        <option>Rapla ja Harjumaa</option>
                        <option>P�rnumaa</option>
                        <option>L��nemaa</option>
                    </select>
                    <br>
                    <button type="button" class="btn btn-lg btn-info pull-right">Otsi</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>