const urlprincipal = "http://localhost/academia40/Multimedios%2002/MVCProfe/";
//const urlprincipal = "https://paginas-web-cr.com/condominio/";


function eliminar(ids){
    var myModal = new bootstrap.Modal(document.getElementById('modelId'));
    myModal.show();
    $("#ids").text(ids);
    $("#idsdelete").val(ids);                 
}

function eliminarDatosGeneral(action){
    const idsdelete = $("#idsdelete").val();            

    httpRequest(urlprincipal+action+idsdelete, function(){                
        const tbody = document.querySelector("#myTable");
        const fila = document.querySelector("#fila-"+idsdelete);                
        tbody.removeChild(fila);
    });    

    var myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modelId'));
    myModal.hide();
}

//Search in the table
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#resultadoTabla tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


////////////////Table col move
var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
function listenerDragStart(e) {
	e.dataTransfer.effectAllowed = 'move';
	e.dataTransfer.setData('text', $(this).text());

	if (!isIE11) {
		//Create column's container
		var dragGhost = document.createElement("table");
		dragGhost.classList.add("tableGhost");
		dragGhost.classList.add("table-bordered");
		//in order tor etrieve the column's original width
		var srcStyle = document.defaultView.getComputedStyle(this);
		dragGhost.style.width = srcStyle.getPropertyValue("width");
		
		//Create head's clone
		var theadGhost = document.createElement("thead");
		var thisGhost = this.cloneNode(true);
		thisGhost.style.backgroundColor = "red";
		theadGhost.appendChild(thisGhost);
		dragGhost.appendChild(theadGhost);

		var srcTxt = $(this).text();
		var srcIndex = $("th:contains(" + srcTxt + ")").index() + 1;
		//Create body's clone
		var tbodyGhist = document.createElement("tbody");
		$.each($('.table tr td:nth-child(' + srcIndex + ')'), function (i, val) {
			var currentTR = document.createElement("tr");
			var currentTD = document.createElement("td");
			currentTD.innerText = $(this).text();
			currentTR.appendChild(currentTD);
			tbodyGhist.appendChild(currentTR);
		});
		dragGhost.appendChild(tbodyGhist);
		
		//Hide ghost
		dragGhost.style.position = "absolute";
		dragGhost.style.top = "-1500px";
		
		document.body.appendChild(dragGhost);
		e.dataTransfer.setDragImage(dragGhost, 0, 0);
	}
}

function listenerDragOver(e) {
	if (e.preventDefault) {
		e.preventDefault();
	}
	e.dataTransfer.dropEffect = 'move';
	return false;
}

function listenerDragEnter(e) {
	this.classList.add('over');
}

function listenerDragLeave(e) {
	this.classList.remove('over');
}

function listenerDrop(e) {
	if (e.preventDefault) {
		e.preventDefault();
	}
	if (e.stopPropagation) {
		e.stopPropagation();
	}

	var srcTxt = e.dataTransfer.getData('text');
	var destTxt = $(this).text();
	if (srcTxt != destTxt) {
		var dragSrcEl = $(".table th:contains(" + srcTxt + ")");
		var srcIndex = dragSrcEl.index() + 1;
		var destIndex = $("th:contains(" + destTxt + ")").index() + 1;
		dragSrcEl.insertAfter($(this));
		$.each($('.table tr td:nth-child(' + srcIndex + ')'), function (i, val) {
			var index = i + 1;
			$(this).insertAfter($('.table tr:nth-child(' + index + ') td:nth-child(' + destIndex + ')'));
		});
	}
	return false;
}

function listenerDragEnd(e) {
	var cols = document.querySelectorAll('th');
	[].forEach.call(cols, function (col) {
		col.classList.remove('over');
		col.style.opacity = 1;
	});
}

$(document).ready(function () {
	var cols = document.querySelectorAll('th');
	[].forEach.call(cols, function (col) {
		col.addEventListener('dragstart', listenerDragStart, false);
		col.addEventListener('dragenter', listenerDragEnter, false);
		col.addEventListener('dragover', listenerDragOver, false);
		col.addEventListener('dragleave', listenerDragLeave, false);
		col.addEventListener('drop', listenerDrop, false);
		col.addEventListener('dragend', listenerDragEnd, false);
	});
});
///End Col move

//Complete move col table
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('table');

    let draggingEle;
    let draggingColumnIndex;
    let placeholder;
    let list;
    let isDraggingStarted = false;

    // The current position of mouse relative to the dragging element
    let x = 0;
    let y = 0;

    // Swap two nodes
    const swap = function (nodeA, nodeB) {
        const parentA = nodeA.parentNode;
        const siblingA = nodeA.nextSibling === nodeB ? nodeA : nodeA.nextSibling;

        // Move `nodeA` to before the `nodeB`
        nodeB.parentNode.insertBefore(nodeA, nodeB);

        // Move `nodeB` to before the sibling of `nodeA`
        parentA.insertBefore(nodeB, siblingA);
    };

    // Check if `nodeA` is on the left of `nodeB`
    const isOnLeft = function (nodeA, nodeB) {
        // Get the bounding rectangle of nodes
        const rectA = nodeA.getBoundingClientRect();
        const rectB = nodeB.getBoundingClientRect();

        return rectA.left + rectA.width / 2 < rectB.left + rectB.width / 2;
    };

    const cloneTable = function () {
        const rect = table.getBoundingClientRect();

        list = document.createElement('div');
        list.classList.add('clone-list');
        list.style.position = 'absolute';
        list.style.left = `${rect.left}px`;
        list.style.top = `${rect.top}px`;
        table.parentNode.insertBefore(list, table);

        // Hide the original table
        table.style.visibility = 'hidden';

        // Get all cells
        const originalCells = [].slice.call(table.querySelectorAll('tbody td'));

        const originalHeaderCells = [].slice.call(table.querySelectorAll('th'));
        const numColumns = originalHeaderCells.length;

        // Loop through the header cells
        originalHeaderCells.forEach(function (headerCell, headerIndex) {
            const width = parseInt(window.getComputedStyle(headerCell).width);

            // Create a new table from given row
            const item = document.createElement('div');
            item.classList.add('draggable');

            const newTable = document.createElement('table');
            newTable.setAttribute('class', 'clone-table');
            newTable.style.width = `${width}px`;

            // Header
            const th = headerCell.cloneNode(true);
            let newRow = document.createElement('tr');
            newRow.appendChild(th);
            newTable.appendChild(newRow);

            const cells = originalCells.filter(function (c, idx) {
                return (idx - headerIndex) % numColumns === 0;
            });
            cells.forEach(function (cell) {
                const newCell = cell.cloneNode(true);
                newCell.style.width = `${width}px`;
                newRow = document.createElement('tr');
                newRow.appendChild(newCell);
                newTable.appendChild(newRow);
            });

            item.appendChild(newTable);
            list.appendChild(item);
        });
    };

    const mouseDownHandler = function (e) {
        draggingColumnIndex = [].slice.call(table.querySelectorAll('th')).indexOf(e.target);

        // Determine the mouse position
        x = e.clientX - e.target.offsetLeft;
        y = e.clientY - e.target.offsetTop;

        // Attach the listeners to `document`
        document.addEventListener('mousemove', mouseMoveHandler);
        document.addEventListener('mouseup', mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        if (!isDraggingStarted) {
            isDraggingStarted = true;

            cloneTable();

            draggingEle = [].slice.call(list.children)[draggingColumnIndex];
            draggingEle.classList.add('dragging');

            // Let the placeholder take the height of dragging element
            // So the next element won't move to the left or right
            // to fill the dragging element space
            placeholder = document.createElement('div');
            placeholder.classList.add('placeholder');
            draggingEle.parentNode.insertBefore(placeholder, draggingEle.nextSibling);
            placeholder.style.width = `${draggingEle.offsetWidth}px`;
        }

        // Set position for dragging element
        draggingEle.style.position = 'absolute';
        draggingEle.style.top = `${draggingEle.offsetTop + e.clientY - y}px`;
        draggingEle.style.left = `${draggingEle.offsetLeft + e.clientX - x}px`;

        // Reassign the position of mouse
        x = e.clientX;
        y = e.clientY;

        // The current order
        // prevEle
        // draggingEle
        // placeholder
        // nextEle
        const prevEle = draggingEle.previousElementSibling;
        const nextEle = placeholder.nextElementSibling;

        // // The dragging element is above the previous element
        // // User moves the dragging element to the left
        if (prevEle && isOnLeft(draggingEle, prevEle)) {
            // The current order    -> The new order
            // prevEle              -> placeholder
            // draggingEle          -> draggingEle
            // placeholder          -> prevEle
            swap(placeholder, draggingEle);
            swap(placeholder, prevEle);
            return;
        }

        // The dragging element is below the next element
        // User moves the dragging element to the bottom
        if (nextEle && isOnLeft(nextEle, draggingEle)) {
            // The current order    -> The new order
            // draggingEle          -> nextEle
            // placeholder          -> placeholder
            // nextEle              -> draggingEle
            swap(nextEle, placeholder);
            swap(nextEle, draggingEle);
        }
    };

    const mouseUpHandler = function () {
        // // Remove the placeholder
        placeholder && placeholder.parentNode.removeChild(placeholder);

        draggingEle.classList.remove('dragging');
        draggingEle.style.removeProperty('top');
        draggingEle.style.removeProperty('left');
        draggingEle.style.removeProperty('position');

        // Get the end index
        const endColumnIndex = [].slice.call(list.children).indexOf(draggingEle);

        isDraggingStarted = false;

        // Remove the `list` element
        list.parentNode.removeChild(list);

        // Move the dragged column to `endColumnIndex`
        table.querySelectorAll('tr').forEach(function (row) {
            const cells = [].slice.call(row.querySelectorAll('th, td'));
            draggingColumnIndex > endColumnIndex
                ? cells[endColumnIndex].parentNode.insertBefore(
                      cells[draggingColumnIndex],
                      cells[endColumnIndex]
                  )
                : cells[endColumnIndex].parentNode.insertBefore(
                      cells[draggingColumnIndex],
                      cells[endColumnIndex].nextSibling
                  );
        });

        // Bring back the table
        table.style.removeProperty('visibility');

        // Remove the handlers of `mousemove` and `mouseup`
        document.removeEventListener('mousemove', mouseMoveHandler);
        document.removeEventListener('mouseup', mouseUpHandler);
    };

    table.querySelectorAll('th').forEach(function (headerCell) {
        headerCell.classList.add('draggable');
        headerCell.addEventListener('mousedown', mouseDownHandler);
    });
});
//End mov complete table