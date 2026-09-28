import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';

export default class extends Controller {
    static targets = ['trigger', 'submenu', 'header'];

    connect() {
    }

    button() {
        this.element.classList.toggle('open');
    }
}
