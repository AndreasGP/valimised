<div class="container">
    <div class="form-group">

        <form name="form" class="form-horizontal" novalidate ng-app="formvalidation" ng-controller="stageController">

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Eesnimi:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Eesnimi" name="firstname" ng-model="firstname" required/>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.firstname.$dirty && form.firstname.$invalid">
                            <span ng-show="form.firstname.$error.required"> Sisestada eesnimi.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Perekonnanimi:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Perekonnanimi" name="lastname" ng-model="lastname" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.lastname.$dirty && form.lastname.$invalid">
                            <span ng-show="form.lastname.$error.required"> Sisestada perekonnanimi.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="date">Sünniaeg:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="date" placeholder="Sünniaeg" name="date" ng-model="date" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.date.$dirty && form.date.$invalid">
                            <span ng-show="form.date.$error.required"> Sisestada sünnikuupäev.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="education">Haridus:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Haridus" name="education" ng-model="education" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.education.$dirty && form.education.$invalid">
                            <span ng-show="form.education.$error.required"> Sisestada haridustase.</span></span>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="job">Töökoht:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Töökoht" name="job" ng-model="job" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.job.$dirty && form.job.$invalid">
                            <span ng-show="form.job.$error.required"> Sisestada amet.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="area">Piirkond:</label>
                        <div class="col-xs-7">
                            <select class="form-control" id="area">
                                <option value="" style="display:none;"></option>
                                <?php foreach ($areas as $row): ?>
                                    <option><?php echo $row->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="pwd">Erakond:</label>
                        <div class="col-xs-7">
                            <select class="form-control" id="party">
                                <option value="" style="display:none;"></option>
                                <?php foreach ($parties as $row): ?>
                                    <option><?php echo $row->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class=""form-group">
                         <label class="control-label col-xs-3" for="pic">Pilt:</label>
                        <div class="col-xs-7">
                            <input class="file" type="file" onchange="readURL(this)">
                            <input id="input-1" type="file" class="file">
                            <img id="output" src="#" alt="picture"/>
                        </div>
                    </div>

                </div>
            </div>

            <label class="control-label" for="description">Kirjeldage lühidalt oma põhimõtteid ning valimisplatvormi.</label>
            <br>
            <textarea class="form-control" rows="6" cols="100">
            </textarea>
            <br>
                <div class="pull-right">
                <input class="btn btn-info" type="submit" value="Eelvaade">
                <input class="btn btn-success" type="submit" value="Kandideeri">
                <input class="btn btn-danger" type="submit" value="Tühista">
            </div>
        </form> 
    </div>
</div>
