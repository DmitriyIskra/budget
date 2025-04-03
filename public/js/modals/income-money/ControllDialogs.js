export default class ControllDialogs {
    constructor(redraw, rest) {
        this.redraw = redraw;
        this.rest = rest;
        
        this.click = this.click.bind(this);
    }

    init() {
        this.registerEvents();
    }

    registerEvents() {
        this.redraw.addIncomeMoney.el.addEventListener('click', this.click);
    }

    click(e) {
        // e.preventDefault();

        if(e.target.closest('.dialog__close')) {
            this.redraw.addIncomeMoney.el.close();
        }
    }
}