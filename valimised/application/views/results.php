<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Tulemused</h3>
            <div ng-app="main" ng-controller="ResultsCtrl">
                <input class="btn btn-info" type="submit" value="�ldtulemused">
                <input class="btn btn-info" type="submit" value="Erakondade tulemused">
                <input class="btn btn-info" type="submit" value="Piirkondade tulemused">
                <input class="btn btn-info" type="submit" value="Kandidaatide tulemused">
                <table ng-table="tableParams" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Kandidaat</th>
                            <th class="col-md-1">Hääli</th>
                            <th class="col-md-2">Erakond</th>
                        </tr>
                    </thead>
                    <tr ng-repeat="vote in $data">
                        <td data-title="'candidate'">{{vote.candidate}}</td>
                        <td data-title="'votes'">{{vote.count}}</td>
                        <td data-title="'party'">{{vote.party}}</td> 
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>