<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div id="list0">
</list>
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
	$("#"+id).append("Name <input type='text' id='name'> Description <textarea id='description'></textarea> Image <span class='imagefile'><input type='file'> or</span> <div id='imageplaceholder'><a href='recordimage.php?id="+imageId+"' target='_blank' onclick='isImageDone()'>Take a Picture</a></div>");
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
			$("#imageplaceholder").html("<img src='img/"+imageId+".png' alt='capture'>");
			$(".imagefile").hide();
			image = imageId+".png";
		}
	});
}
function save(){
	$.get("addlist.php?name="+$("#name").val()+"&description="+$("#description").val()+"&image="+image+"&video=&audio=&parent=-1");
}
</script>
<div><input type="button" value="Save" onclick="save()"> <input type="button" value="Canacel"></div>
</body>
</html>