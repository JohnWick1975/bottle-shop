import {createProductCard} from "./createCard.js";

export function addDrink(formElement, parent) {
    const form = new FormData(formElement);

    formElement.remove();
    fetch('/api/add.php', {
        method: 'POST',
        body: form
    })
        .then(response => response.json())
        .then(data => {
            formElement.remove();
            parent.append(createProductCard(data));
        });
}