import { useState, useEffect } from "react";
import { AiOutlineArrowRight } from "react-icons/ai";
import axios from "axios";
import { Link } from "react-router-dom";
function ListTasks() {
  
    const [list, setList] = useState([]);
    const [isEditing, setIsEditing] = useState("");

    async function getList(){
        const res = await axios.get("http://localhost:3001/list");
        setList(res.data);
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
        <>
        <h2>Listas de tarefas</h2>
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
                        <Link to={"list/"+item.id}> <AiOutlineArrowRight /> </Link>
                    </li>
                );
            })}
        </ul>
        </>
    );
}

export default ListTasks;
