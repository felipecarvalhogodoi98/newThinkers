import './App.css';
import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import Home from "./pages/Home";
import Info from "./pages/Info";
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
            <Info />
          </Route>
        </Switch>
      </Router>
    </Layout.Content>
  );
}

export default App;
