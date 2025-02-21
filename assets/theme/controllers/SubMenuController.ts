import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';

export default class extends Controller {
    static targets = ["header","menuContainer"];

    public static values  = {
        mainMenuOpen: {type: Boolean, default: false}
    }
    connect() {
        this.navItems = document.querySelectorAll(".nav-item.has-submenu");

        this.navItems.forEach(item => {
            item.addEventListener("mouseenter", this.expandHeader.bind(this));
            item.addEventListener("mouseleave", this.resetHeader.bind(this));
        });
    }

    expandHeader() {
        if (this.hasHeaderTarget) {
            this.headerTarget.style.height = "350px";
        }
    }

    resetHeader() {
        if (this.hasHeaderTarget) {
            this.headerTarget.style.height = "";
        }
    }

    disconnect() {
        this.navItems.forEach(item => {
            item.removeEventListener("mouseenter", this.expandHeader.bind(this));
            item.removeEventListener("mouseleave", this.resetHeader.bind(this));
        });
    }
    button() {
        this.mainMenuOpenValue = !this.mainMenuOpenValue;
    }
    mainMenuOpenValueChanged()
    {
        this.mainMenuOpenValue ? $(this.element).addClass('menu-open') : $(this.element).removeClass('menu-open');
    }

}
