import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';
import slickInit from 'slick-carousel';

slickInit(window, $);

export default class extends Controller {
    static targets = ["slide", "navButton"];

    connect() {
        $(this.slideTarget).slick({
            slidesToShow: 1,
            centerMode:true,
            centerPadding: '260px',
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            arrows:false,
            dots: true,
            autoplaySpeed: 2000,
            pauseOnHover:true,
            responsive: [
                {
                    breakpoint: 780,
                    settings: {
                        slidesToShow: 1,
                        centerMode:true,
                        centerPadding: '20px',
                        slidesToScroll: 1,
                    }
                },
            ]
        });
    }
}
