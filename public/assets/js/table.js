const tables = document.querySelectorAll('.table');

tables.forEach((table, index) => {
    const searchInput = table.querySelector('.input-group input'),
        table_rows = table.querySelectorAll('tbody tr'),
        table_headings = table.querySelectorAll('thead th');

    searchInput.addEventListener('input', () => searchTable(table_rows, searchInput));

    table_headings.forEach((head, i) => {
        let sort_asc = true;
        head.onclick = () => {
            table_headings.forEach(head => head.classList.remove('active'));
            head.classList.add('active');

            table.querySelectorAll('td').forEach(td => td.classList.remove('active'));
            table_rows.forEach(row => {
                row.querySelectorAll('td')[i].classList.add('active');
            });

            head.classList.toggle('asc', sort_asc);
            sort_asc = head.classList.contains('asc') ? false : true;

            sortTable(table, i, sort_asc);
        };
    });
});

function searchTable(table_rows, searchInput) {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = searchInput.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

function sortTable(table, column, sort_asc) {
    const tbody = table.querySelector('tbody');
    const rows = [...tbody.querySelectorAll('tr')];

    rows.sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    });

    rows.forEach(sorted_row => tbody.appendChild(sorted_row));
}
let link = document.getElementsByClassName("link");
    function activeLink(){
        for(let l of link){
            l.classList.remove("active");
        }
        event.target.classList.add("active");
        currentValue = event.target.value;
    }
    window.onload = function() {
        const paginationLinks = document.querySelectorAll('.link');
        paginationLinks[0].classList.add('active'); // This will add the 'active' class to the first link
    };
    
// function paginateTable(tableId, rowsPerPage) {
//     const table = document.querySelector(`#${tableId}`);
//     const rows = Array.from(table.querySelectorAll('tbody tr'));
//     let currentPage = 0;

//     function showPage(page) {
//         rows.forEach((row, i) => {
//             row.style.display = (i >= page * rowsPerPage && i < (page + 1) * rowsPerPage) ? '' : 'none';
//         });
//     }
    // function createPagination() {
    //     const pagination = document.createElement('div');
    //     pagination.className = 'pagination';
        
    //     const prevButton = document.createElement('button');
    //     prevButton.className = 'btn1';
    //     prevButton.innerHTML = '<img src="./images/448-arrow.png"> prev';
    //     prevButton.onclick = () => backBtn();
    //     pagination.appendChild(prevButton);
        
    //     const listul = document.createElement('ul');
        
    //     for(let i = 0; i < Math.ceil(rows.length / rowsPerPage); i++) {
    //         const listItem = document.createElement('li');
    //         listItem.className = 'link';
    //         listItem.innerHTML = i+1;
    //         listItem.value = i+1;
    //         listItem.onclick = function() {
    //             activeLink(); // Assuming activeLink is a function defined in your script
    //             currentPage = i;
    //             showPage(currentPage);
    //             // Add 'active' class to the clicked list item and remove it from others
    //             listul.querySelectorAll('li').forEach(li => li.classList.remove('active'));
    //             listItem.classList.add('active');
    //         };
    //         if (i === 0 || i === Math.ceil(rows.length / rowsPerPage) - 1 || Math.abs(currentPage - i) <= 1) {
    //             listul.appendChild(listItem);
    //         }
           
    //     }
        
    //     pagination.appendChild(listul); // Append the entire listul to pagination

    //     table.parentNode.insertBefore(pagination, table.nextSibling);

    //     const nextButton = document.createElement('button');
    //     nextButton.className = 'btn2';
    //     nextButton.innerHTML = 'next <img src="./images/448-arrow.png"> ';
    //     nextButton.onclick = () => nextBtn();
    //     pagination.appendChild(nextButton);
        
    // }
//     function backBtn() {
//         if (currentPage > 0) {
//             currentPage--;
//             for(let l of link){
//                 l.classList.remove("active");
//                 if(l.value == currentPage+1){
//                     l.classList.add("active");
//                 }   
//             }
//             showPage(currentPage);
//             updatePaginationLinks();
//         }
//     }

//     function nextBtn() {
//         const totalPageCount = Math.ceil(rows.length / rowsPerPage) - 1;
//         if (currentPage < totalPageCount) {
//             currentPage++;
//             for(let l of link){
//                 l.classList.remove("active");
//                 if(l.value == currentPage+1){
//                     l.classList.add("active");
//                 }   
//             }
//             showPage(currentPage);
           
//             updatePaginationLinks();
//         }
//     }
//     function updatePaginationLinks() {
//         const paginationLinks = document.querySelectorAll(`#${tableId} .link`);
        
//         paginationLinks.forEach((link, i) => {
//             if (i === currentPage) {
//                 link.classList.add('active');
//             } else {
//                 link.classList.remove('active');
//             }
//         });
//     }

//     showPage(currentPage);
//     createPagination();
//     updatePaginationLinks();
// }

// paginateTable('borrowing',6);


