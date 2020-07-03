import {createProductCard} from "./createCard.js";
import {createNode} from "./createNode.js";
import {createAddForm} from "./createAddForm.js";

const main = document.getElementById('admin');

fetch('/api/get.php')
    .then(response => response.json())
    .then(data => createProductContainer(data));

function createProductContainer(data) {
    const container = createNode('div', {class: 'wrapper-catalog'});
    addButton(container);

    main.append(container);
    data.forEach(drink => {
        container.append(createProductCard(drink));
    });
}

function addButton(container) {
    const addButton = createNode('button', {
        class: 'new-bottle',
        click: () => createAddForm(container)
    }, 'Create New');
    main.append(addButton);
}