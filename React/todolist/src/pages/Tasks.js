import { useState, useEffect } from "react";
import { FaRegCheckSquare, FaRegSquare } from "react-icons/fa";
import { AiFillDelete } from "react-icons/ai";
import { GrAdd } from "react-icons/gr";
import { useParams } from "react-router-dom";

function Tasks() {
    const params = useParams();

    useEffect(() => {
        console.log(params);
        }, [params])
    const [list, setList] = useState([]);
    const [status, setStatus] = useState("pendentes");
    const [isEditing, setIsEditing] = useState("");

    function addNewTask(e) {
        e.preventDefault();
        if(e.target.task.value !== ""){
        const task = {
            id: new Date().getTime(),
            name: e.target.task.value,
            status: "pendente"
        };
        setList([...list, task]);
        console.log(task.id);
        document.getElementById("task").value = "";
        }
        
    }

    function updateTask(e, item){
        const newList = list.map((t) => {
        if (t.id === item.id) 
            t.name = e.target.value;
        return t;
        });
        setList(newList);
        setIsEditing("");
    }
    
    function onKeyDown(e, item){
        if (e.charCode === 13 || e.keyCode === 13) updateTask(e,item);
    }

    function onBlur(e, item){
        updateTask(e,item);
    }

    function deleteTask(index){
        const newList = Array.from(list);
        newList.splice(index, 1);
        setList(newList);
    }  

    function done(item) {
        const newList = list.map((t) => {
        if (t.id === item.id) 
            t.status = t.status === "pendente" ? "feito" : "pendente";
        return t;
        });
        setList(newList);
    }

    function all(){
        const newStatus = status === "todos" ? "pendendes" : "todos";
        setStatus(newStatus);
    }

    function isPending(item){
        if(item.status !== "feito") setIsEditing(item.id);
    }
  
    return (
        <div className="App">

        <form onSubmit={addNewTask}>
            <input name="task" id="task" />
            <button type="submit"><GrAdd className="svg" /></button>
        </form>

        <ul>

            <li><span></span><button onClick={() => all()}>{status}</button></li>


            {list.map((item, index) => {
            return (
                <li style={item.status === "feito" ? { textDecoration: "line-through" } : {}} key={index}
                className={item.status === "feito" && status === "todos" ? "hide" : ""}
                > 
                <span>
                {
                    isEditing === item.id ?
                    <input defaultValue={item.name} onBlur={(e) => onBlur(e, item)} onKeyDown={(e) => onKeyDown(e, item)} /> :
                    <p onClick={() => isPending(item)}>{item.name}</p>
                }  
                </span>

                <button onClick={() => done(item)}>
                    {item.status === "feito" ? 
                    <FaRegCheckSquare /> : 
                    <FaRegSquare />}
                </button>
                <button onClick={() => deleteTask(index)}>
                    <AiFillDelete />
                </button>

                </li>
            );
            })}
        </ul>
        </div>
    );
}

export default Tasks;
