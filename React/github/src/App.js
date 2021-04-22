import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import { Layout } from 'antd';
import HomePage from "./home.page";
import Auth from "./Auth";


function App() {  

  return (
    <Layout.Content style={{ padding: 40 }}>
      
      <Router>
        <Switch>
          <Route exact path="/">
            <HomePage />
          </Route>
          <Route exact path="/auth/:code?">
            <Auth />
          </Route>
        </Switch>
      </Router>
      
    </Layout.Content>
  );
}

export default App;
