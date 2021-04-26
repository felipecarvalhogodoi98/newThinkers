import { createContext, useContext, useState } from "react";
import axios from "axios";

export const FollowingContext = createContext({});

export const FollowingProvider = ({children}) => {
    const [following, setFollowing] = useState([]);

    async function getFollowingUser(token, per_page = 100, page = 1){
        const res = await axios.get("https://api.github.com/user/following",{
            headers: {
                Authorization: `token ${token}`,
            },
            params: {
                per_page: per_page,
                page: page
            }
        });
        if(res.status === 200){
            setFollowing(res.data);
        }
    }

    return (
        <FollowingContext.Provider value={{ following, setFollowing, getFollowingUser }}>
            {children}
        </FollowingContext.Provider>

    );
}

export const useFollowing = () => {
    const context = useContext(FollowingContext);
    return context;
}