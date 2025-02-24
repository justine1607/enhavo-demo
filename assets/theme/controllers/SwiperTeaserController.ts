import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';
import 'slick-carousel';

export default class extends Controller {
    static targets = ["slide", "navButton"];

    connect() {
        $(this.slideTarget).slick({
            slidesToShow: 2.5,
            slidesToScroll: 1,
            centerMode:false,
            centerPadding: '0px',
            autoplay: false,
            arrows:false,
            dots: true,
            autoplaySpeed: 2000,
            pauseOnHover:true,
        });
    }
}
