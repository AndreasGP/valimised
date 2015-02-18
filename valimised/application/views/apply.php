<div class="content">
    <div class="form-group">

        <form name="form" novalidate ng-app="" ng-controller="stageController">

            <label >Eesnimi</label>
            <input type="text" placeholder="Eesnimi" name="firstname" ng-model="firstname" required/>
            <span style="color:red" ng-show="form.firstname.$dirty && form.firstname.$invalid">
                <span ng-show="form.firstname.$error.required"> Sisestada eesnimi.</span></span><br>

            <label>Perekonnanimi</label>
            <input type="text" placeholder="Perekonnanimi" name="lastname" ng-model="lastname" required>
            <span style="color:red" ng-show="form.lastname.$dirty && form.lastname.$invalid">
                <span ng-show="form.lastname.$error.required"> Sisestada perekonnanimi.</span></span><br>

            <label for="date">Sünniaeg:</label>
            <input type="date" placeholder="Sünniaeg" name="date" ng-model="date" required>
            <span style="color:red" ng-show="form.date.$dirty && form.date.$invalid">
                <span ng-show="form.date.$error.required"> Sisestada sünnikuupäev.</span></span><br>

            <label for="education">Haridus:</label>
            <input type="text" placeholder="Haridus" name="education" ng-model="education" required>
            <span style="color:red" ng-show="form.education.$dirty && form.education.$invalid">
                <span ng-show="form.education.$error.required"> Sisestada haridustase.</span></span><br>

            <label for="job">Töökoht:</label>
            <input type="text" placeholder="Töökoht" name="job" ng-model="job" required>
            <span style="color:red" ng-show="form.job.$dirty && form.job.$invalid">
                <span ng-show="form.job.$error.required"> Sisestada amet.</span></span><br>

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
            <input type="file" onchange="readURL(this)"><br>
            <img id="output" src="#" alt="picture"/>

            <textarea rows="10" cols="100" placeholder="">Kirjeldage l&uuml;hidalt oma p&otilde;him&otilde;tteid ning valimisplatvormi.
            </textarea><br>

            <input type="submit" value="Eelvaade">
            <input type="submit" value="Kandideeri">
            <input type="submit" value="Tühista">
        </form>
        <script src="../js/applyform.js"></script>
    </div>
</div>