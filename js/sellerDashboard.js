function clickbtn(num) {
							    	
	var a = document.getElementById("clickBtn" + num.toString());
	var icon = document.getElementById("toggoleicon" + num.toString())

	if (a.classList.contains("clickBtn")) {
		 a.classList.remove("clickBtn");
		a.classList.add("clickBtnshow");
		icon.classList.remove("fa-bars");
		icon.classList.add("fa-xmark")		
	} else {
		a.classList.remove("clickBtnshow");
		a.classList.add("clickBtn");
		icon.classList.add("fa-bars");
		icon.classList.remove("fa-xmark")
	}

}



// Function to show the popup
function showPopup() {
	document.getElementById("add-product").style.display = "block";
}

// Function to hide the popup
function hidePopup() {
    document.getElementById("add-product").style.display = "none";
}

function navShow() {
	console.log("hello");
}

