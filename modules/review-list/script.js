document.querySelectorAll(".toggle-btn").forEach((btn) => {
    //this iss attaching to every button
    // event delegation
    // listen to document

    // document.addEventListener('click', (e) => {
    //     if(e.target.contains)
    // })

    btn.addEventListener("click", (e) => {
        e.preventDefault();
        const card = e.target.closest(".review-card");
        const desc = card.querySelector(".description");
        const isExpanded = btn.getAttribute("data-expanded") === "true";

        if (!isExpanded) {
            desc.style.display = "block"; // remove line clamp
            desc.style.webkitLineClamp = "unset";
            btn.textContent = "Read Less";
            btn.setAttribute("data-expanded", "true");
        } else {
            desc.style.display = "-webkit-box"; 
            desc.style.webkitBoxOrient = "vertical";
            desc.style.webkitLineClamp = "3"; 
            btn.textContent = "Read More";
            btn.setAttribute("data-expanded", "false");
    }
    });
});