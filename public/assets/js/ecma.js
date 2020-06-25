let pixels;

/*fetch('/pixels/get.php')
    .then(response => response.json())
    .then(data => pixels = data);*/

const form = new FormData();
form.append('x', '35');
form.append('y', '10');
form.append('color', 'yellow');

const button = document.querySelector('#btn');

button.addEventListener('click', () => {

    fetch('/pixels/create.php', {
        method: 'POST',
        body: form
    })
        .then(response => response.text())
        .then(data => console.log(data));
})