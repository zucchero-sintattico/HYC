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


function adaptableSection(content, title) {
    let result = `<section>
                    <header class="text-center">
                        <h1>${title}</h1>
                    </header>
                    <div class="container-fluid">
                    <div class="row justify-content-center">                
                    `;
    result += content;
    result += `</div>
            </div>
        </section>`;
    return result;
}

