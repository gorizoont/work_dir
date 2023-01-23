
// Module SumDU News
;(function($) {
	$(function() {
		if($().slick) {
			var $newsListEl = $('.news__list--slider');
			var $newsWrapperEl = $('.news__list--slider-wrapper');
			var defaultSlidesColumns = 5;
			var maxLimitSlidesColumns = 8;
			var maxSlidesColumns = 7;
			
			if ($newsWrapperEl.length) {
				$newsWrapperEl.slick({
					autoplay: true,
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplaySpeed: 8000
				});
			}

			if ($newsListEl.length) {
				$newsListEl.each(function(){
					var slidesColumnsCount = $(this).attr('data-news-columns');
					var slidesShowInt = parseInt(slidesColumnsCount);
					var showColumns = slidesShowInt ? slidesShowInt : defaultSlidesColumns;
					var showColumnsResult = showColumns < maxLimitSlidesColumns ? showColumns : maxSlidesColumns;

					$(this).slick({
						infinite: false,
						slidesToShow: showColumnsResult,
						slidesToScroll: 1,
						responsive: [
							{
								breakpoint: 1200,
								settings: {
									slidesToShow: 4,
									slidesToScroll: 1
								}
							},
							{
								breakpoint: 1000,
								settings: {
								slidesToShow: 3,
								slidesToScroll: 2
								}
							},
							{
								breakpoint: 640,
								settings: {
								slidesToShow: 2,
								slidesToScroll: 1
								}
							},
							{
								breakpoint: 500,
								settings: {
								slidesToShow: 1,
								slidesToScroll: 1
								}
							}
						]
					});
				});
			}
		} else {
			console.log('[mod](news) Slick library not exist!');
		}
	});
})(jQuery);
