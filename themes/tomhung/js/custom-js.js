// grab an element
var myElement = document.querySelector(".nav-wrapper");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement, {
		  "offset": 64,
		  "classes": {
		    "top": "headroom--top"
		  }
		});
// initialise
headroom.init(); 