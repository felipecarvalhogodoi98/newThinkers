import {
  BrowserRouter as Router,
  Switch,
  Route,
} from "react-router-dom";
import { Layout } from 'antd';
import HomePage from "./containers/home.page";
import Login from "./containers/login";
import Auth from "./Auth";
import { useAuth } from "./providers/auth";
import { FollowingProvider } from "./providers/following";

function App() {  
  const { isLoggedIn } = useAuth();

  return (
    <div className="App">
    
    <Layout.Content >
      
      <Router>
        <Switch>
          <Route exact path="/">
            {isLoggedIn 
              ? 
                <FollowingProvider>
                  <HomePage />
                </FollowingProvider> 
              : 
                <Login />
            }
          </Route>
          <Route exact path="/auth/:code?">
            <Auth />
          </Route>
        </Switch>
      </Router>
      
    </Layout.Content>
    </div>
  );
}

export default App;
