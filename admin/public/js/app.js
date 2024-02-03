
    document.addEventListener('DOMContentLoaded', function () {
        let dragged;

        document.addEventListener('dragstart', function (event) {
            dragged = event.target;
            event.target.style.opacity = 0.5;
        });

        document.addEventListener('dragend', function (event) {
            event.target.style.opacity = '';
        });

        document.addEventListener('dragover', function (event) {
            event.preventDefault();
        });

        document.addEventListener('dragenter', function (event) {
            if (event.target.className === 'small-container') {
                event.target.style.border = '2px dashed #000';
            }
        });

        document.addEventListener('dragleave', function (event) {
            if (event.target.className === 'small-container') {
                event.target.style.border = '';
            }
        });

        document.addEventListener('drop', function (event) {
            event.preventDefault();
            if (event.target.className === 'small-container') {
                event.target.style.border = '';
                dragged.parentNode.removeChild(dragged);
                event.target.appendChild(dragged);
            }
        });
    });
