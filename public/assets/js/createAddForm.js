import {createDrinkForm} from "./createDrinkForm.js";
import {addDrink} from "./addDrink.js";

export function createAddForm(container) {
    const addHandler = e => {
        e.preventDefault();
        addDrink(e.target, container);
    };
    createDrinkForm({}, 'Create', addHandler);
}