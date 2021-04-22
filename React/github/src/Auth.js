import { useLocation} from "react-router-dom";
import { useEffect } from "react";
import axios from "axios";
import { Spin } from "antd";
function Auth(){
    const location = useLocation();

    function getCode(){
        const [ , code] = location.search.split('code=');
        if(code){
            getToken(code);
        }
    }

    async function getToken(code){
        try {
            const {data} = await axios.post(
              'https://github.com/login/oauth/access_token',
              { 
                client_id: process.env.REACT_APP_CLIENT_ID,
                client_secret: process.env.REACT_APP_CLIENT_SECRET,
                code: code,
              },
              {headers: { accept: 'application/json' }}
            );
              console.log(data);
            
          } catch (error) {
            console.log('error', error);
          }
    }
    
    useEffect(() => {
        getCode();
    })

    return(
        <>
            <Spin/>
        </>
    );
}

export default Auth;