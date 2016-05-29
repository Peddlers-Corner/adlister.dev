<?php  

require_once __DIR__ . '../../../models/Ad.php';
require_once __DIR__ . '../../../models/User.php';
require_once __DIR__ . '/../../utils/Auth.php';
    
    if (!Auth::check()) {
        header('Location: login');
        exit();
    }

    $user = User::find(Auth::id());

    $userAds = Ad::getUserAds($user->id);
    var_dump($userAds)
?>

<div class="container"> 
    <h1>Profile Page</h1>

    <hr>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-3 text-center">
            <h2>User Info</h2>
                
            <p>Name: <?php echo $user->name; ?></p>

            <p>Username: <?php echo $user->username; ?></p>
        
            <p>Email: <?php echo $user->email; ?></p>

            <p>Location: <?php echo $user->location; ?></p>

            <a href='account/edit' class="btn btn-default" type="submit">Edit Profile</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <h2>Your Ads</h2>
            <?php foreach ($userAds->attributes as $index=>$ad):  ?>
                <?php if($ad['index'] % 4 == 0) : ?>
                    <div class="row">
                <?php endif;  ?>

                <div class="col-sm-4">
                    <p>
                       <h3><?php echo $ad['title'] ?></h3>
                       <?php echo $ad['description'] ?>
                    </p>

                    <h4><a href="/ads/show?id=<?=$ad['id'] ?>" class="btn btn-default">View Ad</a></h4>
                    <h4><a href="/ads/edit?id=<?=$ad['id'] ?>" class="btn btn-default">Edit Ad</a></h4>
                    <h4><a href="/ads/delete?id=<?=$ad['id'] ?>" class="btn btn-default">Delete Ad</a></h4>

                <?php if($index % 4 == 3) : ?>
                    </div> <!-- closes row -->
                <?php endif; ?> 

            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-3 text-center">
            <div>
                <a href='/ads/create' class="btn btn-default" type="submit">Create New Ad</a>
            </div>
        </div>
    </div>


</div>