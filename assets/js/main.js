//koristim curring da napravim funkciju koja sluzi za upis tekstualnog sadrzaja u id
const updateDOMText=id=>text=>document.getElementById(`${id}`).textContent=text;
const year=new Date().getFullYear();
//upisujem godinu u dom
updateDOMText('year')(year);