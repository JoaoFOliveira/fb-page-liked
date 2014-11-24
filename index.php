<?php 

	$signed_request = filter_input(INPUT_GET, 'signed_request');

	function parsePageSignedRequest() {

	if (isset($signed_request)) {
		$encoded_sig = null;
		$payload = null;
		list($encoded_sig, $payload) = explode('.', $signed_request, 2);
		$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
		return $data;
	}
		return false;
	}

	$user_has_liked = false;

	if($signed_request = parsePageSignedRequest()) {
		if($signed_request->page->liked) {
	  		$user_has_liked = true;
		} else {
	  		$user_has_liked = false;
		}
	}

?><html xml:lang="pt" lang="pt"><head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="">
<meta name="description" content="App description">
<meta name="author" content="Author name">
<meta name="corporate" content="Company name">

<!-- Facebook Metatags -->
<meta property="fb:app_id" content="XXXXXXXXXX">
<meta property="fb:admins" content="XXXXXXXXXX">
<meta property="og:title" content="App title">
<meta property="og:image" content="">
<meta property="og:description" content="App description">

<title>App title</title>

<script id="facebook-jssdk" src="//connect.facebook.net/pt_PT/all.js#xfbml=1&amp;appId=XXXXXXXXXX"></script><script type="text/javascript">
if(self==top) {
	window.location = "https://www.facebook.com/XXpage_nameXX/app_XXXXXXXXXX"; // push to FB page
}
</script>
</head>

<body>

	<div id="fb-root"></div>

	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_PT/all.js#xfbml=1&appId=XXXXXXXXXX";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk')); window.fbAsyncInit = function() {FB.Canvas.setAutoGrow(87);};</script>

	<?php if($user_has_liked) : ?>

		<!-- Add text or image content for users who have liked your page -->
		You've liked the page
		
		<!-- Show a comments box for users to participate -->
		<div class="fb-comments" data-href="https://www.facebook.com/XXpage_nameXX/app_XXXXXXXXXX" data-width="800" data-num-posts="20"></div>

	<?php else : ?>

		<!-- Add text or image content for users who haven't liked your page -->
		You are not a fan yet, click like and see what happens! :)

	<?php endif; ?>

</body>
</html>