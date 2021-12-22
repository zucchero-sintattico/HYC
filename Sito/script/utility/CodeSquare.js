
class CodeSquare {
    constructor(querySelector) {
        this._value = "console.log('ciao mondo')";
        this._language = 'javascript';
        this._theme = 'monokai';
        this._frame_color = 'red';
        this._width = 100;
        this._height = 100;
        this._padding = 7;
        this._font_size = 4;
        this._lineNumbers = true;
        this.codeMirror = null;
        this._scaledWidth = 100;
        this._querySelector = querySelector;

    }

    setQuerySelector(querySelector){
        this._querySelector = querySelector
    }

    getSquare() {
        let square = $(this._querySelector);
        square.css("width", this._width);
        square.css("padding", this._padding);
        square.css("background-color", this._frame_color);
        this.codeMirror = CodeMirror(this._querySelector, {
            lineNumbers: this._lineNumbers,
            tabSize: 2,
            value: this._value,
            mode: this._language,
            theme: this._theme,
            scrollbarStyle: null,
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
        square.css("background-color", this._frame_color);

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
        square.find("textarea").css("caret-color", "transparent");
        square.find("textarea").prop('disabled', true);
        square.find(".CodeMirror").css("events", "none");
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
    }

    get code(){
        return this.codeMirror.getValue();
    }


    get querySelector() {
        return this._querySelector;
    }

    get value() {
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
            value : this.code(),
            language : this.language(),
            theme : this.theme(),
            frame_color: this.frame_color(),
            width : this.width(),
            height : this.height(),
            padding : this.padding(),
            font_size : this.font_size(),
            lineNumbers : this.lineNumbers()
        }
    }
}
