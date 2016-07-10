var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30
    });

$(document).ready(function(){

	$(".popup").magnificPopup({
		type:"image",
		gallery : {
			enabled : true
		},
	});

	$('.header__feedback').mPageScroll2id();

	 $(".feedback-form").submit(function() {
        $.ajax({
            type: "POST",
            url: "formhandler.php",
            data: $(this).serialize(),
            success: function() {
                alert('Ваша заявка принята. Наш менеджер свяжется с Вами в ближайшее время')
                $(this).find("input").val("");
                $(".form-get-order").trigger("reset");
            }
        });
        return false;
    });

});