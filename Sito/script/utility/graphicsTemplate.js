function horizontalSection(content, title) {
    let result = `<section>
                    <header>
                        <h1>${title}</h1>
                    </header>

                    <div class="container-fluid">
                    <div class="row flex-row flex-nowrap">
                    `;

    result += content;

    result += `</div>
            </div>
        </section>`;

    return result;
}


function adattableSection(content, title) {
    let result = `<section>
                    <header>
                        <h1>${title}</h1>
                    </header>

                    <div class="container">
                    <div class="row">
                    
                    `;

    result += content;

    result += `</div>
            </div>
        </section>`;

    return result;
}

