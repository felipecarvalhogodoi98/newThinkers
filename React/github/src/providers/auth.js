import { createContext, useContext, useState } from "react";
import axios from "axios";

export const AuthContext = createContext({});

export const AuthProvider = ({children}) =>{
    const [isLoggedIn, setIsLoggedIn] = useState(false);
    const [token, setToken] = useState("");
    const [user, setUser] = useState({});

    async function getDataUser(){
        const res = await axios.get("https://api.github.com/user",{
        headers: {
          Authorization: `token ${token}`,
        },
      });
        setUser(res.data);
    }

    return (
        <AuthContext.Provider value={{user, setUser, token, setToken, isLoggedIn, setIsLoggedIn, getDataUser}}>
            {children}
        </AuthContext.Provider>
    );
}

export const useAuth = () => {
    const context = useContext(AuthContext);
    return context;
}

