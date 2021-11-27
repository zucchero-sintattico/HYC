<div class="row">
    <div class="col col-8">
        <div class="row">
            <button class="dropdown-toggle" type="button">Dimension Option</button>
        </div>

        <div class="row">
            <div class="col">
                <button  type="button">Style</button>
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
                <select  id="language">
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
                <input class="dropdown-toggle" id = "frame-color" type="color" value="#ff0000">
            </div>
        </div>
    </div>
</div>
<!-- Console -->
<div class="row justify-content-center">
    <code class="col-6" id="code">
        <script>
            let quadro = new CodeSquare(document.querySelector('#code'));
            quadro.getSquare();
            quadro.updateStyle();
        </script>
    </code>
</div>
<div class="row">
    <div class="col-3 mx-1">
        <button type="button">Add to Cart</button>
    </div>
    <div class="col-3 mx-1">
        <button type="button">BuyNow</button>
    </div>