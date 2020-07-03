import {createProductCard} from "./createCard.js";

export function editDrink(formElement, parent) {
    const form = new FormData(formElement);
    fetch('/api/edit.php', {
        method: 'POST',
        body: form
    })
        .then(response => response.json())
        .then(data => {
                if (data) {
                    formElement.remove();
                    parent.replaceWith( createProductCard(data));
                }
            }
        )

}