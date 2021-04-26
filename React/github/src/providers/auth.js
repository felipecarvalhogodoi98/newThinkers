import { createContext, useContext, useState } from "react";
import axios from "axios";

export const AuthContext = createContext({});

export const AuthProvider = ({children}) =>{
    const [isLoggedIn, setIsLoggedIn] = useState(false);
    const [token, setToken] = useState("");
    const [user, setUser] = useState({});

    async function getDataUser(){
        axios.defaults.baseURL = 'https://api.github.com';
        axios.defaults.headers.common['Authorization'] = `token ${token}`;
        const res = await axios.get("/user");
        setUser(res.data);
    }

    async function follow(username){
        const res = await axios.put(`/user/following/${username}`);
        if(res.status === 204){
          return true;
        }
    }

    async function unfollow(username){
        const res = await axios.delete(`/user/following/${username}`);
        if(res.status === 204){
          return true;
        }
    }

    return (
        <AuthContext.Provider value={{user, setUser, token, setToken, isLoggedIn, setIsLoggedIn, getDataUser, follow, unfollow}}>
            {children}
        </AuthContext.Provider>
    );
}

export const useAuth = () => {
    const context = useContext(AuthContext);
    return context;
}

