import {createNode} from "./createNode.js";
import {deleteDrink} from "./deleteDrink.js";
import {createEditForm} from "./createEditForm.js";


export function createProductCard(value) {

    const card = createNode('div', {class: 'card'});

    const cardInfo = createNode('div', {class: 'card-info'});

    const p1 = createNode('p', {class: 'price'}, 'Price: ', value.price, '€');

    const image = createNode('div', {class: 'card-image', style: `background-image: url('${value.image}')`});

    const p2 = createNode('p', {}, value.name);

    const p3 = createNode('p', {}, value.percentage, '%');

    const p4 = createNode('p', {}, value.size, 'ml.')

    const pButton = createNode('p', {});


    const butEdit = createNode('button', {class: 'edit', click: () => createEditForm(value, card)}, 'Edit');


    const butDelete = createNode('button', {class: 'delete', click: () => deleteDrink(value.id, card)}, 'Delete');


    pButton.append(butEdit, butDelete);

    const p5 = createNode('p', {}, 'Available ', value.amount)

    cardInfo.append(p1, image, p2, p3, p4, pButton);
    card.append(cardInfo, p5);

    return card;
}