import {createProductCard} from "./createCard.js";
import {createNode} from "./createNode.js";

const main = document.querySelector('main');

fetch('/api/get.php')
    .then(response => response.json())
    .then(data => createProductContainer(data));

function createProductContainer(data) {
    const container = createNode('div', {class: 'wrapper-catalog'});

    main.append(container);
    data.forEach(drink => {
        container.append(createProductCard(drink));
    });
}