<div class="row justify-content-center">
    <div class="col-8">
        <div class="row  align-content-center">
            <button class="dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="false" aria-controls="collapseSetting">Dimension Option
            </button>
        </div>


        <div class="collapse" id="collapseSetting">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil
                anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
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
    <code id="code">
        <script>
            let quadro = new CodeSquare(document.querySelector('#code'));
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


