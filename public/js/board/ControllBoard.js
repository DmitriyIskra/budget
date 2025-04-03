export default class ControllBoard {
    constructor(redraw, dialog) {
        this.redraw = redraw;
        this.dialog = dialog;
        console.log(this.dialog)
        this.click = this.click.bind(this);
    }

    init() {
        this.registerEvents();
    }

    registerEvents() {
        this.redraw.el.addEventListener('click', this.click);
    }

    click(e) {
        // e.preventDefault();

        if(e.target.closest('.income__select-add')) {
            this.dialog.redraw.addIncomeMoney.open();
        }
    }
}