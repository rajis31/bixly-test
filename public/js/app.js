// Adjust the form field based on vehicle type selected 

let vehicle_selected = document.querySelector(".custom-select");
let form_fields = document.querySelectorAll(".form-group");
form_fields.forEach(e => { e.style.display = "none" });
vehicle_selected.addEventListener("change", vehicle_select => {
    form_fields.forEach(field => {
        if (field.getAttribute("vehicle") === vehicle_select.target.value) {
            field.style.display = "block";
        } else {
            field.style.display = "none";
        }
    });
});

// Send vehicle created to backend 
let add_vehicle_submit = document.querySelector(".add-vehicle-submit");
add_vehicle_submit.addEventListener("click", async () => {
    const data = {};

    form_fields.forEach(e => {
        if (e.style.display !== "none") {
            data[e.querySelector("input").name] = e.querySelector("input").value;
        }
    });


    const csrf = await fetch(window.location.origin + "/api/csrf", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            "Authorization" :  "Bearer "+getCookie("token")
        },
    }).then(res => res.json());

    const res = await fetch(window.location.origin + "/api/" + vehicle_selected.value+"s", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf.csrf,
            "Authorization" :  "Bearer "+getCookie("token")
        },
        body: JSON.stringify(data)
    }).then(res => res.json())
      .catch(err => err);

    if(await res?.errors){
        let vehicle_form = document.querySelector(".vehicle-form");
        vehicle_form?.querySelectorAll(".alert-danger")?.forEach(e=>e.remove());

        Object.values(res.errors).forEach( error => {
            let element = document.createElement("div");
            element.classList.add(...["alert","alert-danger"]);
            element.innerText = Object.values(error);
            vehicle_form.appendChild(element);
        });

    } else {
        window.location.reload();
    }
});


