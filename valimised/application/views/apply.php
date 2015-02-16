<div class="content">
    <div class="col-sm-4" ng-app="formvalidation" ng-controller="stageController">
        
        <form name="form" novalidate ng-submit="submitForm();">
                <label for="firstname">Eesnimi</label>
                <input type="text" name="firstname" ng-model="firstname" required/>
                <div ng-show="form.firstname.$dirty && form.firstname.$invalid">Puudub:
                    <span ng-show="form.firstname.$error.required"> Sisestada eesnimi.</span></div><br>
                <label for="lastname">Perekonnanimi</label>
                <input type="text" placeholder="Perekonnanimi" name="lastname"><br>
                <label for="date">Sünniaeg:</label>
                <input type="date" placeholder="Sünniaeg" name="date"><br>
                <label for="education">Haridus:</label>
                <input type="text" placeholder="Haridus" name="education"><br>
                <label for="job">Töökoht:</label>
                <input type="text" placeholder="Töökoht" name="job"><br>
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
                <textarea rows="10" cols="100" placeholder="">Kirjeldage l&uuml;hidalt oma p&otilde;him&otilde;tteid ning valimisplatvormi.
                </textarea><br>
                <input type="submit" value="Eelvaade">
                <input type="submit" value="Kandideeri">
                <input type="submit" value="Tühista">
        </form>
    </div>
</div>

