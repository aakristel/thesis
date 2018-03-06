<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<style>
		.left-sidebar, .right-sidebar{
			background-color: #fff;
			min-height: 600px
		}
	</style>
</head>
<body>
<h1>Chatroom</h1>

	<div class="container">
        <div class="row">
        	<div class="col-md-12">
	        	<div class="col-md-3 left-sidebar">
	        		<h3>Left Sidebar</h3>
	        	</div>

	        	<div class="col-md-7 left-sidebar">
	        		<h3>Center</h3>
	        	</div>

	        	<div class="col-md-2 right-sidebar">
	        		<h3>Right Sidebar</h3>
	        	</div>
        	</div>
        </div>
    </div>




<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

<script src="js/app.js" charset="utf-8"></script>

</body>
</html>