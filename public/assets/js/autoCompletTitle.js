console.log('hello autoCompletTitle');
console.log(searchPath);
// utilisation des data-nomDeLaVariable
// console.log(search.dataset.searchPath);
const search = document.getElementById('search');
const resultSearch = document.getElementById('resultSearch');

// search.addEventListener("keyup",()=>{ mon code }) = à search.onkeyup = ()=>{ mon code }
search.onkeyup = ()=>{
    let result = "";
    console.log(search.value);
    fetch(searchPath,{
        method:"POST",
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: "searchValue=" + search.value})
    .then((response)=>response.json())
    .then((output)=>{
        output.forEach(element => {
            result += `<a href="/films/${element.id}">${element.title}</a><br>`;
        });
        resultSearch.innerHTML = result;
        resultSearch.style.height = "fit-content";
    })
}