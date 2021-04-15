import "./App.css";
import ListTasks from "./pages/ListTasks";
import Tasks from "./pages/Tasks";
import {
  BrowserRouter as Router,
  Switch,
  Route, 
  Link
} from "react-router-dom";

function App() {
  
  
  return (
    <Router >
      <div style={{ padding: 20 }}>
        <Link to="/">Lista de Tarefas</Link> 
        <Switch>
          <Route exact path="/" >
            <ListTasks />
          </Route>
          <Route exact path="/list/:id" >
            <Tasks />
          </Route>
        </Switch>
      </div>
    </Router>
  );
}

export default App;
