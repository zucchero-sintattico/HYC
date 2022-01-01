function animateProductsOnHover(product, forward, title, description){

    let informationStack = [title, description];

    if(forward){
        product.animate([
                {
                    backgroundColor: "white"
                }],

            {
                duration: 300, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.01,1,-0.18)"
            }
        );

        for(let i = 0; i< informationStack.length; i++){
            let opac = 1;
            if(i==0){
               opac = 0.8;
            }
            informationStack[i].animate([
                    {
                        opacity: opac,
                        zIndex: 99999
                    }],

                {
                    duration: 300, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.01,1,-0.18)"
                }
            );
        }

        product.animate([
                {
                    transformOrigin: "center",
                    transform: "scale(1.35, 1.35)",
                    opacity: 1,
                    zIndex: 99999
                }],

            {
                duration: 300, iterations: 1, fill: "forwards", delay:200, easing: "cubic-bezier(1,.02,.5,1.37)"
            }
        );

    }else{

        product.animate([
                {
                    backgroundColor: "transparent"
                }],

            {
                duration: 50, iterations: 1, fill: "forwards", delay:50, easing: "cubic-bezier(1,.01,1,-0.18)"
            }
        );

        for(let i = 0; i< informationStack.length; i++) {
            informationStack[i].animate([
                    {
                        opacity: 0,
                        zIndex: 10
                    }],

                {
                    duration: 50, iterations: 1, fill: "forwards", delay: 50, easing: "cubic-bezier(1,.02,.5,1.37)"
                }
            );
        }

        product.animate(
            {
                transformOrigin: "center",
                transform: "scale(1, 1)",
                opacity: 1,
                zIndex: 10
            },
            {
                duration: 50, iterations: 1, fill: "forwards", delay:50, easing: "cubic-bezier(1,.02,.5,1.37)"
            }
        );


    }

}

let goToEditorAnimStarted = false;

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
        let refer = this;
        square.on("click", function(){

            refer.resetClickFunctionAndAnimation(dest)

        })
    }

    resetClickFunctionAndAnimation(dest){
        goToEditorAnimStarted = true;
        let animDurationBeforeChangePage = 750;
        let windowWidthHalf = $(window).height()/2;
        let windowHeightHalf = $(window).width()/2;

        $("body")[0].animate({
            transformOrigin: `${windowWidthHalf} ${windowHeightHalf}`,
            transform:"scale(1.04,1.04)",
            backgroundColor: "#989898",
            filter: "blur(2px)",
            opacity: 0.5
        },{duration:animDurationBeforeChangePage, easing:"ease-out", fill:"forwards"});

        window.setTimeout(()=>{
            window.location.replace(dest);
            goToEditorAnimStarted = false;
        },animDurationBeforeChangePage)
    }

    createAnimationAndSetDescriptionInformation(dest){
        this.setDestinationOnClick(dest);
        let square = $(this._querySelector);
        square.css("background-color","transparent");
        square.parent().parent().css("box-sizing", "border-box");
        let refer = this;
        square.on("mouseenter", function(){
            $(".categories > div").css("z-index",10);
            square.parent().parent().css("z-index", 9000);
            square.parent().parent().find(".info").css("display", "inline-block");
            square.parent().parent().parent().parent().parent().css("z-index",99999);

            $(this).css("cursor", "pointer");

            if($(window).width() > 768){

                //square.parent().parent().css("position", "relative");
                let descriptionAndTitle = $(this).parent().parent().find(".paintingInfo");

                square.parent().parent().find(".info").css("z-index", 99999);
                animateProductsOnHover($(this).parent().parent()[0], true, descriptionAndTitle[0], descriptionAndTitle[1]);

                window.setTimeout(() => {
                    $(this).parent().parent().css("cursor", "pointer");
                    $(this).parent().parent().on("click", function(){
                        refer.resetClickFunctionAndAnimation(dest)
                    });
                }, 500);
            }

        });

        square.parent().parent().on("mouseleave", function(){
            if($(window).width() > 768){
                if(!goToEditorAnimStarted){
                    let descriptionAndTitle = $(this).find(".paintingInfo");

                    animateProductsOnHover(($(this))[0], false, descriptionAndTitle[0], descriptionAndTitle[1]);

                    square.parent().parent().find(".info").css("z-index",9000);

                    window.setTimeout(() => {
                        $(this).css("cursor", "revert");
                        $(this).off("click");
                        square.parent().css("z-index", 10);
                    }, 100);
                }

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
        square.find(".CodeMirror-lines").css("cursor","pointer");

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

    disablePadding(){
        this._padding = 0
        let square = $(this._querySelector);
        square.css("padding", this._padding);
        square.css("background-color","transparent");
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

    toJSONInShowCase(desc, cat){
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
            title : this.title,
            description: desc,
            category: cat
        }
    }
}
