// search input

const search= document.querySelector("#search-input");

search.addEventListener('input', filterList);

function filterList(){
    
    const filter = search.value.toLowerCase();
    const studentList = document.querySelectorAll("#student-list");

    studentList.forEach((item) =>{
        let text = item.textContent;
        if(text.toLowerCase().includes(filter.toLowerCase())){
            item.style.display = '';
        }
        else{
            item.style.display = 'none';
        }

    });
}





