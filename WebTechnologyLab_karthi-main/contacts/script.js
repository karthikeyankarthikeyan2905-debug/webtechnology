function confirmDelete(){
    return confirm("Do you want to delete this contact?");
}

// Phone validation
const phone = document.getElementById("phone");

if(phone){
phone.addEventListener("input",function(){

this.value=this.value.replace(/[^0-9]/g,'');

if(this.value.length>10){
this.value=this.value.slice(0,10);
}

});
}