import { Controller } from "@hotwired/stimulus";
import $ from "jquery";

export default class extends Controller {
    static targets = ["type", "typeContainer", "item", "borderContainer", "rightContainer", "allJobs"];

    connect() {
        this.showingTypes = false;
        this.selectedJobType = "Alle anzeigen"; // Default state
    }

    filterByJobType(e) {
        e.preventDefault();
        this.toggleJobTypesVisibility();
    }

    toggleJobTypesVisibility() {
        this.showingTypes = !this.showingTypes;
        this.typeContainerTarget.classList.toggle("visible", this.showingTypes);
        this.borderContainerTarget.classList.toggle("visible", this.showingTypes);
    }
    filterItems(e) {
        const selectedType = e.currentTarget.dataset.type || "";

        console.log(selectedType)

        if (selectedType === "") {
            this.itemTargets.forEach((item) => (item.style.display = "block"));
            this.selectedJobType = "Alle anzeigen";
            this.allJobsTarget.classList.add("hidden");
        } else {
            this.itemTargets.forEach((item) => {
                item.style.display = item.getAttribute("data-type") === selectedType ? "block" : "none";
            });
            this.selectedJobType = selectedType;
            this.allJobsTarget.classList.remove("hidden");
        }
        this.borderContainerTarget.querySelector(".overline").textContent = this.selectedJobType;
    }
}
