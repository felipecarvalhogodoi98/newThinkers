import { useState, useEffect } from "react";
import { AiOutlineArrowRight, AiFillDelete } from "react-icons/ai";
import { GrAdd } from "react-icons/gr";
import axios from "axios";
import { Link } from "react-router-dom";
function ListTasks() {
  
    const [list, setList] = useState([]);
    const [isEditing, setIsEditing] = useState("");

    async function getList(){
        const res = await axios.get("http://localhost:3001/list");
        setList(res.data);
    }

    async function postList(id, name){
        axios.post('http://localhost:3001/list/',
            {
                "id": id,
                "name": name,
                "tasks": []
            });
    }

    function addNewList(e) {
        e.preventDefault();
        if(e.target.task.value !== ""){
        const task = {
            id: new Date().getTime(),
            name: e.target.task.value,
            tasks: []
        };
        setList([...list, task]);
        console.log(task.id);
        document.getElementById("task").value = "";

        postList(task.id, task.name);
        }
        
    }

    function isPending(item){
        if(item.status !== "feito") setIsEditing(item.id);
    }

    function updateList(e, item){
        const newList = list.map((t) => {
        if (t.id === item.id) 
            t.name = e.target.value;
        return t;
        });
        setList(newList);
        setIsEditing("");
    }

    function deleteTask(index){
        const newList = Array.from(list);
        newList.splice(index, 1);
        setList(newList);
    }  
    
    function onKeyDown(e, item){
        if (e.charCode === 13 || e.keyCode === 13) updateList(e,item);
    }

    function onBlur(e, item){
        updateList(e,item);
    }

    useEffect(() => {
        getList();
      }, [])
  
    return (
        <div className="App">
        <h2>Listas de tarefas</h2>

        <form onSubmit={addNewList}>
            <input name="task" id="task" />
            <button type="submit"><GrAdd className="svg" /></button>
        </form>

        <ul>
            {list.map((item, index) => {
                return (
                    <li key={index}>
                        <span>
                        {
                            isEditing === item.id ?
                            <input defaultValue={item.name} onBlur={(e) => onBlur(e, item)} onKeyDown={(e) => onKeyDown(e, item)} /> :
                            <p onClick={() => isPending(item)}>{item.name}</p>
                        }
                        </span>
                        <button onClick={() => deleteTask(index)}>
                            <AiFillDelete />
                        </button>
                        <button><Link to={"list/"+item.id}> <AiOutlineArrowRight /> </Link></button>
                    </li>
                );
            })}
        </ul>
        </div>
    );
}

export default ListTasks;
