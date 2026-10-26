import { Controller } from "@hotwired/stimulus";
import hljs from "highlight.js/lib/core";
import php from "highlight.js/lib/languages/php";
import json from "highlight.js/lib/languages/json";
import xml from "highlight.js/lib/languages/xml";
import "highlight.js/styles/atom-one-dark.css";

hljs.registerLanguage("php", php);
hljs.registerLanguage("json", json);
hljs.registerLanguage("xml", xml);

// Dark code board: syntax-highlights the code and copies it to the clipboard.
export default class extends Controller {
    static targets = ["code", "button"];

    declare readonly codeTargets: HTMLElement[];
    declare readonly codeTarget: HTMLElement;
    declare readonly hasButtonTarget: boolean;
    declare readonly buttonTarget: HTMLElement;

    connect() {
        this.codeTargets.forEach((el) => {
            // allow manual markup (e.g. a greyed line) by opting out of hljs
            if (el.classList.contains("nohljs")) return;
            hljs.highlightElement(el);
        });
    }

    async copy() {
        const text = this.codeTarget.textContent || "";
        try {
            await navigator.clipboard.writeText(text);
        } catch (e) {
            const ta = document.createElement("textarea");
            ta.value = text;
            ta.style.position = "fixed";
            ta.style.opacity = "0";
            document.body.appendChild(ta);
            ta.select();
            document.execCommand("copy");
            ta.remove();
        }
        this.flash();
    }

    flash() {
        if (!this.hasButtonTarget) return;
        this.buttonTarget.classList.add("code-block__copy--copied");
        setTimeout(() => this.buttonTarget.classList.remove("code-block__copy--copied"), 1500);
    }
}
