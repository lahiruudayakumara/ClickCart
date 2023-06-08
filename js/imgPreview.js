function preview() {
	var input = document.getElementById('image');
    var imgElement = document.getElementById('img');
    imgElement.src = URL.createObjectURL(input.files[0]);
}