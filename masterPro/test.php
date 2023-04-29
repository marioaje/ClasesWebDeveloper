
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>HTML DOM - Drag and drop table column</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="/assets/css/demo.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap">
        <style>
            .table {
                border: 1px solid #ccc;
                border-collapse: collapse;
            }
            .table th,
            .table td {
                border: 1px solid #ccc;
            }
            .table th,
            .table td {
                padding: 0.5rem;
            }
            .draggable {
                cursor: move;
                user-select: none;
            }
            .placeholder {
                background-color: #edf2f7;
                border: 2px dashed #cbd5e0;
            }
            .clone-list {
                border-left: 1px solid #ccc;
                border-top: 1px solid #ccc;
                display: flex;
            }
            .clone-table {
                border-collapse: collapse;
                border: none;
            }
            .clone-table th,
            .clone-table td {
                border: 1px solid #ccc;
                border-left: none;
                border-top: none;
                padding: 0.5rem;
            }
            .dragging {
                background: #fff;
                border-left: 1px solid #ccc;
                border-top: 1px solid #ccc;
                z-index: 999;
            }
        </style>
    </head>
    <body>
        <table id="table" class="table">
            <thead>
                <tr>
                    <th data-type="number">No.</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Date of birth</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Andrea</td>
                    <td>Ross</td>
                    <td>1985-12-24</td>
                    <td>95945 Rodrick Crossroad</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Penelope</td>
                    <td>Mills</td>
                    <td>1978-8-11</td>
                    <td>81328 Eleazar Fork</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sarah</td>
                    <td>Grant</td>
                    <td>1981-5-9</td>
                    <td>5050 Boyer Forks</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Vanessa</td>
                    <td>Roberts</td>
                    <td>1980-9-27</td>
                    <td>765 Daryl Street</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Oliver</td>
                    <td>Alsop</td>
                    <td>1986-10-30</td>
                    <td>11424 Ritchie Garden</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Jennifer</td>
                    <td>Forsyth</td>
                    <td>1983-3-13</td>
                    <td>04640 Nader Ramp</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Michelle</td>
                    <td>King</td>
                    <td>1980-8-29</td>
                    <td>272 Alysa Fall</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Steven</td>
                    <td>Kelly</td>
                    <td>1989-8-6</td>
                    <td>5749 Foster Pike</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Julian</td>
                    <td>Ferguson</td>
                    <td>1981-9-17</td>
                    <td>6196 Wilkinson Parkways</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Chloe</td>
                    <td>Ince</td>
                    <td>1983-10-28</td>
                    <td>9069 Daniel Shoals</td>
                </tr>
            </tbody>
        </table>

        <script>
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
        </script>
    </body>
</html>
