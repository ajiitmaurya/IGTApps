jQuery(document).ready(function () {
	$('.banner-area').backstretch([
		"images/undermaintain/1.jpg",
		"images/undermaintain/2.jpg",
		"images/undermaintain/3.jpg"
	], { duration: 3000, fade: 750 });

	$("#typed").typed({
		stringsElement: $('#typed-strings'),
		typeSpeed: 50,
		backDelay: 1000,
		loop: true,
		contentType: 'html',
		loopCount: false
	});
});
// cowntdown function. Set the date below (December 1, 2016 00:00:00):
var austDay = new Date("February 14, 2023 00:00:00");
$('#countdown').countdown({ until: austDay, expiryUrl: 'home', layout: '<div class="item"><p>{dn}</p> {dl}</div> <div class="item"><p>{hn}</p> {hl}</div> <div class="item"><p>{mn}</p> {ml}</div> <div class="item"><p>{sn}</p> {sl}</div>' });

// smooth scrolling	
$(function () {
	$('a[href*=#]:not([href=#])').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});
