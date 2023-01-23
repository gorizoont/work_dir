
/* Module add tooltip */
;(function($) {
	$(function() {
		var $body = $("body");

		if ($body.length) {
			$body.tooltip({selector: '[data-toggle=tooltip]'});
		}
	});
})(jQuery);

/* Module to update Lang module */
(function($) {
	$(function() {
		var $sumduLangEl = $('.header__lang .lang-inline');

		if ($sumduLangEl.length) {
		}
	});
})(jQuery);

/* Menu All SumDU accordion handler */
(function($) {
	$(function() {
		var $allSumduLinkEl = $('.nav--all-sumdu .nav__item-group > a.item-group');
		var $allSumduChildListEl = $('.nav--all-sumdu .nav__item-group > ul.nav-child');
		var documentWidthVal = $(document).width();
		var MAX_WIDTH_TO_DISPLAY = 980;

		if ($allSumduLinkEl.length && $allSumduChildListEl.length) {
			if (documentWidthVal < MAX_WIDTH_TO_DISPLAY) {
				$allSumduChildListEl.addClass('nav__child-hide');
			}

			$allSumduLinkEl.on('click', function(){
				$allSumduChildListEl.toggleClass('nav__child-hide');
				return false;
			});
		}
	});
})(jQuery);

/* Module Gallery */
(function($) {
	$(function() {
		var $oldGalleryEl = $('.gallery_wrapper > .gallery');

		if ($oldGalleryEl.length) {
			$oldGalleryEl.slickLightbox({
				itemSelector: 'a',
				navigateByKeyboard: true
			});
		}
	});
})(jQuery);

/* Mobile Module accordion */
(function($) {
	$(function() {
      	var documentWidthVal = $(document).width();
      	var MAX_WIDTH_TO_DISPLAY = 767;

      	if (documentWidthVal < MAX_WIDTH_TO_DISPLAY) {
          	var $mobileModuleAccordionEl = $('.module.mobile-module--accordion');

        	if ($mobileModuleAccordionEl.length) {
                var $mobileModuleAccordionHeader = $('.module.mobile-module--accordion .page-header');

                $mobileModuleAccordionHeader.on('click', function(){
                    $(this).next().toggleClass('mobile-module--show');
                });
            }
        }
	});
})(jQuery);

// All SumDU modal popup
(function($) {
	$(function() {
		function closeModal (e) {
			e.preventDefault();
			$('body, html').css({ 'overflow': 'auto' });
			var newModalw = $('#allUniversity__modal');
			// add smth beforeClose
			if (newModalw.hasClass('menu--modalContainer__open')) {
			newModalw.removeClass('menu--modalContainer__open');
			newModalw.addClass('menu--modalContainer__close');
			} 
		
			if (newModalw.hasClass('menu--modalContainer__close')) {
			newModalw.removeClass('sumdu-modal--show');
			afterClose();
			};
		}
		
		function afterClose () {  
			$('#allUniversity__modal').css({ 'z-index': '-9999' });
			$('#allUniversity__modalClose').off("click", closeModal);
			$('#allUniversity__modalContent iframe').remove();
		}
		
		function openModal (e) {
			e.preventDefault();
			var newModal = $('#allUniversity__modal');
			
			if (e.currentTarget.id == 'allUniversity__modalBtn') {
				$('<iframe src="https://sumdu.edu.ua/uk/all-sumdu.html?tmpl=raw" frameborder="0" class="allUniversity__modalFrame"></iframe>')
				.appendTo('#allUniversity__modalContent');

			} else if (e.currentTarget.id == 'allDocuments__modalBtn') {
				$('<iframe src="https://sumdu.edu.ua/uk/documents-sumdu.html?tmpl=raw" frameborder="0" class="allUniversity__modalFrame"></iframe>')
				.appendTo('#allUniversity__modalContent');

			} else if (e.currentTarget.id == 'allWeb__modalBtn') {
				$('<iframe src="https://web.sumdu.edu.ua/uk/domains.html?tmpl=raw" frameborder="0" class="allUniversity__modalFrame"></iframe>')
				.appendTo('#allUniversity__modalContent');
			}

			$('body, html').css({'overflow':'hidden'});
			if (newModal.hasClass('menu--modalContainer__close')) {
			// newModal.removeClass('animate__fadeInUpBig');
			newModal.removeClass('menu--modalContainer__close');
			newModal.addClass('menu--modalContainer__open');
			} 
		
			if (newModal.hasClass('menu--modalContainer__open')) {
			// add smth beforeOpen
			newModal.css({ 'opacity': '1', 'z-index': '999999' });
			newModal.addClass('sumdu-modal--show');
			afterOpen();
			};  
		}
		
		function afterOpen () {
			$('#allUniversity__modalClose').click(closeModal);
		}

		function createModal() {
			var modal = $("<section id='allUniversity__modal'><div id='allUniversity__modalClose'>&times;</div><div id='allUniversity__modalContent'></div></section>");
			modal.addClass("sumdu-modal menu--modalContainer menu--modalContainer__close");
			$("#wrapper").append(modal);

		}

		var $allUniversity__modalBtn = $('#allUniversity__modalBtn');
		var $allDocuments__modalBtn = $('#allDocuments__modalBtn');
		var $allWeb__modalBtn = $('#allWeb__modalBtn');
		

		if ($allUniversity__modalBtn.length || $allDocuments__modalBtn.length || $allWeb__modalBtn.length) {
			createModal();

			if ($allUniversity__modalBtn.length) {
				$allUniversity__modalBtn.click(openModal);
			}

			if ($allDocuments__modalBtn.length) {
				$allDocuments__modalBtn.click(openModal);
			}

			if ($allWeb__modalBtn.length) {
				$allWeb__modalBtn.click(openModal);
			}
		}

	});
})(jQuery);
