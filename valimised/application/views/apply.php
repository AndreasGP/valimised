<div class="container">
    <div class="form-group">

        <form name="form" class="form-horizontal" novalidate ng-controller="stageController">

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Eesnimi:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" id="firstname" placeholder="Eesnimi" name="firstname" ng-model="user.firstname" value="<?php echo $firstname ?>" required/>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.firstname.$dirty && form.firstname.$invalid">
                            <span ng-show="form.firstname.$error.required"> Sisestada eesnimi.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Perekonnanimi:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Perekonnanimi" name="lastname" ng-model="user.lastname" value="<?php echo $lastname ?>" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.lastname.$dirty && form.lastname.$invalid">
                            <span ng-show="form.lastname.$error.required"> Sisestada perekonnanimi.</span></span>
                    </div>

                    <div class="form-group" onload="populatedropdown(daydropdown, monthdropdown, yeardropdown)">
                        <label class="control-label col-xs-3" for="date">Sünniaeg:</label>
                        <div class="col-xs-3">
                            <select class="selectpicker" data-width="110%" id="yeardropdown" onchange="onYearChange()" ng-model="user.year" name="year" required>
                            </select> 
                        </div>
                        <div class="col-xs-2">
                            <select class="selectpicker" data-width="110%"  id="monthdropdown" onchange="onMonthChange()" ng-model="user.month" name="month" required>
                            </select> 
                        </div>
                        <div class="col-xs-2">
                            <select class="selectpicker" data-width="110%" id="daydropdown" ng-model="user.day" name="day"required>
                            </select> 
                        </div>

                        <span class="col-xs-2" style="color:red" 
                              ng-show="form.year.$dirty && form.year.$invalid && form.month.$dirty && form.month.$invalid &&
                                                      form.day.$dirty && form.day.$invalid">
                            <span ng-show="form.year.$error.required && form.month.$error.required && form.day.$error.required"> 
                                Valige sünnikuupäev.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="education">Haridus:</label>
                        <div class="col-xs-7">
                            <select class="form-control" id="education" ng-model="user.education" name="education" required>
                                <option value="" style="display:none;"></option>
                                <?php foreach ($educations as $row): ?>
                                    <option><?php echo $row->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="col-xs-2" style="color:red" 
                              ng-show="form.education.$dirty && form.education.$invalid">
                            <span ng-show="form.education.$error.required">Valige haridustase.</span></span>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="job">Töökoht:</label>
                        <div class="col-xs-7">
                            <input class="form-control" type="text" placeholder="Töökoht" name="job" ng-model="user.job" required>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.job.$dirty && form.job.$invalid">
                            <span ng-show="form.job.$error.required"> Sisestada amet.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="area">Piirkond:</label>
                        <div class="col-xs-7">
                            <select class="form-control" id="area" ng-model="user.area" name="area" required>
                                <option value="" style="display:none;"></option>
                                <?php foreach ($areas as $row): ?>
                                    <option><?php echo $row->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="col-xs-2" style="color:red" 
                              ng-show="form.area.$dirty && form.area.$invalid">
                            <span ng-show="form.area.$error.required">Valige piirkond.</span></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="pwd">Erakond:</label>
                        <div class="col-xs-7">
                            <select class="form-control" id="party" ng-model="user.party" required>
                                <option value="" style="display:none;"></option>
                                <?php foreach ($parties as $row): ?>
                                    <option><?php echo $row->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="col-xs-2" style="color:red" ng-show="form.party.$dirty && form.party.$invalid">
                            <span ng-show="form.party.$error.required"> Valige erakond.</span></span>
                    </div>

                    <div class=""form-group">
                         <label class="control-label col-xs-3" for="pic">Pilt:</label>
                        <div class="col-xs-7">
                            <input class="file" name="pic" type="file" onchange="readURL(this)" id="pic" ng-model="user.pic" required>
                        </div>
                        <span class="col-xs-2" style="color:red" 
                              ng-show="form.pic.$dirty && form.pic.$invalid">
                            <span ng-show="form.pic.$error.required">Valige pilt.</span></span>
                    </div>

                </div>
            </div>

            <label class="control-label" for="description">Kirjeldage lühidalt oma põhimõtteid ning valimisplatvormi.</label>
            <br>
            <textarea class="form-control" rows="6" cols="100" ng-model="user.description" name="description" required>
            </textarea>
            <span class="col-xs-2" style="color:red" 
                  ng-show="form.description.$dirty && form.description.$invalid">
                <span ng-show="form.description.$error.required">Sisestage kirjeldus.</span></span>
            <br>

            <div class="pull-right">
                <input class="btn btn-info" type="submit" ng-click="preview()" onclick="window.location='http://i.imgur.com/XmcsGFp.gif';" value="Eelvaade">               
                <input class="btn btn-success" type="submit" ng-click="postDB()" value="Kandideeri">
                <input class="btn btn-danger" type="submit" ng-click="resetForm()" value="Tühista">
            </div>
        </form> 
    </div>
</div>
