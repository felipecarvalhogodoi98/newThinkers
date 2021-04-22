import { Button } from "antd";
import { useState, useEffect } from "react";
import axios from "axios";

function Home(){
    const [token, setToken] = useState("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");

    async function getUser(){
        const res = await axios.get("https://api.github.com/user",{
        headers: {
          Authorization: `token ${token}`,
        },
      });
        console.log(res.data);
    }

    useEffect(() => {
        getUser();
    })

    return (
        <>
            <Button 
            href={"https://github.com/login/oauth/authorize"
            +"?client_id=" +process.env.REACT_APP_CLIENT_ID+
            "&scope=user-repo"}
            type="primary"
        >Login com GitHub</Button>
        </> 
    );
}

export default Home;