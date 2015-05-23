<div class="container">
    <div class="row">
        <div class="col-md-12" ng-controller="CandidateAreaCtrl">
            <div class="col-md-4">
                <h3>Otsing</h3>
                <form role="form">
                    <div class="form-group">
                        <label for="name">Nime järgi:</label>
                        <input type="text" class="form-control" ng-model="name" id="name"/>
                        <label >Erakonna järgi:</label>
                        <select class="form-control" ng-model="party" id="party">
                            <option value="" class="hidden"></option>
                            <?php foreach ($parties as $row): ?>
                                <option value="<?php echo $row->getId(); ?>"><?php echo $row->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label >Piirkonna järgi:</label>
                        <select class="form-control" ng-model="area" id="area">
                            <option value="" class="hidden"></option>
                            <?php foreach ($areas as $row): ?>
                                <option value="<?php echo $row->getId(); ?>"><?php echo $row->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <button type="button" class="btn btn-lg btn-info pull-right" ng-click="search(area, party, name)">Otsi</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table ng-table="tableParams"  id="searchTable" class="table table-striped">
                    <tr ng-repeat="candidate in $data">
                        <td class="col-xs-1" data-title="'Number'" sortable="id">{{candidate.id}}</td>
                        <td class="col-xs-3" data-title="'Nimi'" sortable="'name'"><a href='/valimised/kandidaat/nr/{{candidate.id}}'>{{candidate.firstname}} {{candidate.lastname}}</a></td>
                        <td class="col-xs-4" data-title="'Kandideerib erakonnas'" sortable="'party'"><a href='/valimised/kandidaat/nr/{{candidate.id}}'>{{candidate.party}}</a></td>
                        <td class="col-xs-4" data-title="'Kandideerib piirkonnas'" sortable="'piirkond'"><a href='/valimised/kandidaat/nr/{{candidate.id}}'>{{candidate.area}}</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-12">
            <h2>Vali piirkond</h2>
            <div>
                <h3><a href="kandidaadid/1">Tallinna Mustamäe ja Nõmme linnaosa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/11">Tallinna Kesklinna, Lasnamäe ja Pirita linnaosa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/12">Tallinna Mustamäe ja Nõmme linnaosa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/2">Tartu linn</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/3">Harju- ja Raplamaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/4">Hiiu-, Lääne- ja Saaremaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/5">Ida-Virumaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/6">Jõgeva- ja Tartumaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/7">Järva- ja Viljandimaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/8">Lääne-Virumaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/9">Pärnumaa</a></h3>  
            </div>
            <div>
                <h3><a href="kandidaadid/10">Võru-, Valga- ja Põlvamaa</a></h3>  
            </div>
        </div>
    </div>
</div>