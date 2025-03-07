import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["form", "formBtn", "openValue", "optionDisplay"];

    connect() {
        this.setupValidation();
    }

    setupValidation() {
        this.element.addEventListener("input", this.handleInput.bind(this));
        this.element.addEventListener("change", this.handleInput.bind(this));
    }
    handleInput(event) {
        const input = event.target;
        if (this.isRequired(input)) {
            this.toggleError(input);
        }
    }
    validateForm(event) {
        event.preventDefault();
        let isValid = this.checkFormValidity();

        if (isValid) {
            this.element.reset();
            this.resetCustomSelects();
            this.formBtnTarget.dataset.submitted = "false"; // Reset submission state
        } else {
            this.formBtnTarget.dataset.submitted = "true"; // Mark as submitted
        }

        this.updateButtonOpacity();
    }
    isRequired(input) {
        return input.nextElementSibling?.classList.contains("required-message") ||
            (input.type === "checkbox" && input.closest(".checkbox-group")?.querySelector(".required-message")) ||
            (input.type === "hidden" && input.closest(".custom-select")?.querySelector(".required-message"));
    }
    isValid(input) {
        return input.type === "checkbox" ? input.checked : !!input.value.trim();
    }
    toggleError(input) {
        if (this.isValid(input)) {
            this.hideError(input);
        } else {
            this.showError(input);
        }

        this.updateButtonOpacity();
    }

    checkFormValidity() {
        let hasErrors = false;
        this.element.querySelectorAll("input, textarea, input[hidden]").forEach((input) => {
            if (this.isRequired(input) && !this.isValid(input)) {
                this.showError(input);
                hasErrors = true;
            } else {
                this.hideError(input);
            }
        });
        this.element.querySelectorAll(".custom-select").forEach((customSelect) => {
            const hiddenInput = customSelect.querySelector("input[type='hidden']");
            if (hiddenInput && this.isRequired(hiddenInput) && !this.isValid(hiddenInput)) {
                this.showError(customSelect);
                hasErrors = true;
            } else {
                this.hideError(customSelect);
            }
        });
        this.updateButtonOpacity(!hasErrors);
        return !hasErrors;
    }

    updateButtonOpacity() {
        if (this.hasFormBtnTarget) {
            const isFormSubmitted = this.formBtnTarget.dataset.submitted === "true";

            if (!isFormSubmitted) return;

            const hasErrors = [...this.element.querySelectorAll("input, textarea, input[hidden]")]
                .filter(input => this.isRequired(input))
                .some(input => !this.isValid(input));

            this.formBtnTarget.style.opacity = hasErrors ? "0.5" : "1";
        }
    }
    resetCustomSelects() {
        this.element.querySelectorAll(".custom-select").forEach((customSelect) => {
            customSelect.querySelector("[data-form-target='optionDisplay']")?.textContent = "Auswählen";
            const hiddenInput = customSelect.querySelector("input[type='hidden']");
            if (hiddenInput) hiddenInput.value = "";
            this.hideError(customSelect);
        });
    }

    showError(input) {
        if (!this.isRequired(input)) return;

        input.classList.add("error-border");

        const errorMessage = input.type === "checkbox"
            ? input.closest(".checkbox-group")?.querySelector(".required-message")
            : input.nextElementSibling;

        if (errorMessage?.classList.contains("required-message")) {
            errorMessage.style.display = "block";
        }
    }

    hideError(input) {
        if (!this.isRequired(input)) return;

        input.classList.remove("error-border");

        const errorMessage = input.type === "checkbox"
            ? input.closest(".checkbox-group")?.querySelector(".required-message")
            : input.nextElementSibling;

        if (errorMessage?.classList.contains("required-message")) {
            errorMessage.style.display = "none";
        }
    }

    selectOption(event) {
        const selectedOption = event.target;
        const value = selectedOption.dataset.value;

        const hiddenInput = this.openValueTarget.querySelector("input[type='hidden']");
        if (hiddenInput) {
            hiddenInput.value = value;
        }

        const optionDisplay = this.openValueTarget.querySelector("[data-form-target='optionDisplay']");
        if (optionDisplay) {
            optionDisplay.textContent = selectedOption.textContent;
        }

        this.openValueTarget.classList.remove("open-options");
        // this.updateButtonOpacity();
    }

    openOptions() {
        this.openValueTarget.classList.toggle("open-options");
    }
}
