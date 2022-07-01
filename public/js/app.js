const filter_vehicle_form_fields = function () {
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
}


const get_csrf = async function () {
    // get csrf token everytime api endpoint is called 

    const csrf = await fetch(window.location.origin + "/api/csrf", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            "Authorization": "Bearer " + getCookie("token")
        },
    }).then(res => res.json());

    return csrf.csrf;
}


const create_vehicle = function () {

    // Generate a new vehicle record on the backend and refresh page

    let vehicle_selected = document.querySelector(".custom-select");
    let add_vehicle_submit = document.querySelector(".add-vehicle-submit");
    let form_fields = document.querySelectorAll(".form-group");

    add_vehicle_submit.addEventListener("click", async () => {
        const data = {};

        form_fields.forEach(e => {
            if (e.style.display !== "none") {
                data[e.querySelector("input").name] = e.querySelector("input").value;
            }
        });


        let csrf = await get_csrf();

        const res = await fetch(window.location.origin + "/api/" + vehicle_selected.value + "s", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                "Authorization": "Bearer " + getCookie("token")
            },
            body: JSON.stringify(data)
        }).then(res => res.json())
            .catch(err => err);

        if (await res?.errors) {
            let vehicle_form = document.querySelector(".vehicle-form");
            vehicle_form?.querySelectorAll(".alert-danger")?.forEach(e => e.remove());

            Object.values(res.errors).forEach(error => {
                let element = document.createElement("div");
                element.classList.add(...["alert", "alert-danger"]);
                element.innerText = Object.values(error);
                vehicle_form.appendChild(element);
            });

        } else {
            window.location.reload();
        }
    });
}

const delete_vehicle = function () {
    // Delete Selected Vehicle

    const delete_vehicle_btns = document.querySelectorAll(".delete-vehicle-btn");
    delete_vehicle_btns.forEach(btn => {
        const vehicleElement = btn.parentElement.parentElement;
        const yes_btn = document.querySelector(".delete-vehicle-modal")
            .querySelector(".modal-footer")
            .querySelector(".btn-primary");

        btn.addEventListener("click", function () {
            const delete_vehicle_modal = document.querySelector(".delete-vehicle-modal");
            const VIN = vehicleElement.querySelectorAll("td")[0].innerText;
            const VEHICLE_TYPE = vehicleElement.querySelector("th")
                .innerText
                .toLowerCase() + "s";
            const ID = vehicleElement.getAttribute("identification");
            delete_vehicle_modal.querySelector(".modal-body").innerHTML =
                `Are you sure you want to delete this vehicle with VIN/HIN: ${VIN}?`;

            yes_btn.addEventListener("click", async function () {

                let csrf = await get_csrf();

                fetch(window.location.origin + "/api/" + VEHICLE_TYPE + "/" + ID, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        "Authorization": "Bearer " + getCookie("token")
                    },
                }).then(res => window.location.reload())
                    .catch(err => err);
            });

        });
    });
}

const update_vehicle = function () {
    // updated selected vehicle
    const update_vehicle_btns = document
        .querySelectorAll("button[data-target='#update_vehicle']");

    update_vehicle_btns.forEach((btn, idx) => {
        btn.addEventListener("click", async function () {
            const data_row = update_vehicle_btns[idx].parentElement.parentElement;
            const vehicle_type = data_row.querySelector("th").innerText.toLowerCase() + "s";
            const vehicle_id = data_row.getAttribute("identification");

            let csrf = await get_csrf();
            const res = await fetch(window.location.origin + "/api/" + vehicle_type + "/" + vehicle_id, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    "Authorization": "Bearer " + getCookie("token")
                }
            })
                .then(res => res.json())
                .catch(err => err);

            // Add the vehicle info to the update form
            if (await res) {
                const update_vehicle_modal = document.querySelector("#update_vehicle");
                const update_vehicle_form = document.querySelector(".update-vehicle-form");
                update_vehicle_form.setAttribute("identification", res.id);
                update_vehicle_modal.querySelector(".modal-footer").innerHTML = "";
                update_vehicle_form.innerHTML = "";


                delete res.id;
                delete res.created_at;
                delete res.updated_at;

                let data_names = Object.keys(res);
                let data_values = Object.values(res);

                for (let i = 0; i < Object.keys(res).length; i++) {

                    let div = document.createElement("div");
                    div.classList.add("form-group");


                    let label = document.createElement("label");
                    label.setAttribute("for", data_names[i]);
                    label.style.width = "200px";
                    label.innerText = data_names[i].toUpperCase();

                    let input = document.createElement("input");
                    input.setAttribute("name", data_names[i]);
                    input.value = data_values[i];

                    div.appendChild(label);
                    div.appendChild(input);

                    update_vehicle_form.appendChild(div);
                }

                let btn = document.createElement("button");
                btn.classList.add("update-vehicle-btn", "btn", "btn-primary", "ml-auto");
                btn.innerText = "Submit";
                btn.setAttribute("type", "button");
                update_vehicle_modal.querySelector(".modal-footer").appendChild(btn);


                btn.addEventListener("click", async function () {
                    const data = {};
                    data.id = update_vehicle_form.getAttribute("identification");

                    let labels = update_vehicle_form.querySelectorAll("label");
                    let inputs = update_vehicle_form.querySelectorAll("input");

                    for (let i = 0; i < labels.length; i++) {
                        data[labels[i].getAttribute("for")] = inputs[i].value;
                    }


                    let csrf = await get_csrf();

                    fetch(window.location.origin + "/api/" + vehicle_type + "/" + vehicle_id, {
                        method: 'PUT',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf,
                            "Authorization": "Bearer " + getCookie("token")
                        },
                        body: JSON.stringify(data)
                    }).then(res => window.location.reload())
                        .catch(err => err);

                })

            }
        })
    })
}

filter_vehicle_form_fields();
create_vehicle();
delete_vehicle();
update_vehicle();
