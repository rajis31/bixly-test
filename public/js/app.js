// Adjust the form field based on vehicle type selected 
let vehicle_selected = document.querySelector(".custom-select");
let form_fields     =  document.querySelectorAll(".form-group");
form_fields.forEach(e=>{e.style.display = "none"});
vehicle_selected.addEventListener("change", vehicle_select => {
    form_fields.forEach(field=>{ 
         if( field.getAttribute("vehicle") === vehicle_select.target.value){
            field.style.display = "block";
         } else {
            field.style.display = "none";
         }
        });
});