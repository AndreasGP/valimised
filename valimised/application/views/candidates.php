<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Kandidaadid</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">Kandidaadi number</th>
                        <th class="col-md-3">Nimi</th>
                        <th class="col-md-4">Kandideerib erakonnas</th>
                        <th class="col-md-4">Piirkond</th>
                    </tr>
                </thead>
                <?php foreach ($candidates as $row): ?>
                <tr>
                    <td><?php echo $row->getId(); ?></td>
                    <td><?php echo $row->getUser()->getFullName(); ?></td> 
                    <td><?php echo $row->getParty()->getName(); ?></td>
                    <td><?php echo $row->getArea()->getName(); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

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
