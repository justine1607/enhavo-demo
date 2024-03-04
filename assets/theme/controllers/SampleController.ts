// form_controller.js
import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    // Target form element
    static targets = ['form'];

    // Action to handle form submission
    submit(event) {
        event.preventDefault();
        this.formTarget.reset();
    }
}
