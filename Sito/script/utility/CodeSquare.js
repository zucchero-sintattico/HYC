function animateProductsOnHover(product, forward, description){
    if(forward){
        product.animate([
                {
                    borderStyle: "solid",
                    borderColor: "#E0E0E0"
                }],

            {
                duration: 100, iterations: 1, fill: "forwards", delay:500, easing: "cubic-bezier(1,.01,1,-0.18)"
            }
        );

        description.animate([
                {
                    opacity: 1,
                    zIndex: 3000
                }],

            {
                duration: 300, iterations: 1, fill: "forwards", delay:500, easing: "cubic-bezier(1,.01,1,-0.18)"
            }
        );

        product.animate([
                {
                    transformOrigin: "center",
                    transform: "scale(1.35, 1.35)",
                    opacity: 0.9,
                    zIndex: 3000
                }],

            {
                duration: 500, iterations: 1, fill: "forwards", delay:300, easing: "cubic-bezier(1,.02,.5,1.37)"
            }
        );

    }else{

        product.animate([
                {
                    borderStyle: "none",
                }],

            {
                duration: 100, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.01,1,-0.18)"
            }
        );

        description.animate([
                {
                    opacity: 0,
                    zIndex: 10
                }],

            {
                duration: 300, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.02,.5,1.37)"
            }
        );

        product.animate(
            {
                transformOrigin: "center",
                transform: "scale(1, 1)",
                opacity: 1,
                zIndex: 10
            },
            {
                duration: 300, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.02,.5,1.37)"
            }
        );


    }



}

class CodeSquare {
    constructor(querySelector) {
        this._value = '';
        this._language = 'javascript';
        this._theme = 'monokai';
        this._frame_color = 'red';
        this._width = 100;
        this._height = 100;
        this._padding = 5;
        this._frame_size = 7;
        this._font_size = 4;
        this._lineNumbers = "1";
        this.codeMirror = null;
        this._scaledWidth = 100;
        this._querySelector = querySelector;
        this._title="Title";
        this._dest = "";
    }

    setQuerySelector(querySelector){
        this._querySelector = querySelector
    }

    setDestinationOnClick(dest){
        this._dest = dest;
        let square = $(this._querySelector);
        square.on("click", function(){
            window.location.replace(dest);
        })
    }

    createAnimationAndSetDescriptionInformation(dest){
        this.setDestinationOnClick(dest);
        let square = $(this._querySelector);

        square.parent().css("box-sizing", "border-box");
        square.parent().css("overflow", "hidden");

        console.log(dest);
        square.on("mouseenter", function(){
            $(this).css("cursor", "pointer");
            if($(window).width() > 768){
                let description = $(this).parent().find("p");

                animateProductsOnHover($(this).parent()[0], true, description[0]);
                window.setTimeout(() => {
                    $(this).parent().css("cursor", "pointer");
                    $(this).parent().on("click", function(){
                        window.location.replace(dest);
                    })
                }, 600);
            }

        });

        square.parent().on("mouseleave", function(){
            if($(window).width() > 768){
                let description = $(this).find("p");
                animateProductsOnHover(($(this))[0], false, description[0]);
                window.setTimeout(() => {
                    $(this).css("cursor", "revert");
                    $(this).off("click");
                    }, 100);
            }
        });

    }

    getSquare() {
        let square = $(this._querySelector);

        square.css("width", this._width);
        this.codeMirror = CodeMirror(this._querySelector, {
            lineNumbers: this._lineNumbers,
            tabSize: 2,
            value: this._value,
            mode: this._language,
            theme: this._theme,
            scrollbarStyle: null,
            lineWrapping: true,
            matchBrackets: true
        });

        return this.codeMirror;
    }

    updateStyle() {
        let square = $(this._querySelector);
        this.widthScale(this._scaledWidth);

/*        square.find(".CodeMirror").css("font-size", font_size);
        square.find(".CodeMirror").css("min-height", height);
        square.find(".CodeMirror").css("height", height);
        square.find(".CodeMirror-scroll").css("min-height", height);
        square.find("textarea").css("max-height", height);*/
    }

    setWidth(x) {
        this._width = x;
    }

    setHeight(y) {
        this._height = y;
    }

    setPadding(padding_value) {
        this._padding = padding_value;
    }

    setFramecolor(color) {
        let square = $(this._querySelector);
        this._frame_color = color;
        square.css("border-color",  this._frame_color);

    }

    setFontSize(size) {
        this._font_size = size;
    }

    setStyle(style) {
        this._theme = style;
        this.codeMirror.setOption("theme", style);
    }

    setLanguages(code_language) {
        this._language = code_language;
        this.codeMirror.setOption("mode", this._language);
    }

    setText(code_text) {
        this._value = code_text;
        this.codeMirror.setOption("value", this._value);
    }

    setlineNumbers(line_numbers) {
        this._lineNumbers = line_numbers;
        this.codeMirror.setOption("lineNumbers", this._lineNumbers);
    }



    disable() {
        let square = $(this._querySelector);
        console.log("disabling");
        square.find("textarea").css("caret-color", "transparent");
        square.find("textarea").prop('disabled', true);
        square.find(".CodeMirror").css("events", "none");
        square.find(".CodeMirror").css("CodeMirror-cursor","pointer");
        square.parent().css("cursor","pointer !important");
        this.codeMirror.focus();
        this.codeMirror.setOption("readOnly", "nocursor");

    }

    scale(mul) {
        let square = $(this._querySelector);
        square.css("width", this._width * mul);
        square.find(".CodeMirror").css("min-height", this._height * mul);
        square.find(".CodeMirror-scroll").css("min-height", this._height * mul);
        square.find(".CodeMirror-sizer").css("min-height", (this._height * mul)-10);
        square.css("padding", this._padding * mul);
        square.find(".CodeMirror").css("font-size", this._font_size * mul);

    }

    widthScale(width_select){
        this._scaledWidth = width_select;
        let square = $(this._querySelector);
        let h = (this._scaledWidth * this._height) / this._width
        let mul = h/this.height;
        square.css("width", this._scaledWidth);
        square.find(".CodeMirror").css("height", h);
        square.find(".CodeMirror-scroll").css("height", h);
        square.find(".CodeMirror").css("font-size", this._font_size*mul);
        square.css("padding", this._padding*mul);
        let background_color_after_frame = square.find(".CodeMirror").css("background-color");

        square.css("background-color", "white" );
        square.css("border-style", "ridge");
        square.css("border-color", this._frame_color);
        square.css("border-width", this._frame_size*mul);

    }

    set title(value) {
        this._title = value;
    }

    get title() {
        return this._title;
    }

    get code(){
        return `\`${this.codeMirror.getValue()}\``;
    }


    get querySelector() {
        return this._querySelector;
    }

    get value() {

        this._value.append("`");
        this._value.prepend("`");

        return this._value;
    }

    get language() {
        return this._language;
    }

    get theme() {
        return this._theme;
    }

    get frame_color() {
        return this._frame_color;
    }

    get width() {
        return this._width;
    }

    get height() {
        return this._height;
    }

    get padding() {
        return this._padding;
    }

    get font_size() {
        return this._font_size;
    }

    get lineNumbers() {
        return this._lineNumbers;
    }

    get scaledWidth() {
        return this._scaledWidth;
    }

    toJSON() {
        return {
            value : this.code,
            language : this.language,
            theme : this.theme,
            frame_color: this.frame_color,
            width : parseInt(this.width),
            height : parseInt(this.height),
            padding : parseInt(this.padding),
            font_size : parseInt(this.font_size),
            lineNumbers : this.lineNumbers,
            title : this.title
        }
    }
}
