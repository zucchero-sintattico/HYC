let value = "console.log('ciao mondo')";
let language = 'javascript';
let theme = 'monokai';
let frame_color = 'red';
let width = 300;
let height = 300;
let padding = 10;
let font_size = 10;
let codeMirror;


class CodeSquare {
    constructor(querySelector) {
        this.querySelector = querySelector;
    }

    getSquare() {
        let square = $(this.querySelector);
        square.css("width", width);
        square.css("padding", padding);
        square.css("background-color", frame_color);
        codeMirror = CodeMirror(this.querySelector, {
            lineNumbers: true,
            tabSize: 2,
            value: value,
            mode: language,
            theme: theme,
        });

        return codeMirror;
    }

    updateStyle(){
        let square = $(this.querySelector);
        square.find(".CodeMirror").css("font-size", font_size);
        square.find(".CodeMirror").css("min-height", height );
        square.find(".CodeMirror").css("height", height );
        square.find(".CodeMirror-scroll").css("min-height", height);
        square.find("textarea").css("max-height", height);
    }

    setWidth(x){
        let square = $(this.querySelector);
        width = x;
        square.css("width", width);
    }

    setHeight(y){
        let square = $(this.querySelector);
        height = y;
        square.find(".CodeMirror").css("min-height", height);
        square.find(".CodeMirror-scroll").css("min-height", height);
    }

    setPadding(padding_value){
        let square = $(this.querySelector);
        padding = padding_value;
        square.css("padding", padding);
    }

    setFramecolor(color){
        let square = $(this.querySelector);
        frame_color = color;
        square.css("background-color", frame_color);

    }

    setFontSize(size){
        font_size = size;
        let square = $(this.querySelector);
        square.find(".CodeMirror").css("font-size", font_size);

    }

    setStyle(style){
        theme = style;
        codeMirror.setOption("theme", style);
    }

    disable(){
        let square = $(this.querySelector);
        square.find("textarea").css("caret-color", "transparent");
        square.find("textarea").prop('disabled', true);

    }

}
