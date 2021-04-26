import { Button } from "antd";
import {AiFillGithub} from "react-icons/ai";
function Login(){
    return (
        <div className="login">
        <h2>Login</h2>
        <Button 
            href={"https://github.com/login/oauth/authorize"
            +"?client_id=" +process.env.REACT_APP_CLIENT_ID+
            "&scope=user"}
            type="primary"
            icon={<AiFillGithub />}
        > Login com GitHub</Button>
        </div>
    )
    
}

export default Login;