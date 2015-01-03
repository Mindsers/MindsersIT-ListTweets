<?php
require_once('./lib/TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "xxx",
    'oauth_access_token_secret' => "xxx",
    'consumer_key' => "xxx",
    'consumer_secret' => "xxx"
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline/xxx.json';
$getfield = '?count=3';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$json_results = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$tweets = json_decode($json_results);
?>

<!DOCTYPE html>
<html>
<head>
	<title>List Tweets</title>
	<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
</head>
<body>
	<section class="twitter">
        <div class="content">
			<?php foreach ($tweets as $key => $tweet) {?>
                <div class="tweet">
                    <p class="logo">
                        <img src="./public/img/twitter_circle.png">
                    </p>
                    
                    <p class="pseudo">
                        <span class="name"><?php echo $tweet->user->name ?></span> <span class="screen_name_date"><span class="screen_name"><?php echo $tweet->user->screen_name?></span> • <span class="date"><?php echo $tweet->created_at ?></span></span>
                    </p>
                    
                    <p class="text"><?php echo $tweet->text ?></p>
                </div>
    		<?php }?>
    	</div>
    </section>
</body>
</html>