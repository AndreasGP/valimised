<div class="content">
    <div class="col-sm-4">
        <form role="form">
            <div class="form-group">
                <label for="firstname" style="text-align:right">Eesnimi:</label>
                <input type="text" class="form-control" id="firstname"><br>
                <label for="lastname">Perekonnanimi:</label>
                <input type="text" class="form-control" id="lastname"><br>
                <label for="date">Sünniaeg:</label>
                <input type="date" class="form-control" id="date"><br>
                <label for="education">Haridus:</label>
                <input type="text" class="form-control" id="education"><br>
                <label for="job">Töökoht:</label>
                <input type="text" class="form-control" id="job"><br>
                <label for="area">Piirkond:</label>
                <select class="form-control" id="area">
                    <option value="" style="display:none;"></option>
                    <?php foreach ($areas as $row): ?>
                        <option><?php echo $row->getName(); ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="pwd">Erakond:</label>
                    <select class="form-control" id="party">
                        <option value="" style="display:none;"></option>
                        <?php foreach ($parties as $row): ?>
                            <option><?php echo $row->getName(); ?></option>
                        <?php endforeach; ?>
                    </select><br>
                <label for="pic">Pilt:</label>
                <input type="text" class="form-control" id="pic">
                <input type="submit" value="Vali pilt"><br>
                <textarea rows="10" cols="100">Kirjeldage l&uuml;hidalt oma p&otilde;him&otilde;tteid ning valimisplatvormi.
                </textarea><br>
                
                
            </div>
        </form>
    </div>
</div>

