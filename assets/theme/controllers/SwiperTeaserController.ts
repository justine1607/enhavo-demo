import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';
import 'slick-carousel';

export default class extends Controller {
    static targets = ["slide", "navButton"];

    connect() {
        $(this.slideTarget).slick({
            slidesToShow: 2,
            centerMode:true,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            dots: true,
            autoplaySpeed: 2000,
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 1440,
                    settings: {
                        slidesToShow: 2,
                        centerMode: true
                    }
                },
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 1,
                        centerMode:true,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        centerMode:true,
                    }
                }
            ]
        });

        }
}
