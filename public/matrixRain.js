function createMatrixSidebar(position){
    const c = document.createElement("canvas");

    c.className = `matrix - sidebar ${position}`;
    document.body.appendChild(c);

    const ctx = c.getContext("2d");

    c.height = window.innerHeight;
    c.width = window.innerWidth * 0.3; // 30% width

    return { canvas: c, context: ctx };
}

function matrixRain(c, ctx){
    const fontSize = 10;
    const columns = c.width / fontSize;
    const drops = [];

    for (let x = 0; x < columns; x++) {
        drops[x] = 1;
    }

    setInterval(function () {
        ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
        ctx.fillRect(0, 0, c.width, c.height);
        ctx.fillStyle = "#33FF33";
        ctx.font = `${fontSize}px arial`;

        for (let i = 0; i < drops.length; i++) {
            const text = String.fromCharCode(Math.floor(Math.random() * 33) + 33);

            ctx.fillText(text, i * fontSize, drops[i] * fontSize);
            if (drops[i] * fontSize > c.height && Math.random() > 0.975) {
                drops[i] = 0;
            }

            drops[i]++;
        }
    }, 60);
}

document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector('.friday-page')) {
        const leftCanvasData = createMatrixSidebar("left");
        const rightCanvasData = createMatrixSidebar("right");

        matrixRain(leftCanvasData.canvas, leftCanvasData.context);
        matrixRain(rightCanvasData.canvas, rightCanvasData.context);
    }
});
