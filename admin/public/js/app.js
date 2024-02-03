
    // document.addEventListener('DOMContentLoaded', function () {
    //     let dragged;

    //     document.addEventListener('dragstart', function (event) {
    //         dragged = event.target;
    //         event.target.style.opacity = 0.5;
    //     });

    //     document.addEventListener('dragend', function (event) {
    //         event.target.style.opacity = '';
    //     });

    //     document.addEventListener('dragover', function (event) {
    //         event.preventDefault();
    //     });

    //     document.addEventListener('dragenter', function (event) {
    //         if (event.target.className === 'small-container') {
    //             event.target.style.border = '2px dashed #000';
    //         }
    //     });

    //     document.addEventListener('dragleave', function (event) {
    //         if (event.target.className === 'small-container') {
    //             event.target.style.border = '';
    //         }
    //     });

    //     document.addEventListener('drop', function (event) {
    //         event.preventDefault();
    //         if (event.target.className === 'small-container') {
    //             event.target.style.border = '';
    //             dragged.parentNode.removeChild(dragged);
    //             event.target.appendChild(dragged);
    //         }
    //     });
    // });
    // document.addEventListener('DOMContentLoaded', function () {
    //     interact('.interact-container').draggable({
    //         inertia: true,
    //         restrict: {
    //             restriction: "parent",
    //             endOnly: true,
    //         },
    //     }).dropzone({
    //         accept: '.interact-container',
    //         overlap: 0.75,

    //         ondropactivate: function (event) {
    //             event.target.classList.add('drop-active');
    //         },
    //         ondropdeactivate: function (event) {
    //             event.target.classList.remove('drop-active');
    //         },
    //         ondragenter: function (event) {
    //             var draggableElement = event.relatedTarget;
    //             var dropzoneElement = event.target;

    //             dropzoneElement.classList.add('drop-target');
    //             draggableElement.classList.add('can-drop');
    //         },
    //         ondragleave: function (event) {
    //             event.target.classList.remove('drop-target');
    //             event.relatedTarget.classList.remove('can-drop');
    //         },
    //         ondrop: function (event) {
    //             var draggedElement = event.relatedTarget;
    //             var dropzoneElement = event.target;

    //             var tempId = dropzoneElement.id;
    //             dropzoneElement.id = draggedElement.id;
    //             draggedElement.id = tempId;
    //         },
    //         ondropdeactivate: function (event) {
    //             event.target.classList.remove('drop-target');
    //             event.relatedTarget.classList.remove('can-drop');
    //         }
    //     });
    // });
    interact('.draggable').draggable({
        inertia: true,
        modifiers: [
            interact.modifiers.restrictRect({
                restriction: 'parent',
                endOnly: true,
            }),
        ],
        autoScroll: true,
        onmove: dragMoveListener,
    });

    function dragMoveListener(event) {
        const target = event.target;
        const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
        const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

        target.style.transform = `translate(${x}px, ${y}px)`;
        target.setAttribute('data-x', x);
        target.setAttribute('data-y', y);
    }

