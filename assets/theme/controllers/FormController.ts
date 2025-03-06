import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["formBtn", "openValue", "optionDisplay"];

    validateForm(event) {
        event.preventDefault();

        const form = this.element;
        let isValid = true;

        // Validate required fields
        form.querySelectorAll("input[required], textarea[required], .custom-select").forEach((input) => {
            const isEmpty = input.classList.contains("custom-select")
                ? !input.querySelector("input[type='hidden']")?.value.trim()
                : input.type === "checkbox"
                    ? !input.checked
                    : !input.value.trim();

            input.classList.toggle("error-border", isEmpty);
            input.nextElementSibling?.classList.contains("required-message") &&
            (input.nextElementSibling.style.display = isEmpty ? "block" : "none");

            if (isEmpty) isValid = false;
        });

        // Validate checkbox separately
        const checkbox = form.querySelector(".checkbox-group input[type='checkbox']");
        const checkboxError = form.querySelector(".checkbox-group .required-message");
        if (checkbox) {
            const isCheckboxEmpty = !checkbox.checked;
            checkboxError && (checkboxError.style.display = isCheckboxEmpty ? "block" : "none");
            if (isCheckboxEmpty) isValid = false;
        }

        if (isValid) {
            form.reset();
            this.resetCustomSelects();
        }
    }

    resetCustomSelects() {
        this.element.querySelectorAll(".custom-select").forEach((customSelect) => {
            customSelect.querySelector("[data-form-target='optionDisplay']")?.textContent = "Auswählen";
            const hiddenInput = customSelect.querySelector("input[type='hidden']");
            if (hiddenInput) hiddenInput.value = "";
        });
    }

    openOptions() {
        this.openValueTarget.classList.toggle("open-options");
    }

    selectOption(event) {
        const selectedValue = event.target.dataset.value;
        this.optionDisplayTarget.textContent = event.target.textContent.trim();

        let hiddenInput = this.openValueTarget.querySelector("input[type='hidden']");
        if (!hiddenInput) {
            hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = this.openValueTarget.dataset.name;
            this.openValueTarget.appendChild(hiddenInput);
        }
        hiddenInput.value = selectedValue;

        this.openValueTarget.classList.remove("error-border", "open-value");
    }
}
