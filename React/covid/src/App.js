import './App.css';
import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import Home from "./pages/Home";
import Cases from "./pages/Cases";
import Vacinas from "./pages/Vacinas";
import { Layout } from 'antd';

function App() {
  
  return (
    <Layout.Content style={{ padding: 40 }}>
      <Router>
        <Switch>
          <Route exact path="/">
            <Home />
          </Route>
          <Route exact path="/:country">
            <Cases />
          </Route>
          <Route exact path="/:country/vacinas">
            <Vacinas />
          </Route>
        </Switch>
      </Router>
    </Layout.Content>
  );
}

export default App;
