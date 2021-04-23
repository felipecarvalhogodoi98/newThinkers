import { Button } from "antd";
function Login(){
    return (
        <Button 
            className="login"
            href={"https://github.com/login/oauth/authorize"
            +"?client_id=" +process.env.REACT_APP_CLIENT_ID+
            "&scope=user-repo"}
            type="primary"
        >Login com GitHub</Button>
    )
    
}

export default Login;