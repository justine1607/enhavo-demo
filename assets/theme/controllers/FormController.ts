import { Controller } from "@hotwired/stimulus";
import $ from "jquery";

export default class extends Controller {
    static targets = ["formBtn"];

    validateForm(event) {
        event.preventDefault();

        const form = this.element;
        let isValid = true;

        form.querySelectorAll("input[required], select[required], textarea[required]").forEach((input) => {
            const isCheckbox = input.type === "checkbox";
            const isEmpty = isCheckbox ? !input.checked : !input.value.trim();
            const errorMessage = input.nextElementSibling?.classList.contains("required-message") ? input.nextElementSibling : null;

            if (isCheckbox) {
                input.classList.toggle("error-text-box-border", isEmpty);
            } else {
                input.classList.toggle("error-border", isEmpty);
            }
            if (errorMessage) {
                errorMessage.style.display = isEmpty ? "block" : "none";
            }

            if (isEmpty) isValid = false;
        });

        if (isValid) form.submit();
    }

}
