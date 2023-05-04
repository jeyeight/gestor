function filtragem(){
    let input = document.getElementById('filtro').value;
    let items = document.getElementsByClassName('item');
    let filter = input.toUpperCase();
    console.log(input,items,filter);
    for(let i=0;i<items.length;i++){
        a = items[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }    }


    
}