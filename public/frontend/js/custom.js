(function() {
	'use strict';

	var tinyslider = function() {
		var el = document.querySelectorAll('.testimonial-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.testimonial-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#testimonial-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	};
	tinyslider();

	


	var sitePlusMinus = function() {

		var value,
    		quantity = document.getElementsByClassName('quantity-container');

		function createBindings(quantityContainer) {
	      var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
	      var increase = quantityContainer.getElementsByClassName('increase')[0];
	      var decrease = quantityContainer.getElementsByClassName('decrease')[0];
	      increase.addEventListener('click', function (e) { increaseValue(e, quantityAmount); });
	      decrease.addEventListener('click', function (e) { decreaseValue(e, quantityAmount); });
	    }

	    function init() {
	        for (var i = 0; i < quantity.length; i++ ) {
						createBindings(quantity[i]);
	        }
	    };

	    function increaseValue(event, quantityAmount) {
	        value = parseInt(quantityAmount.value, 10);

	        console.log(quantityAmount, quantityAmount.value);

	        value = isNaN(value) ? 0 : value;
	        value++;
	        quantityAmount.value = value;
	    }

	    function decreaseValue(event, quantityAmount) {
	        value = parseInt(quantityAmount.value, 10);

	        value = isNaN(value) ? 0 : value;
	        if (value > 0) value--;

	        quantityAmount.value = value;
	    }
	    
	    init();
		
	};
	sitePlusMinus();


})()
const whatsappIcon = document.getElementById('whatsappIcon');
const chatPopup = document.getElementById('chatPopup');
const closeChat = document.getElementById('closeChat');
let popupTimer;

// Show popup after 3 seconds
setTimeout(() => {
    whatsappIcon.style.opacity = '0';
    whatsappIcon.style.transform = 'scale(0.9)';
    setTimeout(() => {
        whatsappIcon.style.display = 'none';
        chatPopup.classList.add('show');
    }, 400);

    // Hide popup after 5 seconds
    popupTimer = setTimeout(() => {
        chatPopup.classList.remove('show');
        whatsappIcon.style.display = 'block';
        setTimeout(() => {
            whatsappIcon.style.opacity = '1';
            whatsappIcon.style.transform = 'scale(1)';
        }, 10);
    }, 5000);
}, 3000);

// Toggle between icon and popup when clicking the icon
whatsappIcon.addEventListener('click', () => {
    whatsappIcon.style.display = 'none';
    chatPopup.classList.add('show');
    clearTimeout(popupTimer);
});

// Close popup when clicking the close button
closeChat.addEventListener('click', () => {
    chatPopup.classList.remove('show');
    setTimeout(() => {
        whatsappIcon.style.display = 'block';
        whatsappIcon.style.opacity = '1';
        whatsappIcon.style.transform = 'scale(1)';
    }, 400);
});