<div class="row justify-content-center">
    <div class="col-8">
        <div class="row  align-content-center">
            <button class="dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="false" aria-controls="collapseSetting">Dimension Option
            </button>
        </div>


        <div class="collapse text-center" id="collapseSetting">
            <div class="row justify-content-center ">

                <div class="col align-content-center">
                    <label>Width(cm)</label>
                    <div class="col">
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn  active border border-secondary">
                                <input type="radio" name="options" id="30" checked> 30
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="70"> 70
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="100"> 100
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="120"> 120
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col align-content-center">
                    <label>Height(cm)</label>
                    <div class="col">
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn active border border-secondary">
                                <input type="radio" name="options" id="30" checked> 30
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="70"> 70
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="100"> 100
                            </label>
                            <label class="btn border border-secondary">
                                <input type="radio" name="options" id="120"> 120
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                <label>FontSize</label>
            </div>
            <label class="btn">
                <input type="number" name="options" id="100">
            </label>


        </div>


        <div class="row">
            <div class="col">
                <button type="button">Style</button>
            </div>
            <div class="col">
                <select class="" id="style">
                    <option>monokai</option>
                    <option>base16-light</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="button">Language</button>
            </div>
            <div class="col">
                <select id="language">
                    <option>javascript</option>
                    <option>python</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="button">Code block color</button>
            </div>
            <div class="col">
                <input class="dropdown-toggle" id="frame-color" type="color" value="#ff0000">
            </div>
        </div>
    </div>
</div>
<!-- Console -->
<div class="row justify-content-center">
    <code>
        <script>
            let quadro = new CodeSquare($('script').last().parent().get(0));
            quadro.getSquare();
            quadro.updateStyle();
        </script>
    </code>

</div>

<div class="row justify-content-center">
    <div class="col-3 mx-1">
        <button type="button">Add to Cart</button>
    </div>
    <div class="col-3 mx-1">
        <button type="button">BuyNow</button>
    </div>


