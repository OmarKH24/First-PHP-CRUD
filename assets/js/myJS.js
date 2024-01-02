// Get Values ...
let data = document.getElementById("data");
let employes = [];
getData();
async function getData() {
  const response = await fetch(
    `http://localhost/CRUDSystem/assets/php/DB/select.php`
  );
  result = await response.json();
  employes = result.userData;
  dispEmp();

  console.log(employes);
}
let empName = document.getElementById("name");
let empEmail = document.getElementById("email");
let empAge = document.getElementById("age");
let empExp = document.getElementById("exyear");
let empSalary = document.getElementById("ms");
let inputs = document.getElementsByClassName("form-control");
// Elements to Display Data ...
//current index ...
let curIndex = 0;

function dispEmp() {
  let result = "";

  if (employes.length > 0) {
    for (let i = 0; i < employes.length; i++) {
      result += ` 
        <tr>
            <td>${i + 1}</td>
            <td>${employes[i].name}</td>
            <td>${employes[i].email}</td>
            <td>${employes[i].age}</td>
            <td>${employes[i].exp}</td>
            <td>${employes[i].salary}</td>
            <td>
                <button type="button" class="btn btn-primary" onclick="updateEmp(${i})">Update</button>
                <button type="button" class="btn btn-danger" onclick="deleteEmp(${i})">Delete</button>
            </td>
        </tr>`;
    }
  }
  data.innerHTML = result;
}

function clearForm() {
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].value = "";
  }
}
// Clear Spec Data ...
async function deleteEmp(index) {
  console.log("delete i: ", index);
  console.log(": ", employes[index].email);
  try {
    const response = await fetch(
      "http://localhost/CRUDSystem/assets/php/DB/delete.php",
      {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email: employes[index].email }),
      }
    );

    const data = await response.json();
    console.log(data);

    if (data.success) {
      console.log("Record deleted successfully");
    } else {
      console.error("Error deleting record:", data.message);
    }
  } catch (error) {
    console.error("Error deleting record:", error);
  }
  await getData();
  dispEmp();
}

// Update Spec Data ...
function updateEmp(index) {
  console.log("updateEmp called with index:", index);
  empName.value = employes[index].name;
  empEmail.value = employes[index].email;
  empAge.value = employes[index].age;
  empExp.value = employes[index].exp;
  empSalary.value = employes[index].salary;
  curIndex = index;

  sessionStorage.setItem("isUpdate", true);

  document.getElementById("add").addEventListener("click", function (e) {
    e.preventDefault();
    update();
  });
}

async function update() {
  let newEmp = {
    name: empName.value,
    email: empEmail.value,
    age: empAge.value,
    exp: empExp.value,
    salary: empSalary.value,
  };
  console.log("newEmp", newEmp);
  try {
    const response = await fetch(
      `http://localhost/CRUDSystem/assets/php/DB/update.php`,
      {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newEmp),
      }
    );
    const result = await response.json();
    console.log(result);

    if (result.success) {
      console.log("Record updated successfully");
    } else {
      console.error("Error updating record:", result.message);
    }
    sessionStorage.removeItem("isUpdate");
  } catch (error) {
    console.error("error from update emp: ", error);
  }
  await getData();
  clearForm();
  dispEmp();
}

// Search ...
function srch(val) {
  let result = "";

  for (let i = 0; i < employes.length; i++) {
    if (employes[i].name.toLowerCase().includes(val.toLowerCase())) {
      result += ` 

            <tr>
                <th>${i}</th>
                <th>${employes[i].name}</th>
                <th>${employes[i].email}</th>
                <th>${employes[i].age}</th>
                <th>${employes[i].exp}</th>
                <th>${employes[i].salary}</th>
                <th><button type="button" class="btn btn-primary" onclick="updateEmp(${i}">Update</button>
                <button type="button" class="btn btn-danger" onclick="deleteEmp(${i})">Delete</button></th>
            </tr>
        `;
      data.innerHTML = result;
    } else {
      data.innerHTML = result;
    }
  }
}

let srBtn = document.getElementById("srBtn");
let srData = document.getElementById("srData");
let value = 0;

srBtn.onclick = function () {
  if (value == 0) {
    dispSearch();
  } else {
    remove();
  }
};

function dispSearch() {
  srData.style.display = "Block";
  srData.style.width = "100%";
  value = 1;
}

function remove() {
  srData.style.display = "none";
  srData.style.width = "0%";
  value = 0;
}
