console.log('veikia');
const pixels = document.querySelectorAll('.pixel');
const notification = document.createElement('div');
const p1 = document.createElement('p');
const p2 = document.createElement('p');
const p3 = document.createElement('p');

pixels.forEach((pixel) => {
    pixel.addEventListener('mouseover', () => {

        notification.classList.add('pixel-notification', 'animate__animated', 'animate__flipInY');

        notification.style.backgroundColor = pixel.style.backgroundColor;

        p1.innerHTML = "Top coordinates are " + pixel.style.top;
        notification.append(p1);

        p2.innerHTML = "Left coordinates are " + pixel.style.left;
        notification.append(p2);

        p3.innerHTML = "color " + pixel.style.backgroundColor;
        notification.append(p3);

        pixel.append(notification);
    });
});

pixels.forEach((pixel) => {
    pixel.addEventListener('mouseleave', () => {
        pixel.innerHTML = '';
    });
});

