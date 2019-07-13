<?php
//Get channel id from the URL, ex: http://your-ip/this-file.php?ch=01 for arenavision 1
$ch = $_GET['ch'];

//Get the content id from arenavision website
$url = "http://arenavision.cc/" .$ch;

$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: User-Agent=Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36&Referer=http://arenavision.us"
  )
);

$context = stream_context_create($options);
$url = file_get_contents($url, false, $context);

preg_match_all(
     '/((?<=id:")(.*?)(?="))/',

    $url,
    $posts, // will contain the article data
    PREG_SET_ORDER // formats data into an array of posts
);

foreach ($posts as $post) {
    $id = $post[1];

}

//Your server IP
$server = "http://your-ip:6878/ace/manifest.m3u8?id=";

//Final output 
header('Location:' .$server.$id);

exit;
?>
