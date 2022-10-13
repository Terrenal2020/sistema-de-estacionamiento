import {
    onGetTasks,
    saveTask,
    deleteTask,
    getTask,
    updateTask,
    getTasks,
} from "./firebase.js";

const taskForm = document.getElementById("task-form");
const tasksContainer = document.getElementById("tasks-container");

let editStatus = false;
let id = "";

window.addEventListener("DOMContentLoaded", async(e) => {
    // const querySnapshot = await getTasks();
    // querySnapshot.forEach((doc) => {
    //   console.log(doc.data());
    // });

    onGetTasks((querySnapshot) => {
        tasksContainer.innerHTML = "";

        querySnapshot.forEach((doc) => {
            const task = doc.data();



            tasksContainer.innerHTML += `
      <div class="card card-body mt-2 border-primary">
      <h3 class="h5">Nombre del conductor</h3>
    <h3 class="h5">${task.nombre}</h3>
    <h3 class="h5">Edad del conductor</h3>
    <p>${task.edad}</p>
    <div>
      <button class="btn btn-primary btn-delete" data-id="${doc.id}">
        🗑 Eliminar
      </button>
      <button class="btn btn-secondary btn-edit" data-id="${doc.id}">
        🖉 Editar
      </button>
    </div>
  </div>`;
        });

        const btnsDelete = tasksContainer.querySelectorAll(".btn-delete");
        btnsDelete.forEach((btn) =>
            btn.addEventListener("click", async({ target: { dataset } }) => {
                try {
                    await deleteTask(dataset.id);
                } catch (error) {
                    console.log(error);
                }
            })
        );

        const btnsEdit = tasksContainer.querySelectorAll(".btn-edit");
        btnsEdit.forEach((btn) => {
            btn.addEventListener("click", async(e) => {
                try {
                    const doc = await getTask(e.target.dataset.id);
                    const task = doc.data();
                    taskForm["task-title"].value = task.nombre;
                    taskForm["task-description"].value = task.edad;

                    editStatus = true;
                    id = doc.id;
                    taskForm["btn-task-form"].innerText = "MODIFICAR";
                } catch (error) {
                    console.log(error);
                }
            });
        });
    });
});

taskForm.addEventListener("submit", async(e) => {
    e.preventDefault();

    const nombre = taskForm["task-title"];
    const edad = taskForm["task-description"];

    try {
        if (!editStatus) {
            await saveTask(nombre.value, edad.value);
        } else {
            await updateTask(id, {
                nombre: nombre.value,
                edad: edad.value,
            });

            editStatus = false;
            id = "";
            taskForm["btn-task-form"].innerText = "GUARDAR";
        }

        taskForm.reset();
        title.focus();
    } catch (error) {
        console.log(error);
    }
});