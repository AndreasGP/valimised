<div class="container">

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


    <div class="col-md-2">
        <h3>Otsing</h3>
        <form role="form">
            <div class="form-group">
                <label for="name">Nime järgi:</label>
                <input type="text" class="form-control" ng-model="name" id="name"/>
                <label >Erakonna järgi:</label>
                <select class="form-control" ng-model="party" id="party" onchange="onPartyChange()">
                    <option value="" class="hidden"></option>
                    <?php foreach ($parties as $row): ?>
                        <option><?php echo $row->getName(); ?></option>
                    <?php endforeach; ?>
                </select>

                <label >Piirkonna järgi:</label>
                <select class="form-control" ng-model="area" id="area" onchange="onPartyChange()">
                    <option value="" class="hidden"></option>
                    <?php foreach ($areas as $row): ?>
                        <option><?php echo $row->getName(); ?></option>
                    <?php endforeach; ?>
                </select>


                <br/>
                <div id="myDynamicTable">
                    
                    <button type="button" class="btn btn-lg btn-info pull-left" onclick="addTable()">Otsi</button>
                </div>
            </div>
        </form>
    </div>
</div>