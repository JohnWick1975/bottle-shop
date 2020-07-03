import {createNode} from "./createNode.js";

export function createDrinkForm(data, buttonName, handler) {

    const form = createNode('form', {
        submit: handler,
        class: 'js-edit-form'
    });

    const inputs = [
        {
            name: 'name',
            placeholder: 'Lithuanica'
        },
        {
            name: 'percentage',
            placeholder: '40%'
        },
        {
            name: 'size',
            placeholder: '700ml.'
        },
        {
            name: 'amount',
            placeholder: '20'
        },
        {
            name: 'price',
            placeholder: '15 €'
        },
        {
            name: 'image',
            placeholder: 'http://...'
        },

    ];

    inputs.forEach(input => {
        form.append(createNode('input', {
            ...input,
            value: data[input.name] ? data[input.name] : ''
        }))
    })

    const id = createNode('input', {
        name: 'id',
        type: 'hidden',
        value: data.id ? data.id : ''
    });

    const button = createNode('button', {}, buttonName);

    form.append(id, button);
    document.getElementById('admin').append(form);
}