// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import {
    getFirestore,
    collection,
    getDocs,
    onSnapshot,
    addDoc,
    deleteDoc,
    doc,
    getDoc,
    updateDoc,
} from "https://www.gstatic.com/firebasejs/9.6.2/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig = {
    authDomain: "estacionamiento-44371.firebaseapp.com",
    databaseURL: "https://estacionamiento-44371-default-rtdb.firebaseio.com",
    projectId: "estacionamiento-44371",
    storageBucket: "estacionamiento-44371.appspot.com",
    messagingSenderId: "946944863383",
    appId: "1:946944863383:web:c355718aa2fb5301abcdd2"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);

export const db = getFirestore();

/**
 * Save a New Task in Firestore
 * @param {string} nombre the title of the Task
 * @param {string} edad the description of the Task
 */
export const saveTask = (nombre, edad) =>
    addDoc(collection(db, "conductor"), { nombre, edad });

export const onGetTasks = (callback) =>
    onSnapshot(collection(db, "conductor"), callback);

/**
 *
 * @param {string} id Task ID
 */
export const deleteTask = (id) => deleteDoc(doc(db, "conductor", id));

export const getTask = (id) => getDoc(doc(db, "conductor", id));

export const updateTask = (id, newFields) =>
    updateDoc(doc(db, "conductor", id), newFields);

export const getTasks = () => getDocs(collection(db, "conductor"));