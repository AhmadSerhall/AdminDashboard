    document.addEventListener('DOMContentLoaded', function () {
        interact('.draggable').draggable({
            inertia: true,
            modifiers: [
                interact.modifiers.restrictRect({
                    restriction: 'parent',
                    endOnly: true,
                }),
            ],
            autoScroll: true,
            listeners: { move: dragMoveListener },
        });
    
        interact('.draggable').dropzone({
            accept: '.draggable',
            overlap: 0.75,
            ondropactivate: function (event) {
                event.target.classList.add('drop-active');
            },
            ondropdeactivate: function (event) {
                event.target.classList.remove('drop-active');
            },
            ondragenter: function (event) {
                var dropzoneElement = event.target;
    
                dropzoneElement.classList.add('drop-target');
            },
            ondragleave: function (event) {
                event.target.classList.remove('drop-target');
            },
            ondrop: function (event) {
                var draggedElement = event.relatedTarget;
                var dropzoneElement = event.target;
            
                // Check if the dragged and dropzone elements are different
                if (draggedElement !== dropzoneElement) {
                    // Get the original positions of the dragged and dropzone elements
                    var originalRectDragged = draggedElement.getBoundingClientRect();
                    var originalRectDropzone = dropzoneElement.getBoundingClientRect();
            
                    // Swap positions of the dragged and dropzone elements
                    var container = draggedElement.parentElement;
                    var containerIndexDragged = Array.from(container.children).indexOf(draggedElement);
                    var containerIndexDropzone = Array.from(container.children).indexOf(dropzoneElement);
            
                    container.removeChild(draggedElement);
                    container.insertBefore(draggedElement, container.children[containerIndexDropzone]);
            
                    container.removeChild(dropzoneElement);
                    container.insertBefore(dropzoneElement, container.children[containerIndexDragged]);
            
                    // Get the final positions of the dragged and dropzone elements
                    var finalRectDragged = draggedElement.getBoundingClientRect();
                    var finalRectDropzone = dropzoneElement.getBoundingClientRect();
            
                    // Calculate the difference in positions
                    var deltaX = originalRectDragged.left - finalRectDragged.left;
                    var deltaY = originalRectDragged.top - finalRectDragged.top;
            
                    // Apply the transition effect
                    draggedElement.style.transition = 'transform 0.3s ease';
                    draggedElement.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
            
                    dropzoneElement.style.transition = 'transform 0.3s ease';
                    dropzoneElement.style.transform = `translate(${-deltaX}px, ${-deltaY}px)`;
            
                    // Reset the transition and transform after the animation
                    setTimeout(function () {
                        draggedElement.style.transition = '';
                        draggedElement.style.transform = '';
            
                        dropzoneElement.style.transition = '';
                        dropzoneElement.style.transform = '';
                    }, 300);
                }
            },         
            ondropdeactivate: function (event) {
                event.target.classList.remove('drop-target');
            },
        });
    });
    
    function dragMoveListener(event) {
        const target = event.target;
        const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
        const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
    
        target.style.transform = `translate(${x}px, ${y}px)`;
        target.setAttribute('data-x', x);
        target.setAttribute('data-y', y);
    }
    
    
    
    
    

