<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div id="list0">
</list>
<script>
var counter = 0;
function addToList(id){
	$("#"+id).append("Name <input type='text'> Description <textarea></textarea> Image <input type='file'> Audio <input type='file'> Video <input type='file'> <input type='button' value='Add Child' onclick='addToList(\"list"+counter+"\")'> <input type='button' value='Remove'>");
	counter += 1;
}
addToList("list0");
</script>
</body>
</html>