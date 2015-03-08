<div class="container">
    <div class="col-sm-3">
        <img src="http://i2.kym-cdn.com/photos/images/newsfeed/000/114/139/tumblr_lgedv2Vtt21qf4x93o1_40020110725-22047-38imqt.jpg" alt="Smiley face" width="200" height="200">
    </div>
    <div class="col-sm-9">
        <h1>Kandidaat <?php echo $candidate->getId(); ?>: <?php echo $candidate->getUser()->getFullName() ?></h1>
        <h2><?php echo $candidate->getArea()->getName(); ?></h2>

        <table class="table">
            <tr>
                <td class="text-right"><h4>Kandideerib erakonnas:</h4></td>
                <td><h4><?php echo $candidate->getParty()->getName(); ?></h4></td>
            </tr>
            <tr>
                <td class="text-right"><h4>Sünnikuupäev:</h4></td>
                <td><h4><?php echo $candidate->getBirthday(); ?></h4></td>
            </tr>
            <tr>
                <td class="text-right"><h4>Haridus:</h4></td>
                <td><h4><?php echo $candidate->getEducation()->getName(); ?></h4></td>
            </tr>
            <tr>
                <td class="text-right"><h4>Töökoht:</h4></td>
                <td><h4><?php echo $candidate->getJob(); ?></h4></td>
            </tr>
        </table>
    </div>
</div>
<div class="container">
    <p>Kandidaadist lähemalt:</p>
    <p><?php echo $candidate->getDescription(); ?></p><br>
</div>

