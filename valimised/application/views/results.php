<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <button type="button" class="btn btn-lg btn-default">Üldtulemused</button>
            <h3>Valimistulemused</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Kandidaadi number</th>
                        <th class="col-md-3">Nimi</th>
                        <th class="col-md-4">Kandideerib erakonnas</th>
                        <th class="col-md-4">Piirkond</th>
                    </tr>
                </thead>
                <tr>
                    <td>315</td>
                    <td>Lehm Vissi</td>
                    <td>Rahvaerakond</td>
                    <td>Tartumaa</td>
                </tr>
                <tr>
                    <td>316</td>
                    <td>Lehm Roosike</td>
                    <td>Rahvaerakond</td>
                    <td>Tartumaa</td>
                </tr>
                <tr>
                    <td>317</td>
                    <td>Lehm Vissi</td>
                    <td>Rahvaerakond</td>
                    <td>Tartumaa</td>
                </tr>
            </table>
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