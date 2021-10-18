import { useLocation } from "react-router-dom";
import { useEffect } from "react";
import axios from "axios";
import { Spin } from "antd";
import { Redirect } from 'react-router-dom';
import { words } from "lodash";
import { useAuth } from "./providers/auth";

function Auth() {
    const location = useLocation();
    const { setToken, isLoggedIn, setIsLoggedIn } = useAuth();

    function getCode() {
        const [, code] = location.search.split('code=');
        if (code) {
            getToken(code);
        }
    }

    async function getToken(code) {
        try {

            const { data } = await axios.post('/login/oauth/access_token', {
                client_id: process.env.REACT_APP_CLIENT_ID,
                client_secret: process.env.REACT_APP_CLIENT_SECRET,
                code: code,
            }
            );
            if (!data.includes('error')) {
                const [, token] = words(data, /\=(.*?)\&/);
                setToken(token);
                setIsLoggedIn(true);
            }
        } catch (error) {
            console.log('error', { ...error });
        }
    }

    useEffect(() => {
        getCode();
    })

    return (
        <>
            {!isLoggedIn ?
                <Spin className="autenticacao" tip="Autenticando..." /> :
                <Redirect to="/" />
            }
        </>
    );
}

export default Auth;