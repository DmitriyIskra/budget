import ControllDialogs from "./modals/income-money/ControllDialogs.js"
import RedrawIncomeMoney from "./modals/income-money/RedrawIncomeMoney.js";
import RestIncomeMoney from "./modals/income-money/RestApiIncomeMoney.js";

import ControllBoard from "./board/ControllBoard.js";
import RedrawBoard from "./board/RedrawBoard.js";


const dialog = document.querySelector('.dialog');
let controllDialog;
if(dialog) {
    const pathsIncomeMoney = {
        create: '',
        read: '',
        update: '',
        delete: '',
    }

    const redraws = {
        addIncomeMoney: new RedrawIncomeMoney(dialog),
    }

    const rest = {
        addIncomeMoney: new RestIncomeMoney(pathsIncomeMoney),
    }

    controllDialog = new ControllDialogs(redraws, rest);
    controllDialog.init();
}

// Кабинет
const board = document.querySelector('.board');
if(board) {
    const redraw = new RedrawBoard(board);
    const controll = new ControllBoard(redraw, controllDialog);
    controll.init();
}