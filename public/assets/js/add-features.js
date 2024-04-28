const featureInput = document.getElementById("feature-input");
const featuresList = document.getElementById("features-list");
const addFeaturesForm = document.getElementById("subscription-form");



function addFeature(featureText) {
    let text = featureText || featureInput.value;
    let existingFeature = Array.from(featuresList.children).some(li => li.textContent.trim() === text);
    if (text !== '' && !existingFeature) {
        let li = document.createElement("li");
        li.innerHTML = text;
        featuresList.appendChild(li);

        // Create hidden input field dynamically
        let hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "features[]";
        hiddenInput.value = text;
        addFeaturesForm.appendChild(hiddenInput);

        let span = document.createElement("span");
        span.innerHTML = '\u00d7';
        li.appendChild(span);
    }
    featureInput.value = "";
}




featuresList.addEventListener("click", function(e) {
    if (e.target.tagName === "LI") {
        e.target.classList.toggle("checked");
    } else if (e.target.tagName === "SPAN") {
        let featureText = e.target.parentElement.firstChild.nodeValue.trim();
        let hiddenInput = document.querySelector(`input[name="features[]"][value="${featureText}"]`);
        if (hiddenInput) {
            hiddenInput.remove();
        }
        e.target.parentElement.remove();
    }
}, false);