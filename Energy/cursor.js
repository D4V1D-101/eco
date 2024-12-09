const cursorDot = document.querySelector("[data-cursor-dot]");
const cursorOutline = document.querySelector("[data-cursor-outline]");

window.addEventListener("mousemove", function (e) {
    const posX = e.clientX;
    const posY = e.clientY;
    cursorDot.style.left = `${posX}px`;
    cursorDot.style.top = `${posY}px`;
    cursorOutline.animate(
        {
            left: `${posX}px`,
            top: `${posY}px`,
        },
        { duration: 50, fill: "forwards" }
    );
});

document.querySelectorAll("select").forEach((select) => {
    select.addEventListener("mouseenter", () => {
        cursorDot.style.display = "block";
        cursorOutline.style.display = "block";
    });
    select.addEventListener("mouseleave", () => {
        cursorDot.style.display = "block";
        cursorOutline.style.display = "block";
    });
});

/* cursorOutline.style.left = `${posX}px`;
cursorOutline.style.top = `${posY}px`;  */