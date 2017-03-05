<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
<form action="addlist.php" method="post" enctype="multipart/form-data">
	Add Task
<div id="list0">
</div>
<div><input type="submit" value="Save"> <input type="button" value="Cancel" onclick="window.location.href='caregiver.html';"></div>
</form>
<div>Utilities</div>
<div><a href="recordaudio.html" target="_blank">Record Audio</a></div>
<div><a href="recordvideo.html" target="_blank">Record Video</a></div>
<script>
function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}

var imageId = guid();
var counter = 0;
var image;
function addToList(id){
	$("#"+id).append("<div>Title</div><div><input type='text' id='name' name='name'></div><div>Description</div><div><textarea name='description' id='description'></textarea></div> <div>Use Camera <input type='button' value='Take Picture' onclick='window.open(\"recordimage.php?id="+imageId+"\", \"_blank\"); isImageDone();'> <span id='imageplaceholder'>No picture</span></div> Upload Image <input type='file' name='image'> </div><input type='hidden' id='hiddenimage' name='hiddenimage'><input type='hidden' name='parent' value='-1'> <div>Upload Video <input type='file' name='video'></div> <div>Upload Audio <input type='file' name='audio'></div>");
	counter += 1;
}
addToList("list0");
function isImageDone(){
	$.get("imageExists.php?id="+imageId, function(data){
		var result = JSON.parse(data);
		console.log(result);
		if(result == false){
			setTimeout(function(){isImageDone();}, 2500);
		} else {
			$("#imageplaceholder").html(imageId+".png");
			
			$("#hiddenimage").val(imageId+".png");
		}
	});
}
</script>
</body>
</html>