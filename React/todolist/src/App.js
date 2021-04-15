import { useState } from "react";
import { FaRegCheckSquare, FaRegSquare } from "react-icons/fa";
import { AiFillDelete } from "react-icons/ai";
import "./App.css";

function App() {
  const [list, setList] = useState([]);
  const [status, setStatus] = useState("pendentes");

  function addNewTask(e) {
    e.preventDefault();
    const task = {
      id: new Date(),
      name: e.target.task.value,
      status: "pendente"
    };
    setList([...list, task]);
  }

  function updateTask(e, item){
    e.preventDefault();
    const newList = list.map((t) => {
      if (t.id === item.id) 
          t.name = e.target.value;
      return t;
    });
    setList(newList);
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
  
  return (
    <div className="App">
      <h1>TODO List</h1>
      <form onSubmit={addNewTask}>
        <input name="task" />
        <button type="submit">Adicionar</button>
      </form>
      <ul>
        <li><span></span><button onClick={() => all()}>{status}</button></li>
        {list.map((item, index) => {
          return (
            <li style={item.status === "feito" ? { textDecoration: "line-through" } : {}} key={index}
              className={item.status === "feito" && status === "todos" ? "hide" : ""}
            >
              <input value={item.name} onChange={(e) => updateTask(e, item)} />
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

export default App;
