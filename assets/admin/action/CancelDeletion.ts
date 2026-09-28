import { AbstractAction } from "@enhavo/app/action/model/AbstractAction";
import { FlashMessenger } from "@enhavo/app/flash-message/FlashMessenger";
import { ResourceInputManager } from "@enhavo/app/manager/ResourceInputManager";
import { UiManager } from "@enhavo/app/ui/UiManager";
import axios from "axios";

export class CancelDeletionAction extends AbstractAction
{
    public url: string;

    constructor(
        private readonly resourceInputManager: ResourceInputManager,
        private readonly flashMessenger: FlashMessenger,
        private readonly uiManager: UiManager,
    ) {
        super();
    }

    execute(): void
    {
        this.cancelDeletion();
    }

    private async cancelDeletion(): Promise<void>
    {
        this.uiManager.loading(true);

        try {
            await axios.post(this.url);
            this.flashMessenger.success("Die Datei wird nicht gelöscht.");

            // reload the input so the action list reflects the new state
            await this.resourceInputManager.load(this.resourceInputManager.url);
        } catch (error) {
            console.error(error);
            this.flashMessenger.error("Aktion fehlgeschlagen!");
        } finally {
            this.uiManager.loading(false);
        }
    }
}