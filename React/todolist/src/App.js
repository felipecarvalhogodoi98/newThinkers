import { useState } from "react";
import { FaRegCheckSquare, FaRegSquare } from "react-icons/fa";
import "./App.css";

function App() {
  const [list, setList] = useState([]);
  const [status, setStatus] = useState("pendentes");

  function onSubmit(e) {
    e.preventDefault();
    console.log(e.target.task.value);
    const task = {
      id: new Date(),
      name: e.target.task.value,
      status: "pendente"
    };
    setList([...list, task]);
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
      <form onSubmit={onSubmit}>
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
              <span>{item.name}</span>
              <button onClick={() => done(item)}>
                {item.status === "feito" ? 
                  <FaRegCheckSquare /> : 
                  <FaRegSquare />}
              </button>
            </li>
          );
        })}
      </ul>
    </div>
  );
}

export default App;
