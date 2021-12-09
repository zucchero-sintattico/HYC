let value = "console.log('ciao mondo')";
let language = 'javascript';
let theme = 'monokai';
let frame_color = 'red';
let width = 100;
let height = 100;
let padding = 9;
let font_size = 2;
let lineNumbers = true;
let codeMirror;
let scaleMul = 1;


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
            lineNumbers: lineNumbers,
            tabSize: 2,
            value: value,
            mode: language,
            theme: theme,
        });

        return codeMirror;
    }

    updateStyle() {
        let square = $(this.querySelector);
        square.find(".CodeMirror").css("font-size", font_size);
        square.find(".CodeMirror").css("min-height", height);
        square.find(".CodeMirror").css("height", height);
        square.find(".CodeMirror-scroll").css("min-height", height);
        square.find("textarea").css("max-height", height);
    }

    setWidth(x) {
        let square = $(this.querySelector);
        width = x;
        square.css("width", width);
    }

    setHeight(y) {
        let square = $(this.querySelector);
        height = y;
        square.find(".CodeMirror").css("min-height", height);
        square.find(".CodeMirror-scroll").css("min-height", height);
    }

    setPadding(padding_value) {
        let square = $(this.querySelector);
        padding = padding_value;
        square.css("padding", padding);
    }

    setFramecolor(color) {
        let square = $(this.querySelector);
        frame_color = color;
        square.css("background-color", frame_color);

    }

    setFontSize(size) {
        font_size = size;
        let square = $(this.querySelector);
        square.find(".CodeMirror").css("font-size", font_size);

    }

    setStyle(style) {
        theme = style;
        codeMirror.setOption("theme", style);
    }

    setLanguages(code_language) {
        language = code_language;
        codeMirror.setOption("mode", language);
    }

    setText(code_text) {
        value = code_text;
        codeMirror.setOption("value", value);
    }

    setlineNumbers(line_numbers) {
        lineNumbers = line_numbers;
        codeMirror.setOption("lineNumbers", lineNumbers);
    }

    disable() {
        let square = $(this.querySelector);
        square.find("textarea").css("caret-color", "transparent");
        square.find("textarea").prop('disabled', true);
    }

    scale(mul) {
        let square = $(this.querySelector);
        square.css("width", width * mul);
        square.find(".CodeMirror").css("min-height", height * mul);
        square.find(".CodeMirror-scroll").css("min-height", height * mul);
        square.css("padding", padding * mul);
        square.find(".CodeMirror").css("font-size", font_size * mul);
    }


}
