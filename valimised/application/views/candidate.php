<div class="container">
    <div class="col-sm-4" style='text-align: right'>
        <img src="http://i2.kym-cdn.com/photos/images/newsfeed/000/114/139/tumblr_lgedv2Vtt21qf4x93o1_40020110725-22047-38imqt.jpg" alt="Smiley face" width="200" height="200">
    </div>
    <div class="col-sm-8">
        <div class="col-sm-6" style='text-align: right'>
            <p>Eesnimi:</p>
            <p>Perenimi:</p>
            <p>Sünnikuupäev:</p>
            <p>Haridus:</p>
            <p>Töökoht:</p>
            <p>Partei:</p>
            <p>Piirkond:</p>

        </div>
        <div class="col-sm-6">
            <p><?php echo $candidate->getUser()->getFirstName(); ?></p>
            <p><?php echo $candidate->getUser()->getLastName(); ?></p>
            <p><?php echo $candidate->getBirthday(); ?></p>
            <p><?php echo $candidate->getEducation(); ?></p>
            <p><?php echo $candidate->getJob(); ?></p>
            <p><?php echo $candidate->getParty()->getName(); ?></p>
            <p><?php echo $candidate->getArea()->getName(); ?></p>
        </div>
    </div>
    <div class='col-sm-12'>
        <p>Poliitilised v'ljavaated</p>
        <p><?php echo $candidate->getDescription(); ?></p><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ante erat, lobortis at nibh sit amet, sagittis elementum nisi. In suscipit ut arcu sed consequat. Aenean finibus porta tempus. Nam bibendum vehicula risus a aliquam. Nam luctus augue in odio imperdiet fermentum. Suspendisse potenti. Quisque maximus sapien in purus consequat, non dictum quam ultricies. Curabitur bibendum mattis augue, eu tincidunt velit mattis eu. Mauris vel vehicula est, ut auctor justo. Mauris in leo rutrum, tempus odio sit amet, placerat nulla. Integer consequat felis interdum tellus euismod sollicitudin. Mauris ipsum ligula, auctor id efficitur eu, pharetra nec turpis. Vestibulum cursus sagittis nibh sed pellentesque. Curabitur imperdiet pretium gravida. Quisque dictum bibendum facilisis. Nulla pretium sem at tincidunt posuere.
            Integer ultrices quis eros in consectetur. Nam hendrerit varius ligula, id laoreet massa tincidunt eget.</p>


    </div>
</div>

