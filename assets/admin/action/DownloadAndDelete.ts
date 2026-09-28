import { AbstractAction } from "@enhavo/app/action/model/AbstractAction";
import { ModalManager } from "@enhavo/app/modal/ModalManager";
import { FormModal } from "@enhavo/app/modal/model/FormModal";
import { FlashMessenger } from "@enhavo/app/flash-message/FlashMessenger";
import { AxiosResponseHandler } from "@enhavo/app/util/AxiosResponseHandler";
import axios from "axios";

export class DownloadAndDeleteAction extends AbstractAction
{
    public modal: any;

    constructor(
        private readonly modalManager: ModalManager,
        private readonly flashMessenger: FlashMessenger,
    ) {
        super();
    }

    execute(): void
    {
        this.modal.submitHandler = async (modal: FormModal) => {
            try {
                const response = await axios.get(modal.actionUrl, {
                    responseType: 'arraybuffer'
                });

                AxiosResponseHandler.download(response);
                this.flashMessenger.success("Erfolgreicher Download!");
                this.modalManager.pop();

                return true;
            } catch (error) {
                console.error(error);
                this.flashMessenger.error("Download fehlgeschlagen!");

                return false;
            }
        };

        this.modalManager.push(this.modal);
    }
}