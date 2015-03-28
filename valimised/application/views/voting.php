
<div class="container">
    <div class="row">
        <div id="voting" ng-controller="VotingCtrl">
            <h1>Hääletamine</h1>

            <?php if (isset($event) && $event === "muutmine") { ?>
                <div><alert class="text-center" type="info">Te olete juba hääletanud kuupäeval <?php echo $time; ?>. Kui te hääletate uuesti, teie eelmine hääl tühistatakse.</alert></div>
            <?php } ?>
            <div><alert id="success_message" class="text-center" type="success">Teie hääl on edukalt edastatud.</alert></div>
            <div><alert id="fail_message" class="text-center" type="danger">Teie hääle edastamisega oli probleeme. Proovige varsti uuesti.</alert></div>
            <div><alert id="success_message2" class="text-center" type="success">Teie hääl on edukalt tühistatud..</alert></div>
            <div><alert id="fail_message2" class="text-center" type="danger">Teie hääle tühistamisega oli probleeme. Proovige varsti uuesti.</alert></div>

            <h1>Teie valimispiirkond on <?php echo $area->getName(); ?>.</h1>

            <div class="row">
                <div class ="col-md-6">
                    <h2>Kandidaadid</h2>
                    <select size=10 onChange="candidateChanged()" class="form-control" id="candidate">
                        <option value="" style="display:none;"></option>
                        <?php foreach ($candidates as $candidate): ?>
                            <option value="<?php echo $candidate->getId(); ?>"><?php echo $candidate->getId() . ". [" . $candidate->getParty()->getName() . "]: " . $candidate->getUser()->getFullName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class ="col-md-6">
                    <h2>Teie valik</h2>
                    <div id="noSelection">
                        <h3>Palun valige vasakult kandidaat.</h3>
                    </div>
                    <div id="selection">
                        <h3>
                        <br>
                        Kandidaat <label id="candidatename"></label>
                        <br>
                        <br>
                        <label id="candidateparty"></label>
                        </h3>
                        <button type="button" ng-click="vote()" class="btn btn-lg btn-success pull-left">Hääletan kandidaadi poolt</button>
                    </div>
                </div>
            </div>
            <?php if (isset($event) && $event === "muutmine") { ?>
            <h2>Kui soovite tühistada oma viimase antud hääle ilma uut kandidaati valimata, vajutage siia.</h2>
            <button type="button" ng-click="cancelVote()" class="btn btn-lg btn-danger pull-right">Tühistan viimati antud hääle</button>   
            <?php } ?>
        </div>
    </div>
</div>
</div>