<!doctype html>
<html lang="en">
<head>
</head>
<body class="error-page" role="document">
@if(!isset($_GET['error']) )
@if(isset($_GET['ajax']) && $_GET['ajax'] == TRUE)
@else
<script> window.location.href="/?error={!! $exception->getCode() !!}";</script>
@endif
@else
<style>
body.error-page {
	background-color: #dcdcdc;
	padding: 20px 50px;
	font-family: Helvetica, Arial, sans-serif;
    color: #9a9a9a;
}
.error h1 {
    font-family: Helvetica, Arial, sans-serif;
    color: #9a9a9a;
    
}
.error a {
	color: #b91d1d;
    font-weight: 900;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: -.02em;
}
</style>
<div class="error">
	@php($url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")
	<h1>Whoops, Looks like something went wrong. </h1>
	<p><a href="mailto:support@agentimpress.me?subject=!! ATTENTION%20WEBMASTER !!&body=The website '{!! $url !!}' is not working correctly.">Let Us Know Please : )</a></p>
</div>
@endif
</body>
</html>