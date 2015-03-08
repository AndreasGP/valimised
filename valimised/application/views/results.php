<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Tulemused</h3>
            
            
            <div ng-controller="ResultsCtrl">
                
                <input class="btn btn-info" type="submit" value="Üldtulemused">
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
                        <td data-title="'candidate'" sortable="'candidate'">{{vote.candidate}}</td>
                        <td data-title="'votes'" sortable="'count'">{{vote.votes}}</td>
                        <td data-title="'party'" sortable="'party'">{{vote.party}}</td> 
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>